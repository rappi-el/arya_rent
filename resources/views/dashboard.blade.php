@section('title', 'Car List')

@extends('layout')

@section('content')

<style>
  @font-face {
    font-family: 'icomoon';
    src: url('fonts/icomoon.eot?l3ud6k');
    src: url('fonts/icomoon.eot?l3ud6k#iefix') format('embedded-opentype'),
      url('fonts/icomoon.ttf?l3ud6k') format('truetype'),
      url('fonts/icomoon.woff?l3ud6k') format('woff'),
      url('fonts/icomoon.svg?l3ud6k#icomoon') format('svg');
    font-weight: normal;
    font-style: normal;
    font-display: block;
  }

  [class^="icon-"],
  [class*=" icon-"] {
    /* use !important to prevent issues with browser extensions that change fonts */
    font-family: 'icomoon' !important;
    speak: never;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    /* Better Font Rendering =========== */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .fs0 {
    font-size: 23px;
  }



  .icon-profile:before {
    content: "\e900";
    color: #90a3bf;
  }

  .icon-Car .path1:before {
    content: "\e901";
    color: rgb(144, 163, 191);
  }

  .icon-Car .path2:before {
    content: "\e902";
    margin-left: -1em;
    color: rgb(248, 249, 250);
  }

  .icon-Car .path3:before {
    content: "\e903";
    margin-left: -1em;
    color: rgb(144, 163, 191);
  }

  .icon-Car .path4:before {
    content: "\e904";
    margin-left: -1em;
    color: rgb(248, 249, 250);
  }

  .icon-Car .path5:before {
    content: "\e905";
    margin-left: -1em;
    color: rgb(144, 163, 191);
  }

  .icon-Car .path6:before {
    content: "\e906";
    margin-left: -1em;
    color: rgb(144, 163, 191);
  }

  .icon-Car .path7:before {
    content: "\e907";
    margin-left: -1em;
    color: rgb(144, 163, 191);
  }


  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;

  }
</style>

<!--Ads-->
<div class="container">
  <div class="row mt-5">
    <div class="col-sm-6">
      <div class="card rounded" style="border-color: #0d6efd;">
        <div class="card-body card bg-primary bg-gradient text-white">
          <h3 class="card-title">Pilihan terbaik untukmu</h3>
          <p class="card-text">Mulai dari Rp.300rb an udah bisa rental kapasitas 5 orang!</p>
          <h6 class="card-image ms-auto mb-2 mb-lg-0"><img src="img/261cbb_0edcb7df58734e20b40fa0b183b1f978_mv2.png"
              width="300" alt=""></h6>
          <a href="#" class="btn btn-warning text-white">Rental Mobil!</a>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="card rounded" style="border-color: #0d6efd;">
        <div class="card-body card bg-primary bg-gradient text-white">
          <h3 class="card-title">Paket Keluarga</h3>
          <p class="card-text">Dapatkan Voucher keluarga dengan rental mobil berkapasitas 8 orang!</p>
          <h6 class="card-image ms-auto mb-2 mb-lg-0"><img
              src="img/png-transparent-toyota-kijang-car-tata-motors-toyota-innova-crysta-toyota-innova-driving-mode-of-transport-india-transformed.png"
              width="279" alt=""></h6>
          <a href="#" class="btn btn-warning text-white">Rental Mobil!</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Cards-->
<p class="container text-secondary fw-normal fs-6" style="margin-top: 15px;">Pilihan populer</p>
<div class="container">
  <div class="row">



    @if (app('request')->input('sd') <= app('request')->input('ed') AND !is_null(app('request')->input('sd'))AND
      !is_null(app('request')->input('ed')))

      @forelse ($data as $data_mobil)

      <div class="col">
        <div class="card" style=" border-radius: 10px; margin-top: 15px; border-color: rgb(255, 255, 255); ">
          <h5 class="card-title" style="padding-left: 25px; margin-top: 12px;">{{$data_mobil['nama_mobil']}}</h5>

          <img src="{{$data_mobil->urls->isEmpty() ? env('NO_IMAGE_URL') : $data_mobil->urls->first()->img_url}}"
            class="center" width="240" height="200" />




          <div class="card-body ">
            <div class="d-flex justify-content-space-around">
              <span style="margin-left: 8px;color:#90A3BF;" class="icon-Car fs0"><span class="path1"></span><span
                  class="path2"></span><span class="path3"></span><span class="path4"></span><span
                  class="path5"></span><span class="path6"></span><span
                  class="path7">&thinsp;{{$data_mobil->transmisi_mobil ==0? "Manual" : "Matic"}}</span></span>



              <div class="icon-profile fs0" style="margin-left: 13px; text-align: center;color:#90A3BF;">
                &thinsp;{{$data_mobil->kapasitas_mobil}}&thinsp;Orang</div>

            </div>
            <h5 class="card-title" style="margin-left: 8px;margin-top: 10px;">IDR
              {{number_format($data_mobil['harga_mobil'],0,',',',')}}/hari</h5>
            <a href="car_details?sd={{ app('request')->input('sd') }}&ed={{ app('request')->input('ed') }}&id={{$data_mobil->id}}"
              class="btn btn-primary center" style="width: auto">Lihat</a>
          </div>
        </div>
      </div>

      @empty

      <div class="col-lg-12 text-center">
        <img src="img/no-results.png" width="130px" alt="">
        <h5 style="margin-top: 10px;">Maaf, data yang kamu cari tidak ada 😓</h5>
        <a href="/" class="btn btn-primary" style="margin-top: 10px;">Coba Lagi</a>

        @endforelse
        <nav aria-label="Page navigation example" style="margin-top: 20px;">
          <ul class="pagination justify-content-center">
            {{ $data->appends(request()->query())->links() }}

          </ul>
        </nav>

        @else
        <!--Failed Banner-->

        <div class="col-lg-12 text-center">
          <img src="img/another_date.png" width="130px" alt="">
          <h5 style="margin-top: 10px;">Maaf, Silahkan cari untuk Tanggal lain 😓</h5>
          <a href="/" class="btn btn-primary" style="margin-top: 10px;">Coba Lagi</a>


        </div>

        @endif




      </div>
  </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>






@endsection