<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | Arya-rent</title>
  
  <link rel="icon" type="image/x-icon" href="/img/ico.ico">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<style>
  body {
    background-color: #F6F7F9;
  }

  .footer {
    display: flex;
    flex-flow: row wrap;
    padding: 30px 30px 20px 30px;
    color: #2f2f2f;
    background-color: #fff;
    border-top: 1px solid #e5e5e5;
  }

  .footer>* {
    flex: 1 100%;
  }

  .footer__addr {
    margin-right: 1.25em;
    margin-bottom: 2em;
  }

  .footer__logo {
    font-family: 'Pacifico', cursive;
    font-weight: 400;
    text-transform: lowercase;
    font-size: 1.5rem;
  }

  .footer__addr h2 {
    margin-top: 1.3em;
    font-size: 15px;
    font-weight: 400;
  }

  .nav__title {
    font-weight: 400;
    font-size: 15px;
  }

  .footer address {
    font-style: normal;
    color: #999;
  }

  .footer__btn {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 36px;
    max-width: max-content;
    background-color: rgb(33, 33, 33, 0.07);
    border-radius: 100px;
    color: #2f2f2f;
    line-height: 0;
    margin: 0.6em 0;
    font-size: 1rem;
    padding: 0 1.3em;
  }

  .footer ul {
    list-style: none;
    padding-left: 0;
  }

  .footer li {
    line-height: 2em;
  }

  .footer a {
    text-decoration: none;
  }

  .footer__nav {
    display: flex;
    flex-flow: row wrap;
  }

  .footer__nav>* {
    flex: 1 50%;
    margin-right: 1.25em;
  }

  .nav__ul a {
    color: #999;
  }

  .nav__ul--extra {
    column-count: 2;
    column-gap: 1.25em;
  }

  .legal {
    display: flex;
    flex-wrap: wrap;
    color: #999;
    margin-left: 75px;
    margin-right: 75px;
  }

  .legal__links {
    display: flex;
    align-items: center;
  }

  .heart {
    color: #2f2f2f;
  }

  @media screen and (min-width: 24.375em) {
    .legal .legal__links {
      margin-left: auto;
    }
  }

  @media screen and (min-width: 40.375em) {
    .footer__nav>* {
      flex: 1;
    }

    .nav__item--extra {
      flex-grow: 2;
    }

    .footer__addr {
      flex: 1 0px;
    }

    .footer__nav {
      flex: 2 0px;
    }
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-white bg-white">
    <div class="container" style="margin-bottom: 15px; margin-top: 15px; ">
      <!--kalo fluid penuh full 1 page-->
      <a class="navbar-brand" href="/">
        <img src="/img/Logo (2).png " width="120" alt="" class="scr">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
          @else

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">

              <span>{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              
            <li><a class="dropdown-item" href="/profile">profile</a></li>
              <li><a class="dropdown-item" href="/transaction">Transaction</a></li>
              <li><a class="dropdown-item" href="/logout">Log Out</a></li>

              @endguest
            </ul>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

</body>

<br>
<footer class="footer" style="margin-top: 55px;">
  <div class="footer__addr" style="margin-left: 75px;margin-right: 75px;">
    <h1 class="footer__logo"><img src="/img/Logo (2).png " width="120" alt="" class="scr"></h1>

    <h2>Contact</h2>

    <address>
      5534 Somewhere In. The World 22193-10212<br>

      <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
    </address>
  </div>

  <ul class="footer__nav">
    <li class="nav__item">
      <h2 class="nav__title">Media</h2>

      <ul class="nav__ul">
        <li>
          <a href="#">Online</a>
        </li>

        <li>
          <a href="#">Print</a>
        </li>

        <li>
          <a href="#">Alternative Ads</a>
        </li>
      </ul>
    </li>

    <li class="nav__item nav__item--extra">
      <h2 class="nav__title">Technology</h2>

      <ul class="nav__ul nav__ul--extra">
        <li>
          <a href="#">Hardware Design</a>
        </li>

        <li>
          <a href="#">Software Design</a>
        </li>

        <li>
          <a href="#">Digital Signage</a>
        </li>

        <li>
          <a href="#">Automation</a>
        </li>

        <li>
          <a href="#">Artificial Intelligence</a>
        </li>

        <li>
          <a href="#">IoT</a>
        </li>
      </ul>
    </li>

    <li class="nav__item">
      <h2 class="nav__title">Legal</h2>

      <ul class="nav__ul">
        <li>
          <a href="#">Privacy Policy</a>
        </li>

        <li>
          <a href="#">Terms of Use</a>
        </li>

        <li>
          <a href="#">Sitemap</a>
        </li>
      </ul>
    </li>
  </ul>

  <div class="legal">
    <p>&copy; 2019 Something. All rights reserved.</p>

    <div class="legal__links">
      <span>Made with <span class="heart">♥</span> remotely from Anywhere</span>
    </div>
  </div>
</footer>