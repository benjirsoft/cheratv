<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cherapal TV</title>
      <link rel="stylesheet" type="text/css" href="webcss/style.css?{{rand(0,999)}}">
      <link rel="icon" type="image/ico" href="images/blackeye.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="webcss/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <nav class="searchbarss navbar navbar-expand-sm navbar-light bg-light">
    <button style="margin-left:5px; margin-top: 0px;" type="button" class="navbar-toggler custom" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
        </button>
      <a href="#"><img class="hide-on-large" src="image/blackeye.png" style="margin-right:-100px" width="40" height="40"/></a>
        @if(Auth::id())
        <div class="largehide">
            <a class="bottoncl"  href="{{ route('subscribers')}}">Dashboard</a>
        </div>
        @else
        <div class="largehide">
            <a class="buttonclass"  href="{{ route('customer')}}">Subscribe</a>
        </div>
        @endif        
	    <a style="margin-bottom:-5px" class="navbar-brand" href="/"><img src="image/Jolbihongo.png" width="150"/></a>
      <div id="navbarCollapse" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
        </li>
          @foreach($categories as $category)
    	    <li class="nav-item">
                <a href="{{ route('categoryall', [$category->id])}}" class="nav-link">{{ $category->categories}}</a>                  
            </li>
          @endforeach
      </ul>
        <ul  id="hidesamll" class="navbar-nav">
			  <li class="nav-item">
				<a class="buttonclass" class="nav-link" href="{{ route('customer')}}">Subscribe</a>
			  </li>
		</ul>
		<ul class="navbar-nav">
			  <li class="nav-item">
				<a href="{{route('login')}}"><img  class="hide-on-mini" src="image/blackeye.png" style="margin-right:-100px" width="45" height="45"/></a>
			  </li>
		</ul>
      </div>
    </nav>
    <br>
    <br>
    <div class="image">
        <center><img class="img-responsive" width="50%" height="50%" src="image/packagelist.png"/></center>
    </div>    
        <a style="float:right";  class="btn btn-success" href="https://wa.me/+8801759826962"><img class="whatsup" src="image/whatsapp.svg" width="30" height="30"/></a>
        <br>
        <br>
  <div class="container-fluid">
    <!-- Footer -->
    <footer
        class="text-center  text-lg-start"
        style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(89,211,252,1) 35%, rgba(0,212,255,1) 100%);"
        >
    
    <!-- Grid container -->

    <!-- Copyright -->
    <div>
      <div class="text-center p-2"style="background-color: rgba(0, 0, 0, 0.2)">
	    <a style="float:left" class="btn btn-primary" href="{{ route('package')}}"
       >Content Request</a
      >
        <a style="float:left" href="https://wa.me/+8801759826962"><img src="image/whatsapp.svg" width="40" height="40"/></a>
        <a  href="https://t.me/+UkOx2NA4xz9jNzNl"><img src="image/telegram.png" width="40" height="40"/></a>
	     <a  class="btn btn-primary" style="float:right; text-decoration:none;  color:white" href="{{ route('policy') }}">About Us</a>
		</div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
