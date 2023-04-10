<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tripay\TripayController;
use Carbon\Carbon;

use App\Models\data_mobil;
use App\Models\data_booking;
use App\Models\data_pembayaran;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Throwable;


class ApicheckoutController extends Controller
{
    public function select_payment(Request $request)
    {


        $Tripay = new TripayController();
        $channel = $Tripay->GetPaymentChannell();

        // get total number of minutes between from and throung date
        $days = Carbon::parse(date('Y-m-d', strtotime($request->input('sd'))))->diffInDays(Carbon::parse(date('Y-m-d', strtotime($request->input('ed'))))) + 1;

        // json_decode($id);
        return response(['payment_method' => $channel]);

    }

    public function store(data_mobil $id, Request $request)
    {
        $Tripay = new TripayController();

        return $Tripay->purchase($id, $request);
    }

    public function transaction()
    {
        $items = data_booking::with([
            'data_pembayaran' => function ($query) {
                $query->get();
            }
        ])
            ->where('email', Auth::user()->email)->latest()->get();

        return response(['Transaction' => $items]);
    }
    public function details_transaction($id)
    {

        try {
            $Tripay = new TripayController();

            $items = data_booking::with([
                'data_pembayaran' => function ($query) {
                    $query->get();
                }
            ])
                ->where('id', data_pembayaran::where('reference', $id)->pluck('data_booking_id')->first())->first();

            $mobil = data_mobil::where('id', $items->data_mobil_id)->first();



            return response(['payment_method' => $Tripay->details_transaction($id), 'data_booking' => $items, 'data_mobil' => $mobil, 'pembeli' => auth()->User()]);
        } catch (Throwable $e) {
            return response(["message" => "order details not found"], 404);
        }

    }


}