@section('title', 'Landing Page')

@extends('layout')

@section('content')
<style>
  .cont {
    margin: 20px auto;
    padding: 30px 25px;
    max-width: 1020px
  }

  .box {
    border: 2px solid #ddd;
    padding: 10px 20px
  }

  .inputbox {
    border: none;
    outline: none
  }

  .h-white {
    color: #ffffff;
    margin-bottom: 5px;
    padding-left: 4px;
    font-size: 18px;
    font-weight: 500
  }

  .h-blue {
    color: #49bff5;
    margin-bottom: 5px;
    padding-left: 4px;
    font-size: 14px;
    font-weight: 500
  }

  .textmuted {
    color: #ddd
  }

  .btn.btn-warning {
    height: 60px;
    font-size: 20px;
    padding: 10px
  }

  @media (max-width:820px) {
    body {
      padding: 20px
    }
  }

  .bg-custom {
    background-color: #00B1ff
  }

  html {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent
  }

  body {
    margin: 0
  }

  :focus:not([data-focusvisible-polyfill]) {
    outline: 0
  }

  .css-1dbjc4n {
    -ms-flex-align: stretch;
    -ms-flex-direction: column;
    -ms-flex-negative: 0;
    -ms-flex-preferred-size: auto;
    -webkit-align-items: stretch;
    -webkit-box-align: stretch;
    -webkit-box-direction: normal;
    -webkit-box-orient: vertical;
    -webkit-flex-basis: auto;
    -webkit-flex-direction: column;
    -webkit-flex-shrink: 0;
    align-items: stretch;
    border: 0 solid #000;
    box-sizing: border-box;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-basis: auto;
    flex-direction: column;
    flex-shrink: 0;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
    margin-top: 0;
    min-height: 0;
    min-width: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    padding-top: 0;
    position: relative;
    z-index: 0
  }

  .css-901oao {
    border: 0 solid #000;
    box-sizing: border-box;
    color: rgba(0, 0, 0, 1);
    display: inline;
    font: 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
    margin-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    padding-top: 0;
    white-space: pre-wrap;
    word-wrap: break-word
  }

  .r-kdyh1x {
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px
  }

  .r-1udh08x {
    overflow-x: hidden;
    overflow-y: hidden
  }

  .r-6koalj {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex
  }

  .r-1f0042m {
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px
  }

  .r-d045u9 {
    border-bottom-width: 2px;
    border-left-width: 2px;
    border-right-width: 2px;
    border-top-width: 2px
  }

  .r-1jgb5lz {
    margin-left: auto;
    margin-right: auto
  }

  .r-r0h9e2 {
    margin-bottom: 0;
    margin-top: 0
  }

  .r-1e081e0 {
    padding-left: 12px;
    padding-right: 12px
  }

  .r-5njf8e {
    padding-bottom: 8px;
    padding-top: 8px
  }

  .r-ipm5af {
    top: 0
  }

  .r-13qz1uu {
    width: 100%
  }

  .r-1yos0t3 {
    box-shadow: 0 2px 5px rgba(3, 18, 26, .15)
  }

  .r-1awozwy {
    -ms-flex-align: center;
    -webkit-align-items: center;
    -webkit-box-align: center;
    align-items: center
  }

  .r-18u37iz {
    -ms-flex-direction: row;
    -webkit-box-direction: normal;
    -webkit-box-orient: horizontal;
    -webkit-flex-direction: row;
    flex-direction: row
  }

  .r-184en5c {
    z-index: 1
  }

  .r-lrvibr {
    -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none
  }

  .r-1loqt21 {
    cursor: pointer
  }

  .r-1sixt3s {
    font-family: MuseoSans, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol
  }

  .r-1b43r93 {
    font-size: 14px
  }

  .r-u8s1d {
    position: absolute
  }

  .r-b4qz5r {
    box-shadow: 0 4px 10px rgba(3, 18, 26, .15)
  }

  .r-109y4c4 {
    height: 1px
  }

  .r-3s2u2q {
    white-space: nowrap
  }

  .r-b88u0q {
    font-weight: 700
  }

  .r-q4m81j {
    text-align: center
  }

  .r-mwx11u {
    background-color: rgba(73, 179, 232, 1)
  }

  .r-qn3fzs {
    padding-bottom: 24px
  }

  .r-m53kd2 {
    background-image: -webkit-linear-gradient(-180deg, rgba(0, 160, 255, 0), #0770cd);
    background-image: -moz-linear-gradient(-180deg, rgba(0, 160, 255, 0), #0770cd);
    background-image: linear-gradient(-180deg, rgba(0, 160, 255, 0), #0770cd)
  }

  .r-1pi2tsx {
    height: 100%
  }

  .r-1d2f490 {
    left: 0
  }

  .r-1g80hic {
    opacity: .8
  }

  .r-knv0ih {
    margin-top: 8px
  }

  .r-1k97etb {
    background-color: rgba(1, 148, 243, 1)
  }

  .r-bajy9j {
    height: 230px
  }

  .r-lb660f {
    width: 472px
  }

  .r-1777fci {
    -ms-flex-pack: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    justify-content: center
  }

  .r-1aockid {
    width: 40px
  }

  .r-todpsx {
    opacity: .3
  }

  .r-1iusvr4 {
    -ms-flex-preferred-size: 0;
    -webkit-flex-basis: 0px;
    flex-basis: 0px
  }

  .r-16y2uox {
    -ms-flex-positive: 1;
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    flex-grow: 1
  }

  .r-1r2vb7i {
    max-width: 96px
  }

  .r-1enofrn {
    font-size: 12px
  }

  .r-1cwl3u0 {
    line-height: 16px
  }

  .r-jwli3a {
    color: rgba(255, 255, 255, 1)
  }

  .r-1vr29t4 {
    font-weight: 800
  }

  .r-qpwdfp {
    text-shadow: 0 2px 4px rgba(27, 27, 27, .2)
  }

  .r-16k0tzm {
    width: 1024px
  }

  .r-855088 {
    border-left-color: transparent
  }

  .r-bnwqim {
    position: relative
  }

  .r-1x4r79x {
    z-index: auto
  }

  @-webkit-keyframes r-1l9b1p3 {
    from {
      -webkit-transform: translate3d(-100%, 0, 0);
      transform: translate3d(-100%, 0, 0)
    }

    to {
      -webkit-transform: translate3d(100%, 0, 0);
      transform: translate3d(100%, 0, 0)
    }
  }

  @keyframes r-1l9b1p3 {
    from {
      -webkit-transform: translate3d(-100%, 0, 0);
      transform: translate3d(-100%, 0, 0)
    }

    to {
      -webkit-transform: translate3d(100%, 0, 0);
      transform: translate3d(100%, 0, 0)
    }
  }

  .r-1x35g6 {
    font-size: 24px
  }

  .r-k200y {
    -ms-flex-item-align: start;
    -webkit-align-self: flex-start;
    align-self: flex-start
  }

  .r-7a29px {
    width: 64px
  }

  .r-r7719k {
    box-shadow: 0 4px 10px rgba(3, 18, 26, .15)
  }
</style>
<br>
<div class="css-1dbjc4n r-mwx11u r-qn3fzs">
  <div class="css-1dbjc4n r-m53kd2 r-1pi2tsx r-1d2f490 r-1g80hic r-u8s1d r-ipm5af r-13qz1uu"></div>
  <div tabindex="5">
    <div class="css-1dbjc4n r-knv0ih r-1udh08x">
      <div class="css-1dbjc4n r-6koalj r-18u37iz r-1jgb5lz r-bnwqim r-16k0tzm" id="slider"
        style="column-gap: 16px; min-height: 230px;transform: translate(0px) perspective(1000px);">
        <a href="# " target="_blank" rel="noopener noreferrer">
          <div class="css-1dbjc4n r-1k97etb r-kdyh1x r-1yos0t3 r-bajy9j r-1udh08x r-lb660f"
            data-testid="desktop-promo-carousel-img-card">
            <img loading="eager" importance="high" src="/img/poster1.jpg"
              srcset="/img/poster1.jpg 1x, /img/poster1.jpg 3x" decoding="async" width="472" height="230"
              style="object-fit:fill;object-position:50% 50%">
          </div>
        </a>
        <a href="#" target="_blank" rel="noopener noreferrer">
          <div class="css-1dbjc4n r-1k97etb r-kdyh1x r-1yos0t3 r-bajy9j r-1udh08x r-lb660f"
            data-testid="desktop-promo-carousel-img-card">
            <img loading="lazy" importance="low" src="/img/poster2.png"
              srcset="/img/poster2.png 1x, /img/poster2.png 2x, /img/poster2.png 3x" decoding="async" width="472"
              height="230" style="object-fit: fill; object-position: 50% 50%;">
          </div>
        </a>
        <a href="#" target="_blank" rel="noopener noreferrer">
          <div class="css-1dbjc4n r-1k97etb r-kdyh1x r-1yos0t3 r-bajy9j r-1udh08x r-lb660f"
            data-testid="desktop-promo-carousel-img-card">
            <img loading="lazy" importance="low" src="/img/poster3.png"
              srcset="/img/poster3.png 1x, /img/poster3.png 2x, /img/poster3.png 3x" decoding="async" width="472"
              height="230" style="object-fit: fill; object-position: 50% 50%;">
          </div>
        </a>
        <a href="#" target="_blank" rel="noopener noreferrer">
          <div class="css-1dbjc4n r-1k97etb r-kdyh1x r-1yos0t3 r-bajy9j r-1udh08x r-lb660f"
            data-testid="desktop-promo-carousel-img-card">
            <img loading="lazy" importance="low" src="/img/poster4.png"
              srcset="/img/poster4.png 1x, /img/poster4.png 2x, /img/poster4.png 3x" decoding="async" width="472"
              height="230" style="object-fit: fill; object-position: 50% 50%;">
          </div>
        </a>
        <a href="#" target="_blank" rel="noopener noreferrer">
          <div class="css-1dbjc4n r-1k97etb r-kdyh1x r-1yos0t3 r-bajy9j r-1udh08x r-lb660f"
            data-testid="desktop-promo-carousel-img-card">
            <img loading="lazy" importance="low" src="/img/poster5.png"
              srcset="/img/poster5.png 1x, /img/poster5.png 2x, /img/poster5.png 3x" decoding="async" width="472"
              height="230" style="object-fit: fill; object-position: 50% 50%;">

          </div>
        </a>
        <a href="#" target="_blank" rel="noopener noreferrer">
          <div class="css-1dbjc4n r-1k97etb r-kdyh1x r-1yos0t3 r-bajy9j r-1udh08x r-lb660f"
            data-testid="desktop-promo-carousel-img-card">
            <img loading="lazy" importance="low" src="/img/poster6.png"
              srcset="/img/poster6.png 1x, /img/poster6.png 2x, /img/poster6.png 3x" decoding="async" width="472"
              height="230" style="object-fit: fill; object-position: 50% 50%;">

          </div>
        </a>
      </div>
      <div class="css-1dbjc4n r-1awozwy r-6koalj r-18u37iz r-1777fci r-5njf8e r-q4m81j r-lrvibr">
        <div id="left" class="css-1dbjc4n r-6koalj r-todpsx r-1aockid" onclick="slider()">
          <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/e/ed0a03f612f3cf232a6009d826f0ddba.svg"
            height="16">
        </div>
        <div class="css-1dbjc4n r-1iusvr4 r-16y2uox r-1r2vb7i"></div>
        <p style="text-decoration:none;display:flex;align-content:center">PROMO</p>
        <div class="css-1dbjc4n r-1iusvr4 r-16y2uox r-1r2vb7i"></div>
        <div id="right" class="css-1dbjc4n r-1loqt21 r-6koalj r-1aockid" onclick="sliderright()">
          <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/5/5a0b03517b812a9691e66f119b9830b0.svg"
            height="16">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="cont rounded col-md-9 bg-custom shadow">
  <form name="myForm" action="search" method="get">
    <div class="col-md-6 ">
      <p class="h-white "> Cari Mobil Yang Kamu Inginkan</p>
    </div>
    <div class="row">
      <div class="col-md-6 col-12 mb-4">
        <div class="form-control d-flex flex-column">
          <p id="sewa" class="h-blue">Sewa</p>
          <input type="date" class="inputbox textmuted" aria-labelledby="sewa" id="awal" name="sd"></input>
        </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
        <div class="form-control d-flex flex-column">
          <p id="kembali" class="h-blue">Kembali</p>
          <input class="inputbox textmuted " aria-labelledby="kembali" type="date" id="akhir" name="ed"
            required></input>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-12 mb-4">
        <div class="form-control d-flex flex-column">
          <p id="seat" class="h-blue">Seat</p>
          <select aria-labelledby="seat" class="border-0 outline-none" name="seat">
            <option value="4">4</option>
            <option value="6">6</option>
          </select>

        </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
        <div class="form-control d-flex flex-column">
          <p id="transmisi" class="h-blue">transmisi</p>
          <select aria-labelledby="transmisi" class="border-0 outline-none" name="transmisi">
            <option value="0">manual</option>
            <option value="1">matic</option>
          </select>
        </div>
      </div>
    </div>
    <input class="btn btn-warning form-control text-center" style="font-weight:bold;" type="submit"
      value="Cari Mobil"></input>
  </form>
  <script>
    var cookieValue = document.getElementById('slider').getAttribute('style');
    const myArray = cookieValue.split(";");
    intku = parseInt(myArray[2].replace(/[A-Za-z$-]/g, "")[3]);

    function slider() {
      if (intku != 0) {
        intku += 488;
        document.getElementById("slider").setAttribute("style", "column-gap: 16px; min-height: 230px;transform: translate(" + intku + "px) perspective(1000px);");
        document.getElementById("right").setAttribute("class", "css-1dbjc4n r-1loqt21 r-6koalj r-1aockid");
      } else {
        document.getElementById("left").setAttribute("class", "css-1dbjc4n r-6koalj r-todpsx r-1aockid");
      }
    }

    function sliderright() {
      if (intku != -1952) {
        intku += -488;
        document.getElementById("slider").setAttribute("style", "column-gap: 16px; min-height: 230px;transform: translate(" + intku + "px) perspective(1000px);");
        document.getElementById("left").setAttribute("class", "css-1dbjc4n r-1loqt21 r-6koalj r-1aockid");
      } else {
        document.getElementById("right").setAttribute("class", "css-1dbjc4n r-6koalj r-todpsx r-1aockid");
      }
    }
  </script>
  <script type="text/javascript">
    var date = new Date();
    var Tdate = date.getDate() + 1;
    var month = date.getMonth() + 1;
    var year = date.getUTCFullYear();
    if (Tdate < 10) {
      Tdate = '0' + Tdate;
    }
    if (month < 10) {
      month = '0' + month;
    }
    var minDate = year + "-" + month + "-" + Tdate;
    document.getElementById("awal").value = minDate;
    document.getElementById("awal").setAttribute('min', minDate);
    document.getElementById("akhir").setAttribute('min', document.getElementById("awal").value);
  </script>
</div>
<!--Cards-->
<p class="container text-secondary fw-normal col-md-9" style="margin-top: 15px;">Pilihan populer</p>
<div class="container col-md-9">
  <div class="row">


    <div class="col">
      <div class="card" style=" border-radius: 10px; margin-top: 15px; border-color: rgb(255, 255, 255); ">
        <h5 class="card-title" style="padding-left: 25px; margin-top: 12px;">nama mobil</h5>
        <center><img src="{{env('NO_IMAGE_URL')}}" class="center gradient_image" width="240" height="200" /></center>
        <div class="card-body ">
          <div class="d-flex justify-content-space-around">
          </div>
          <h5 class="card-title" style="margin-left: 8px;margin-top: 10px;">IDR 150000/hari</h5>
          <a href="#" class="btn btn-primary center" style="width: auto">Lihat</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style=" border-radius: 10px; margin-top: 15px; border-color: rgb(255, 255, 255); ">
        <h5 class="card-title" style="padding-left: 25px; margin-top: 12px;">nama mobil</h5>
        <center><img src="{{env('NO_IMAGE_URL')}}" class="center gradient_image" width="240" height="200" /></center>
        <div class="card-body ">
          <div class="d-flex justify-content-space-around">
          </div>
          <h5 class="card-title" style="margin-left: 8px;margin-top: 10px;">IDR 150000/hari</h5>
          <a href="#" class="btn btn-primary center" style="width: auto">Lihat</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style=" border-radius: 10px; margin-top: 15px; border-color: rgb(255, 255, 255); ">
        <h5 class="card-title" style="padding-left: 25px; margin-top: 12px;">nama mobil</h5>
        <center><img src="{{env('NO_IMAGE_URL')}}" class="center gradient_image" width="240" height="200" /></center>
        <div class="card-body ">
          <div class="d-flex justify-content-space-around">
          </div>
          <h5 class="card-title" style="margin-left: 8px;margin-top: 10px;">IDR 150000/hari</h5>
          <a href="#" class="btn btn-primary center" style="width: auto">Lihat</a>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection