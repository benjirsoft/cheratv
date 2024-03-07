<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Subscriber Dashboard</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/feathericon.min.css">
  <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/morris/morris.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
   
</head>
  @yield('style')

<body>
  <div class="main-wrapper">
    <div class="header">
      <div class="header-left">
        <a href="/" class="logo"> <img src="{{ asset('assets') }}/img/hotel_logo.png" width="50" height="70" alt="logo"> <span class="logoclass">Cherapal TV</span> </a>
        <a href="{{ route('website')}}" class="logo logo-small" style="font-weight:bold; float:left; margin-left:40px">Video</a>
        <a href="{{ route('sourceout')}}" class="logo logo-small" style="font-weight:bold; float:right; margin-right:130px">OutSourcing</a>
      </div>
      <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
      <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
      <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">0</span> </a>
          <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
            <div class="noti-content">
              <ul class="notification-list">
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown has-arrow">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img">
            @if(Auth::user()->userimage->image)
                <img src="{{ asset('public/uploads/'.Auth::user()->userimage->image) }}" width="31"  alt="User Image"  class="avatar-img rounded-circle">               
            @else
                <img class="avatar-img rounded-circle" src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy"></span>
                
            @endif
          </a>
          <div class="dropdown-menu">
            <div class="user-header">
              <div class="avatar avatar-sm">
                @if(Auth::user()->userimage->image)
                <img src="{{ asset('public/uploads/'. Auth::user()->userimage->image) }}" alt="User Image" class="avatar-img rounded-circle">
                @else
                <img src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                @endif
              </div>
              <div class="user-text">
                <h6>Cherapal TV</h6>
                <p class="text-muted mb-0">{{ Auth::user()->id }}</p>
              </div>
            </div> <a class="dropdown-item" href="{{ route('profile')}}">{{ Auth::user()->name }}</a><button onclick="myFunction()" class="dropdown-item">Refer Link[Copy]</button><a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="/logout">Logout</a>
            <form id="logout-form" action="/logout" method="POST">
              @csrf
            </form>
            <input id="myInput" style="display:none" value="{{ Auth::user()->referral }}">
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
            <li class="active"> <a href="{{ route('subscribers')}}"><i class="fas fa-tachometer-alt"></i> <span> Dashboard</span></a> </li>
            <li class="list-divider"></li>
            <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Subscriber </span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('firstgeneration')}}">Subscriber List</a></li>
                <li><a href="{{ route('createsubscribertemplate')}}"> Create Subscriber </a></li>
                <li><a href="#">Renew Subscription</a></li>
                <li><a href="#">History</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Withdrawal </span><span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('receiveearn')}}">Total Withdrawal</a></li>
                <li><a href="{{ route('customerbalancetransferform')}}">Payout</a></li>
                <li><a href="{{ route('widtrawalrequest')}}">Payout History</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Recharge Balance</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('addbalancerequest')}}">Add Balance</a></li>
                <li><a href="{{ route('addbalancelist')}}">History</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Earning Balance</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('convertearningbalance')}}">Convert Balance</a></li>
                <li><a href="{{ route('convertview')}}">Convert History</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span>Watch Time</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('convertminutefomr') }}">Convert Minute</a></li>
                <li><a href="{{ route('watchtimelist') }}">Watch History</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Earning History</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('minuteearnbooster')}}">Earning History</a></li>
                <li><a href="{{ route('outsourceingss')}}">Outsourcing</a></li>
                <li><a href="{{ route('earninglist')}}">Boost Video</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span>Earning Pack</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                    <li><a href="{{ route('boostsharepurchase')}}">Booster Pack</a></li>
                <li><a href="#">Power Pack</a></li>
                <li><a href="#">Super Pack</a></li>
                <li><a href="{{ route('boosterself')}}">History</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span>Transfer Pin</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('transectionpinform')}}">Set New Pin</a></li>
                <li><a href="{{ route('pinupdateform')}}">Update Pin</a></li>
              </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span>My Profile</span> <span class="menu-arrow"></span></a>
              <ul class="submenu_class" style="display: none;">
                <li><a href="{{ route('profile')}}">Profile </a></li>
                <li><a href="{{ route('rank') }}">Level </a></li>
                <li><a href="{{ route('changepasswordform')}}">Password</a></li>
              </ul>
            </li>
            </li>
            
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
  <script src="{{ asset('assets') }}/js/table-treeview.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    var copyButton1 = document.getElementById('copy-button1');
    var copyButton2 = document.getElementById('copy-button2');

    copyButton1.addEventListener('click', copyPhoneNumber);
    copyButton1.addEventListener('touchstart', copyPhoneNumber);

    copyButton2.addEventListener('click', copyPhoneNumber);
    copyButton2.addEventListener('touchstart', copyPhoneNumber);

    function copyPhoneNumber(event) {
      var phoneNumber = event.target.previousElementSibling.innerText.split('-')[0];
      navigator.clipboard.writeText(phoneNumber);
      alert('Phone number copied: ' + phoneNumber);
    }
    
    function myFunction() {
      var copyText = document.getElementById("myInput");
      
      copyText.select();
      copyText.setSelectionRange(0, copyText.value.length); // Select the entire text
      
      navigator.clipboard.writeText(copyText.value)
        .then(() => {
          alert("Copied the text: " + copyText.value);
        })
        .catch(error => {
          console.error("Unable to copy: ", error);
        });
    }
    
</script>
  
</body>
</html>