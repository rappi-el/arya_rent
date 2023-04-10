@section('title', 'Landing Page')

@extends('layout')

<Style>
    .form-control input {
        display: inline-block;
        width: auto;
        border: none;
    }

    .form-control input:focus {
        box-shadow: none;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@section('content')
<div class="container">
    <div class="py-5 text-center">
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Detail Pesanan</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">

                <center>
                    <li class="list-group-item">
                        <img src="{{$data_mobil->urls->isEmpty() ? env('NO_IMAGE_URL') :
                $data_mobil->urls->first()->img_url}}" style="width: 380px;height: auto;">
                    </li>
                </center>
                <li class="list-group-item d-flex justify-content-between lh-condensed">

                    <div>

                        <h6 class="my-0">{{$data_mobil->nama_mobil}}</h6>
                 
                 
                        <small class="text-muted">Kapasitas : {{$data_mobil->kapasitas_mobil}} Orang</small>
                        <div><small class="text-muted">Transmisi : {{$data_mobil->transmisi_mobil ==0? "Manual" :
                                "Matic"}}</small></div>
                                


                             
                    </div>

                 
                    
                    <span class="text-muted">IDR {{number_format($data_mobil->harga_mobil,0,',',',')}} *
                        {{$perkalian}} Hari</span>
              
                 
                </li>


                <!-- <div><small class="text-muted">Order For: {{ app('request')->input('sd') }} - {{ app('request')->input('ed') }}</small></div>
                    </div> -->

                    <li class="list-group-item d-flex justify-content-between lh-condensed">

<div>
<small class="text-muted">Tanggal awal: {{ app('request')->input('sd') }}</small>
                        <div><small class="text-muted">Tanggal akhir :  {{ app('request')->input('ed') }}</small></div>
 
</li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">

<div>

    <span class="text-muted">Total Harga : IDR
        {{number_format($data_mobil->harga_mobil*$perkalian,0,',',',')}}</span>
</li>





            </ul>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary" disabled>Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <h4 class="mb-3">Alamat</h4>
            <form action="{{ route('payment.post', $data_mobil->id) }}" class="needs-validation" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nama Depan</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" required>
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" name="last_name" required>
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Digunakan untuk menerima inovice)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <input type="hidden" name="start_date" value="{{ app('request')->input('sd') }}">

                <input type="hidden" name="end_date" value="{{ app('request')->input('ed') }}">

                <div class="mb-3">
                    <label for="email">Nomor telepon </label>
                    <div class="form-control">
                        <span class="border-end country-code px-2">+62</span>
                        @if(Auth::user()->phone)
         
                        <input type="number" class="form-control" placeholder="85156540536" name="phone"
                          value = "{{ Auth::user()->phone }}" />
         @else
         <input type="number" class="form-control" placeholder="85156540536" name="phone"
                             required/>
         
         @endif

                      
                    </div>


                </div>



                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">

                    @foreach ($payment_method as $payment)

                    <div class="custom-control custom-radio">
                        <input id="{{$payment->code}}" name="payment" value="{{$payment->code}}" type="radio"
                            class="custom-control-input" required>
                        <img src="{{$payment->icon_url}}" style="width: 75px;height: auto;"></img>
                        <label class="custom-control-label" for="credit">{{$payment->name}}
                            (fee : {{$payment->total_fee->percent == 0? "gratis" :
                            $payment->total_fee->percent.'%'}})



                        </label>
                    </div>
                    @endforeach


                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
</div>
@endsection