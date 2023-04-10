<?php

namespace App\Http\Controllers\Tripay;

use App\Http\Controllers\Controller;
use App\Models\data_pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\data_mobil;
use App\Models\data_booking;
use Illuminate\Support\Facades\Auth;

class TripayController extends Controller
{
    public function GetPaymentChannell()
    {

        $API_KEY = config('tripay.TRIPAY_API_KEY');
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_FRESH_CONNECT => true,
                CURLOPT_URL => 'https://tripay.co.id/' . env('API_url') . '/merchant/payment-channel',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $API_KEY],
                CURLOPT_FAILONERROR => false,
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
            )
        );

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response)->data;
        return $response ?: $error;
    }

    public function loopcheck(string $id, string $start_timestamp, string $end_timestamp)
    {
        return data_booking::query()
            ->where('data_mobil_id', $id)
            ->where(function ($exits) use ($start_timestamp, $end_timestamp) {
                $exits->where(
                    function ($findConflict) use ($start_timestamp, $end_timestamp) {
                            $findConflict->whereBetween('tanggal_booking', [$start_timestamp, $end_timestamp])
                                ->orWhereBetween('tanggal_kembali', [$start_timestamp, $end_timestamp]);
                        }
                )
                    ->orWhere(
                        function ($middleClause) use ($start_timestamp, $end_timestamp) {
                                $middleClause
                                    ->where('tanggal_booking', '<=', $end_timestamp)
                                    ->where('tanggal_kembali', '>=', $start_timestamp);
                            }
                    );
            })->first();

    }

    public function purchase(data_mobil $id, Request $request)
    {

        $total = Carbon::parse(date('Y-m-d', strtotime($request->start_date)))->diffInDays(Carbon::parse(date('Y-m-d', strtotime($request->end_date)))) + 1;
        $apiKey = config('tripay.TRIPAY_API_KEY');
        $privateKey = config('tripay.TRIPAY_PRIVATE_KEY');
        $merchantCode = config('tripay.MERCHANT_CODE');


        $amount = $id->harga_mobil;

        //$request->email; #sent invoice
        // return $request->all();
        $start_timestamp = $request->start_date;
        $end_timestamp = $request->end_date;


        if ($this->loopcheck($id->id, $start_timestamp, $end_timestamp) == null) {
            data_booking::create([
                'data_mobil_id' => $id->id,
                'email' => Auth::user()->email,
                'total_harga' => $id->harga_mobil * $total,
                'phone' => $request->phone != null ? '0' . $request->phone : "085156540536",
                'tanggal_booking' => $request->start_date,
                'tanggal_kembali' => $request->end_date
            ]);


            $merchantRef = 'ARD-' . time();

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_FRESH_CONNECT => true,
                CURLOPT_URL => 'https://tripay.co.id/' . env('API_url') . '/transaction/create',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
                CURLOPT_FAILONERROR => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query([
                    'method' => $request->payment,
                    'merchant_ref' => $merchantRef,
                    'amount' => $amount * $total,
                    'customer_name' => $request->first_name . ' ' . $request->last_name,
                    'customer_email' => Auth::user()->email,
                    'customer_phone' => $request->phone != null ? '0' . $request->phone : "085156540536",
                    "callback_url" => env('APP_URL') . "/callback",
                    'order_items' => [
                        [
                            'sku' => 'mobil-' . $id->id,
                            'name' => $id->nama_mobil,
                            'price' => $amount,
                            'quantity' => $total,
                            'product_url' => env('APP_URL'),
                            'image_url' => $id->urls->first() != null ? $id->urls->first()->img_url : env('NO_IMAGE_URL'),

                        ]
                    ],
                    'return_url' => env('APP_URL') . "/redirect",
                    'expired_time' => (time() + (30 * 60)),
                    //30 detik
                    'signature' => hash_hmac('sha256', $merchantCode . $merchantRef . ($amount * $total), $privateKey)
                ]),
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            $product = $this->loopcheck($id->id, $start_timestamp, $end_timestamp);

            $transaction = json_decode($response)->data;
            data_pembayaran::create([
                'data_booking_id' => $product->id,
                'metode_pembayaran' => $request->payment,
                'reference' => $transaction->reference,
                'merchant_ref' => $transaction->merchant_ref,
                'Total_amount' => $transaction->amount,
                'status' => $transaction->status,
                'created_at' => time(),

            ]);


            if ($request->version != null) {
                return response(["details" => $this->loopcheck($id->id, $start_timestamp, $end_timestamp), "Data_pembayaran" => json_decode($response ?: $error)->data], 200);

            } else {
                return redirect()->to(json_decode($response ?: $error)->data->pay_url);
            }

        } else {
            if ($request->version != null) {
                return response(["details" => $this->loopcheck($id->id, $start_timestamp, $end_timestamp), "status_pembayaran" => $this->loopcheck($id->id, $start_timestamp, $end_timestamp)->data_pembayaran], 409);

            } else {
                return redirect()->to('/transaction/' . $this->loopcheck($id->id, $start_timestamp, $end_timestamp)->data_pembayaran->reference);
            }



        }

    }


    public function transaction()
    {
        // return date('Y:M:D H:i:s', '1670858323'); convert time

        $apiKey = config('tripay.TRIPAY_API_KEY');
        $payload = [
            'page' => 1,
            'per_page' => 25
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api-sandbox/merchant/transactions?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode($response ? $response : $error)->data;
    }


    public function details_transaction($id)
    {

        // return date('Y:M:D H:i:s', '1670858323'); convert time
        //;
        $apiKey = config('tripay.TRIPAY_API_KEY');

        $payload = ['reference' => $id];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api-sandbox/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode($response ?: $error);

    }



}