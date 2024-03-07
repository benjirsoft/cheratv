<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Account Dashboard</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/feathericon.min.css">
  <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/morris/morris.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.7.0/css/autoFill.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.7.0/js/dataTables.autoFill.min.js">
   </head>
  @yield('style')

<body>
  <div class="main-wrapper">
    <div class="header">
      <div class="header-left">
        <a href="/" class="logo"> <img src="{{ asset('assets') }}/img/hotel_logo.png" width="50" height="70" alt="logo"> <span class="logoclass">JolBihongo</span> </a>
        <a href="#" class="logo logo-small"> <img src="{{ asset('assets') }}/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a>
      </div>
      <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
      <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
      <?php
        $getdata =  \App\Models\Notification::orderBy('created_at', 'desc')->latest()->get();
        $newtotal = \App\Models\Notification::where('status', 0)->count();
      ?>
      <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">{{ $newtotal ?? null}}</span> </a>
          @if($newtotal ?? null)
            <audio autoplay>
                <source src="{{ asset('assets') }}/Notification - Notification.mp3" type="audio/ogg">
            </audio>
         @endif    
          <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header"> <span class="notification-title btn btn-default">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
            <div class="noti-content">
              <ul class="notification-list">
                   @foreach($getdata ?? [] as $list)
                        @if($list)
                            <li class="btn btn-danger">{{ $list->message ?? '' }}</li>
                        @endif
                    @endforeach
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown has-arrow">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy"></span> </a>
          <div class="dropdown-menu">
            <div class="user-header">
              <div class="avatar avatar-sm"> <img src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle"> </div>
              <div class="user-text">
                <h6>JolBihongo</h6>
                <p class="text-muted mb-0">{{ Auth::user()->id }}</p>
              </div>
            </div>  <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a> <a class="dropdown-item" href="#"></a><a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="/logout">Logout</a>
            <form id="logout-form" action="/logout" method="POST">
              @csrf
            </form> 
  
          </div>
        </li>
      </ul>
      <div class="top-nav-search">
        <form>
          <input type="text" class="form-control" placeholder="Search here">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
    <div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <li class="active"> <a href="{{ route('accountadmins')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
            <li class="list-divider"></li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span> Balance </span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('careatenbalanceform')}}"> Create Virtual Balance </a></li>
                <li><a href="{{ route('viewvitualbalance') }}"> View Create Virtual Balance </a></li>
                <li><a href="{{ route('accountbalance')}}"> Transfer Balance </a></li>
                <li><a href="{{ route('viewtransectionview')}}">View Transfer Balance </a></li>
                <li><a href="{{ route('subscriberslist')}}">Subscriber List</a></li>

              </ul>
              <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Widthrawal</span> <span class="menu-arrow"></span></a>
                <ul class="submenu_class" style="display: none;">
                  <li><a href="{{ route('accountrequestmoneyvview')}}">Widthrawal Request </a></li>
                  <li><a href="{{ route('paidlist')}}">Paid List</a></li>
                  <li><a href="{{ route('accountreport')}}">Account Report</a></li>
                </ul>
              </li>
              <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i><span>Transfer Pin</span> <span class="menu-arrow"></span></a>
                <ul class="submenu_class" style="display: none;">
                  <li><a href="{{ route('pinform')}}">Store Pin</a></li>
                  <li><a href="{{ route('updatepinform')}}">Update Pin</a></li>
                  <li><a href="{{ route('userpinshow')}}">Subscriber Pin List</a></li>
                </ul>
              </li>
            </li>
            <li><a href="/"><span>Go To Websiter</span> <span class="menu-arrow"></span></a></li>
          </ul>
        </div>
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