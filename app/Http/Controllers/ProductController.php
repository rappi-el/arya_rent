<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\data_mobil;
use App\Models\data_booking;

class ProductController extends Controller
{


    public function index(Request $request)
    {

        $start_timestamp = date('Y-m-d', strtotime($request->input('sd')));
        $end_timestamp = date('Y-m-d', strtotime($request->input('ed')));
        $transmisi = (int) $request->input('transmisi');
        $seat = (int) $request->input('seat');

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
            ->whereNotIn('id', $products)->paginate(8);


        return view('dashboard', ['data' => $items]);
    }

    public function details(Request $request)
    {

        $start_timestamp = date('Y-m-d', strtotime($request->input('sd')));
        $end_timestamp = date('Y-m-d', strtotime($request->input('ed')));

        $id_mobil = (int) $request->input('id');

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

            return view('car_details', ['data' => $product_data]);
        } else {
            return 0;
        }


        //return view('car_details',['data'=>$product_data]);
    }

}