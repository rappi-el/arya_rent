@extends('layout')

@section('content')


<link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

  body {
    background-color: #eee;
    font-family: "Poppins", sans-serif
  }

  .card {
    background-color: #fff;
    padding: 14px;
    border: none
  }

  .demo {
    width: 100%
  }

  ul {

    list-style: none outside none;
    padding-left: 0;
    margin-bottom: 0
  }

  img li {
    display: block;
    float: left;
    line-height: 30px;
    margin-right: 6px;
    cursor: pointer
  }

  .img {
    display: block;
    height: 100%;
    width: 100%
  }

  .stars i {
    color: #f6d151
  }

  .stars span {
    font-size: 13px
  }

  hr {
    color: #d4d4d4
  }

  .badge {
    padding: 5px !important;
    padding-bottom: 6px !important
  }

  .badge i {
    font-size: 10px
  }

  .profile-image {
    width: 35px
  }

  .comment-ratings i {
    font-size: 13px
  }

  .username {
    font-size: 12px
  }

  .comment-profile {
    line-height: 17px
  }

  .date span {
    font-size: 12px
  }

  .p-ratings i {
    color: #f6d151;
    font-size: 12px
  }

  .btn-long {
    padding-left: 60px;
    padding-right: 60px
  }

  .buttons .btn {
    height: 46px
  }

  .buttons .cart {
    border-color: #00B1ff;
    color: #00B1ff
  }

  .buttons .cart:hover {
    background-color: #2d6b87 !important;
    color: #fff
  }

  .buttons .buy {
    color: #fff;
    background-color: #00B1ff;
    border-color: #00B1ff
  }

  .buttons .buy:focus,
  .buy:active {
    color: #fff;
    background-color: #00B1ff;
    border-color: #00B1ff;
    box-shadow: none
  }

  .buttons .buy:hover {
    color: #fff;
    background-color: #2d6b87;
    border-color: #2d6b87
  }

  .buttons .wishlist {
    background-color: #fff;
    border-color: #00B1ff
  }

  .buttons .wishlist:hover {
    background-color: #2d6b87;
    border-color: #2d6b87;
    color: #fff
  }

  .buttons .wishlist:hover i {
    color: #fff
  }

  .buttons .wishlist i {
    color: #00B1ff
  }

  .comment-ratings i {
    color: #f6d151
  }

  .followers {
    font-size: 9px;
    color: #d6d4d4
  }

  .store-image {
    width: 42px
  }

  .dot {
    height: 10px;
    width: 10px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    margin-right: 5px
  }

  .bullet-text {
    font-size: 12px
  }

  .my-color {
    margin-top: 10px;
    margin-bottom: 10px
  }

  label.radio {
    cursor: pointer
  }

  label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
  }

  label.radio span {
    border: 2px solid #8f37aa;
    display: inline-block;
    color: #8f37aa;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    text-transform: uppercase;
    transition: 0.5s all
  }

  label.radio .red {
    background-color: red;
    border-color: red
  }

  label.radio .blue {
    background-color: blue;
    border-color: blue
  }

  label.radio .green {
    background-color: green;
    border-color: green
  }

  label.radio .orange {
    background-color: orange;
    border-color: orange
  }

  label.radio input:checked+span {
    color: #fff;
    position: relative
  }

  label.radio input:checked+span::before {
    opacity: 1;
    content: '\2713';
    position: absolute;
    font-size: 13px;
    font-weight: bold;
    left: 4px
  }

  .card-body {
    padding: 0.3rem 0.3rem 0.2rem
  }
</style>
@foreach ($data as $datax)

<div class="container mt-2 mb-3">
  <div class="row no-gutters">
    <div class="col-md-5 pr-2">
      <div class="card">
        <div class="demo">
          <center>
            <ul id="lightSlider">
              @forelse ($datax->urls as $url)
              <li data-thumb="{{$url->img_url}}">
                <img src="{{$url->img_url}}" width="400" height="400" />
              </li>
              @empty
              <li data-thumb="{{env('NO_IMAGE_URL')}}">
                <img src="{{env('NO_IMAGE_URL')}}" width="400" height="400" />
              </li>
              @endforelse


            </ul>
          </center>
        </div>
      </div>



      <div class="card mt-2" style="margin-bottom:15px;">
        <h6>Reviews</h6>
        <div class="d-flex flex-row">
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <span class="ml-1 font-weight-bold">4.6</span>
        </div>
        <hr>
        <div class="badges">
          <span class="badge bg-dark ">All (230)</span>
          <span class="badge bg-dark ">
            <i class="fa fa-image"></i> 23 </span>
          <span class="badge bg-dark ">
            <i class="fa fa-comments-o"></i> 23 </span>
          <span class="badge bg-warning">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <span class="ml-1">2,123</span>
          </span>
        </div>
        <hr>
        <div class="comment-section">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center">
              <img src="https://i.imgur.com/o5uMfKo.jpg" class="rounded-circle profile-image">
              <div class="d-flex flex-column ml-1 comment-profile">
                <div class="stars">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <span class="username">Lori Benneth</span>
              </div>
            </div>
            <div class="date">
              <span class="text-muted">2 May</span>
            </div>
          </div>
          <hr>
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center">
              <img src="https://i.imgur.com/tmdHXOY.jpg" class="rounded-circle profile-image">
              <div class="d-flex flex-column ml-1 comment-profile">
                <div class="comment-ratings">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <span class="username">Timona Simaung</span>
              </div>
            </div>
            <div class="date">
              <span class="text-muted">12 May</span>
            </div>
          </div>
          <hr>

          <center><span>show more ratings</span></center>
        </div>
      </div>
    </div>

    @section('title', $datax->nama_mobil)
    <div class="col-md-7">
      <div class="card">

        <div class="about">

          <h4 class="font-weight-bold" style="margin-top:5px">{{$datax->nama_mobil}}</h4>
          <hr>
        </div>
        <div class="product-description">


          <span class="font-weight-bold">Description</span>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet felis suscipit, dictum elit eget,
            pulvinar elit. In sit amet mi mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi mi
            mauris, accumsan rhoncus interdum nec, gravida at lacus. Sed fermentum eget ligula quis lacinia. Donec id
            sapien velit. In cursus a ex ac pellentesque. Vestibulum elementum posuere felis eu lobortis. Sed ac tempor
            urna, vitae condimentum libero. Donec nec turpis iaculis, dapibus justo vel, condimentum risus. Praesent nec
            leo ex.</p>






          
          <div class="buttons">

            <h6>IDR {{number_format($datax['harga_mobil'],0,',',',')}} / Day</h6>
            <a href="{{$datax->id}}/checkout?sd={{ app('request')->input('sd') }}&ed={{ app('request')->input('ed') }}"
              class="btn btn-warning btn-long buy">Lanjutkan

            </a>
            <div class="bullets" style="margin-top:15px;">

              <div class="d-flex align-items-center">
                <span class="dot"></span>
                <span class="bullet-text">{{$datax->transmisi_mobil ==0? "Manual" : "Matic"}}</span>
              </div>
              <div class="d-flex align-items-center">
                <span class="dot"></span>
                <span class="bullet-text">{{$datax->kapasitas_mobil}} orang</span>

              </div>
            </div>
            <Br>

          </div>
        </div>
      </div>
      @endforeach
      <p style="margin-top: 15px;">Similar items:</p>
      <div class="row">


        <div class="col">
          <div class="card" style="width: 14.5rem; border-radius: 4%; border-color: rgb(255, 255, 255); ">
            <h5 class="card-title" style="padding-left: 8px; margin-top: 8px;">Daihatsu Ayla</h5>
            <img src="img/ayla-2018-png-6.webp" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" style="margin-top: 10px;">IDR 250,000/hari</h5>
              <a href="/404" class="btn btn-primary" style="width: auto">Lihat</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 14.5rem; border-radius: 4%; border-color: rgb(255, 255, 255); ">
            <h5 class="card-title" style="padding-left: 8px; margin-top: 8px;">Daihatsu Ayla</h5>
            <img src="img/ayla-2018-png-6.webp" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" style="margin-top: 10px;">IDR 250,000/hari</h5>
              <a href="/404" class="btn btn-primary" style="width: auto">Lihat</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-light rounded shadow"
            style="width: 14.5rem; border-radius: 4%;border-color: rgb(255, 255, 255); ">
            <h5 class="card-title" style="padding-left: 8px; margin-top: 8px;">Daihatsu Ayla</h5>
            <img src="img/ayla-2018-png-6.webp" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" style="margin-top: 10px;">IDR 250,000/hari</h5>
              <a href="/404" class="btn btn-primary" style="width: auto">Lihat</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
<script src='js/slider.js'></script>
<script>
  $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 2,
    thumbItem: 5
  });
</script>

@endsection