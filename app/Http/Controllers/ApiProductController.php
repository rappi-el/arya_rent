<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\data_mobil;
use App\Models\data_booking;


class ApiProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'login', 'details']]);
    }

    public function index(Request $request)
    {

        $start_timestamp = $request->sd;
        $end_timestamp = $request->ed;
        $transmisi = (int) $request->transmisi;
        $seat = (int) $request->seat;

        $products = data_booking::query()
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
            })->get()->pluck('data_mobil_id');

        $items = data_mobil::with([
            'urls' => function ($query) {
                $query->get();
            }
        ])
            ->where('transmisi_mobil', $transmisi)

            ->where('kapasitas_mobil', $seat)
            ->whereNotIn('id', $products)->get();

        return response($items);

    }

    public function details(Request $request, $id)
    {

        $start_timestamp = $request->sd;
        $end_timestamp = $request->ed;
        $id_mobil = $id;
        $products = data_booking::query()
            ->where('data_mobil_id', $id_mobil)
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
            })
            ->get();

        if ($products->isEmpty()) {
            $product_data = data_mobil::with([
                'urls' => function ($query) {
                    $query->get();
                }
            ])
                ->where('id', $id_mobil)->get();
            if ($product_data->isEmpty()) {
                return response(["failed" => "id mobil tidak ditemukan!"], 404);
            }

            return response($product_data);
            //return view('car_details', ['data' => $product_data]);
        } else {
            return response(["failed" => "mobil dengan tanggal tersebut telah dipesan! silahkan gunakan tanggal/mobil yang berbeda !"], 400);

        }



    }

}