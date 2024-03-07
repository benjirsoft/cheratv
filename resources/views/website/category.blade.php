<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cherapal TV</title>
    <link rel="icon" type="image/ico" href="images/blackeye.ico"/>
    <link rel="stylesheet" href="webcss/style.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="webcss/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <nav class="searchbarss navbar navbar-expand-sm navbar-light bg-light">
		<button style="margin-left:5px; margin-top: 0px" type="button" class="navbar-toggler custom" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
        </button>
	    <a href="#"><img class="hide-on-large"  src="image/blackeye.png" style="margin-right:-100px" width="40" height="40"/></a>
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
				<a class="nav-link" href="/">Home</a>
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
	<?php 
	        
	    $userid = Auth::id();      
	    
	    $boostershare = \App\Models\BoosterSubscriber::where('user_id', $userid)->first()->packagename ?? null;
	    
	    
	    $sumWatchtime = \App\Models\Watchtime::join('videos', 'watchtimes.videoid', '=', 'videos.id')
    ->where('watchtimes.user_id', $userid)
    ->whereDate('watchtimes.created_at', now()->toDateString())
    ->where('videos.category_id', 22)
    ->sum('watchtimes.watchduration');
    
            foreach ($allcategory as $category) {
            $categoryid = $category->category_id;
        }
            
	?>
	<div class="feater" style="display:block; overflow:hidden">
        <div class="left-section" style="float:left; font-size:15px; margin-right:5px">
            @if($allcategory == "22")
                <span>Today's Earning : {{ $todayearntotal }} BDT</span><br>
                <span>Today's Ear-Limit: 30 Minutes </span><br>
                <span>Today's Seen:{{ $sumWatchtime }} Minutes</span><br>
           @endif
        </div>
        <div class="right-section" style="float:right; font-size:15px; margin-top:-65px; margin-right:5px">
               
        </div>
  </div>
  <?php $categoryname = \App\Models\Category::where('id', $categoryid)->first()->categories ?? null; 
  
  ?>
  <h4 class="buttonclass" style="margin-left:20px">{{ $categoryname }}</h4>
	<div class="container-fluid">
		<div class="row">
			@foreach($allcategory as $post)
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
    			    <div class="image">
					   <a href="{{ route('websitevideo', [$post->id]) }}">
    				        <img src="https://tv.cherapal.com/{{ $post->thambleimage }}" width="100%"   alt="Card image" style="border-radius:10px">
    				    </a> 
				    </div>
    			    
    			</div>
            @endforeach
		</div>
    </div>
	<div class="container-fluid">
	  <!-- Footer -->
	  <footer
			  class="text-center  text-lg-start"
			  style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(89,211,252,1) 35%, rgba(0,212,255,1) 100%);"
			  >
	     
			<div class="text-center p-2"style="background-color: rgba(0, 0, 0, 0.2)">
	    <a style="float:left" class="btn btn-primary" href="{{ route('package')}}"
       >Content Request</a
      >
        <a style="float:left" href="https://wa.me/+8801759826962"><img src="image/whatsapp.svg" width="40" height="40"/></a>
        <a  href="https://t.me/+UkOx2NA4xz9jNzNl"><img src="image/telegram.png" width="40" height="40"/></a>
	     <a  class="btn btn-primary" style="float:right; text-decoration:none;  color:white" href="{{ route('policy') }}">About Us</a>
		</div>
	
	  </footer>
	  <!-- Footer -->
	</div>
  </body>
</html>
