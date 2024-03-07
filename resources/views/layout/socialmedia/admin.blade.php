<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Outsourcing Dashboard</title>
  <meta http-equiv="refresh" content="500;url={{ URL::current() }}">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/feathericon.min.css">
  <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/morris/morris.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css"> 
  </head>
  @yield('style')
<body>
  <div class="main-wrapper">
    <div class="header">
      <div class="header-left">
        <a href="#" class="logo"> <img src="{{ asset('assets') }}/img/hotel_logo.png" width="50" height="70" alt="logo"> <span class="logoclass">Cherapal TV</span> </a>
        <a href="{{ route('subscribers') }}" class="logo logo-small">Dashboard</a>
      </div>
      <div class="top-nav-search">
        <form>
          <input type="text" class="form-control" placeholder="Search here">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
    <div class="page-wrapper">

      @yield('content')

    </div> 
  </div>
  <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="{{ asset('assets') }}/js/jquery-3.5.1.min.js"></script>
  <script src="{{ asset('assets') }}/js/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/raphael/raphael.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/morris/morris.min.js"></script>
  <script src="{{ asset('assets') }}/js/chart.morris.js"></script>
  <script src="{{ asset('assets') }}/js/script.js"></script>
</body>

</html>