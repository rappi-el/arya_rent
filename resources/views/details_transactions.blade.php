@section('title', 'Car List')

@extends('layout')
@inject('carbon', 'Carbon\Carbon')
@section('content')
<br>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
<style>
    .steps .step {
        display: block;
        width: 100%;
        margin-bottom: 35px;
        text-align: center;
    }

    .steps .step .step-icon-wrap {
        display: block;
        position: relative;
        width: 100%;
        height: 80px;
        text-align: center;
    }

    .steps .step .step-icon-wrap::before,
    .steps .step .step-icon-wrap::after {
        display: block;
        position: absolute;
        top: 50%;
        width: 50%;
        height: 3px;
        margin-top: -1px;
        background-color: #e1e7ec;
        content: "";
        z-index: 1;
    }

    .steps .step .step-icon-wrap::before {
        left: 0;
    }

    .steps .step .step-icon-wrap::after {
        right: 0;
    }

    .steps .step .step-icon {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        border: 1px solid #e1e7ec;
        border-radius: 50%;
        background-color: #f5f5f5;
        color: #374250;
        font-size: 38px;
        line-height: 81px;
        z-index: 5;
    }

    .steps .step .step-title {
        margin-top: 16px;
        margin-bottom: 0;
        color: #606975;
        font-size: 14px;
        font-weight: 500;
    }

    .steps .step:first-child .step-icon-wrap::before {
        display: none;
    }

    .steps .step:last-child .step-icon-wrap::after {
        display: none;
    }

    .steps .step.completed .step-icon-wrap::before,
    .steps .step.completed .step-icon-wrap::after {
        background-color: #0da9ef;
    }

    .steps .step.completed .step-icon {
        border-color: #0da9ef;
        background-color: #0da9ef;
        color: #fff;
    }

    @media (max-width: 576px) {

        .flex-sm-nowrap .step .step-icon-wrap::before,
        .flex-sm-nowrap .step .step-icon-wrap::after {
            display: none;
        }
    }

    @media (max-width: 768px) {

        .flex-md-nowrap .step .step-icon-wrap::before,
        .flex-md-nowrap .step .step-icon-wrap::after {
            display: none;
        }
    }

    @media (max-width: 991px) {

        .flex-lg-nowrap .step .step-icon-wrap::before,
        .flex-lg-nowrap .step .step-icon-wrap::after {
            display: none;
        }
    }

    @media (max-width: 1200px) {

        .flex-xl-nowrap .step .step-icon-wrap::before,
        .flex-xl-nowrap .step .step-icon-wrap::after {
            display: none;
        }
    }

    .bg-faded,
    .bg-secondary {
        background-color: #f5f5f5 !important;
    }

    .payment {
        background-color: #0DA9EF;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .payment:hover {
        background-color: #1699d5;

        color: white;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>




<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<div class="container padding-bottom-3x mb-1">
    <div class="card mb-3">
        <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Status Pesanan </span><span class="text-medium"></span></div>
        <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-cart"></i></div>
                    </div>
                    <h4 class="step-title">Menunggu Pembayaran</h4>
                </div>
                <div class="step{{$payment_method->data->status == 'PAID' ? ' completed': null}}">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-cash"></i></div>
                    </div>
                    <h4 class="step-title">Pembayaran Berhasil</h4>
                </div>
                @if( $data_booking->Status_Pesanan == 'DIAMBIL' || $data_booking->Status_Pesanan == 'KEMBALI' || $data_booking->Status_Pesanan == 'SELESAI' )

                <div class="step completed">

@elseif( $data_booking->Status_Pesanan == 'BELUM' || $data_booking->Status_Pesanan == 'SIAP' ) 
<div class="step">
@endif
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-medal"></i></div>
                    </div>
                    <h4 class="step-title">{{$data_booking->Status_Pesanan == 'DIAMBIL' ? 'Mobil telah diambil': 'AMBIL MOBIL'}}</h4>
                </div>
                @if( $data_booking->Status_Pesanan == 'KEMBALI' || $data_booking->Status_Pesanan == 'SELESAI' )

                <div class="step completed">

@elseif( $data_booking->Status_Pesanan == 'BELUM' || $data_booking->Status_Pesanan == 'SIAP' ||$data_booking->Status_Pesanan == 'DIAMBIL' ) 
<div class="step">
@endif
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-car"></i></div>
                    </div>
                    <h4 class="step-title">{{$data_booking->Status_Pesanan == 'KEMBALI' ? 'MOBIL TELAH DIKEMBALIKAN': 'Pengembalian Mobil'}}</h4>
                </div>
                @if( $data_booking->Status_Pesanan == 'SELESAI' )

<div class="step completed">

@elseif( $data_booking->Status_Pesanan == 'BELUM' || $data_booking->Status_Pesanan == 'SIAP' ||$data_booking->Status_Pesanan == 'DIAMBIL' ||$data_booking->Status_Pesanan == 'KEMBALI' ) 
<div class="step">
@endif
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-home"></i></div>
                    </div>
                    <h4 class="step-title">Pesanan Selesai</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <h5 class="fw-bold col-6">Details Pembayaran</h5>
                <p class="col-6 text-sm-end">#{{ $payment_method -> data->reference}}</p>
                <hr style="height:2px; width:100%; border-width:0; color:#C3D4E9; background-color:#C3D4E9">
            </div>
            <div class="row">
                <p class="col-6 fs-6">Metode Pembayaran</p>
                <h5 class="col-6 text-sm-end">{{ $payment_method -> data->payment_method}}</h5>
                <p class="col-6 fs-6">Total Pembayaran</p>
                <h5 class="col-6 text-sm-end text-primary">IDR {{number_format($payment_method -> data->amount ,0,',',',')}}</h5>
                @if($payment_method -> data->status == "UNPAID")
         
            <a class="payment" href="{{ $payment_method -> data->checkout_url}}" target=”_blank”>Bayar Sekarang!</a>
        
         
         @endif
                
            </div>
        </div>
    </div>
    <!--Card2-->
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="fw-bold col-6" style="margin-bottom: 30px;">Detail Sewa Mobil</h5>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="card col-3" style="margin-top: 30px;">
                            <img src="https://images.tokopedia.net/img/JFrBQq/2022/8/18/fbe052d8-fa26-4808-b2f0-02410800c675.jpg"
                                width="300px" alt="">
                        </div>
                        <div class="col-6 center" style="margin-left: 15px; margin-top: 50px;">
                            <p class="fw-bold">{{$data_mobil->nama_mobil}}</p>
                            
                            <p class="fw-bold">{{$data_mobil->kapasitas_mobil}} Kursi/Mobil</p>
                            <p class="fw-bold">Transmisi {{$data_mobil->transmisi_mobil ==0? "Manual" : "Matic"}}</p>
                        </div>
                        <div style="margin-top: 10px;">
                            <hr
                                style="height:2px; width:100%; margin-top: 5px; border-width:0; color:#C3D4E9; background-color:#C3D4E9">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-secondary">Tanggal Mulai</p>
                            </div>
                            <div class="col-4">
                                <p class="text-secondary">Tanggal Selesai</p>
                            </div>
                            <div class="col-4">
                                <p class="text-secondary">Durasi</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p> {{date('j F Y', strtotime($data_booking->tanggal_booking)) }} : 08:00 am</p> 
                            </div>
                            <div class="col-4">
                            <p> {{date('j F Y', strtotime($data_booking->tanggal_kembali)) }} : 08:00 PM</p>
                            </div>
                            <div class="col-4">
                            
                                <p>{{$carbon::parse(date('Y-m-d', strtotime($data_booking->tanggal_booking)))->diffInDays($carbon::parse(date('Y-m-d', strtotime($data_booking->tanggal_kembali))))+1}} Hari</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-secondary">Lokasi Ambil</p>
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="739" height="332" id="gmap_canvas" src="https://maps.google.com/maps?q=Permata%20Buah%20Batu&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/">divi discount</a><br><style>.mapouter{position:relative;text-align:right;height:332px;width:739px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:332px;width:739px;}</style></div></div>
                            <a href="https://goo.gl/maps/a3wMNguwPcHV62JE9"> Jl. Raya Bojongsoang No.196b, Lengkong,
                                Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287</a>
                        </div>
                        <div style="margin-top: 10px;">
                            <hr
                                style="height:2px; width:100%; margin-top: 5px; border-width:0; color:#C3D4E9; background-color:#C3D4E9">
                        </div>
                        <div >
                            <p class="fw-bold text-secondary fs-6">Detail Pemesan</p>
                            <p class="fw-bold fs-5">{{$payment_method->data->customer_name}}</p>
                            <p class="fs-6 text-secondary">Telepon : {{$payment_method->data->customer_phone}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="border-color:blue;">
        <p class="fw-bold  fs-5" style="margin-left: 15px; margin-top:15px;">Baca Ketentuan Rental</p>
        <p class="fw-bold fs-6 text-primary" style="margin-left: 15px; margin-top:10px;">1. Membawa KTP/paspor</p>
        <p class="fw-bold fs-6 text-primary" style="margin-left: 15px; margin-top:10px;">2. SIM A/ SIM Internasional</p>
        <p class="fw-bold fs-6 text-primary" style="margin-left: 15px; margin-top:10px;">3. Deposit IDR 500.000</p>
        <p class="fw-bold fs-6 text-primary" style="margin-left: 15px; margin-top:10px;">4. Status/Pekerjaan</p>
        <p class="fw-bold fs-6 text-primary" style="margin-left: 15px; margin-top:10px;">5. Nama Akun Media Sosial</p>
    </div>
</div>
</div>




@endsection