<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Super Admin Dashboard</title>
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
        <a href="index.html" class="logo"> <img src="{{ asset('assets') }}/img/hotel_logo.png" width="50" height="70" alt="logo"> <span class="logoclass">Jolbihongo</span> </a>
        <a href="index.html" class="logo logo-small"> <img src="{{ asset('assets') }}/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a>
      </div>
      <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
      <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
      <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
          <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
            
          </div>
        </li>
        <li class="nav-item dropdown has-arrow">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy"></span> </a>
          <div class="dropdown-menu">
            <div class="user-header">
              <div class="avatar avatar-sm"> <img src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle"> </div>
              <div class="user-text">
                <h6>Jolbihongo</h6>
                <p class="text-muted mb-0">{{ Auth::user()->id }}</p>
              </div>
            </div> <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a> <a class="dropdown-item" href="#"></a><a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="/logout">Logout</a>
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
            <li class="active"> <a href="{{ route('superadmins')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
            <li class="list-divider"></li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Balance</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('superadminbalancetransection')}}">Balance Transection </a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span>Subscriber</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('requestsubscriber')}}"> Request All Subscriber </a></li>
                 <li><a href="{{ route('addbalancelistfromsuperadmin')}}"> Request Balance Subscriber </a></li>
                 <li><a href="{{ route('boosterlist')}}">Booster Subscriber list</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-book"></i> <span>Minute</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="#">Minute Balance </a></li>
                <li><a href="#"> Transfer Minute</a></li>
                <li><a href="#"> Earn Minute History</a></li>
                <li><a href="#"> Transfer History</a></li>
                <li><a href="#"> Receive Minute</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Bonus</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="#">Bonus </a></li>
                <li><a href="#">Bonus History </a></li>
                <li><a href="#">Bonus Convert</a></li>
                <li><a href="#">Bonus Convert History</a></li>
              </ul>
            </li>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span>Content Upload</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="#">Website Content Upload</a></li>
                <li><a href="#">Update Website Content</a></li>
                <li><a href="#">Video Upload</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Tag</a></li>
                <li><a href="#">Slide</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span>Accounts</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('giftaccount') }}">Gift Account</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-book"></i> <span>Role Management</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="#">User Role</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-edit"></i> <span>Order</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="#">New Order</a></li>
                <li><a href="#">Pendine Order</a></li>
                <li><a href="#">Reject Order</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-edit"></i> <span>User</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="#">All User</a></li>
              </ul>
            </li>
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