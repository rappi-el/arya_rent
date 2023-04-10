<?php

namespace App\Http\Controllers\Tripay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Models\data_pembayaran;

class TripayCallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'kkXUm-kF9ir-2LNL8-yamUj-228hj';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }


        $reference = $data->reference;
        $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $invoice = data_pembayaran::where('reference', $reference)
                ->first();

            //return $invoice;


            switch ($status) {
                case 'UNPAID':
                    return Response::json([
                        'success' => true,
                        'message' => 'Invoice belum dibayar, kode invoice : ' . $reference,
                    ]);

                case 'PAID':
                    $invoice->update([
                        'status' => "PAID"
                    ]);
                    break;

                case 'EXPIRED':
                    $invoice->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $invoice->update(['status' => 'FAILED']);
                    break;
                case 'REFUND':
                    $invoice->update(['status' => 'REFUND']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }

            return Response::json(['success' => true]);
        }
    }
}