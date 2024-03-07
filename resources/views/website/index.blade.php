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
    <nav class="searchbarss navbar navbar-expand-xl navbar-light bg-light">
		<button style="margin-left:5px; margin-top: 0px;" type="button" class="navbar-toggler custom" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#"><img class="hide-on-large" src="image/blackeye.png"  style="margin-right:-100px" width="40" height="40"/></a>
        @if(Auth::id())
        <div class="largehide">
            <a class="bottoncl" style="text-decoration:none"  href="{{ route('subscribers')}}">Dashboard</a>
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
			  @if(Auth::id())  
			  <li class="nav-item">
				<a class="buttonclass" style="background-color:black; text-decoration:none" class="nav-link" href="{{ route('subscribers')}}">Dashboard</a>
			  </li>
			  @else
                <div class="nav-item">
                    <a class="buttonclass"  href="{{ route('customer')}}">Subscribe</a>
                </div>
               @endif
			</ul>
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a href="{{route('login')}}"><img  class="hide-on-mini" src="image/blackeye.png" style="margin-right:-100px" width="45" height="45"/></a>
			  </li>
			</ul>
	    </div>
	</nav>
	<div class="feater">
	 <h4 style="margin-left:10px; margin-bottom:2px"><span  class="category">Movies</span></h4>
	</div>
	<div class="container-fluid">
		<div class="row">
			@foreach($videos1 as $post)
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
    <div style="margin-top:-27px">
        <a href="{{ route('categoryall', 7 )}}" style="margin-right:25px; float:right; text-decoration:none">View All</a>
    </div>    
    <!-- Drama -->
    <div class="feater">
	 <h4 class="category" style="margin-left:10px">Drama</h4>
	     <!-- <a href="{{ route('categoryall', 19 )}}" class="category" style="margin-right:10px; float:right; text-decoration:none">View All</a> -->
	</div> 
	<div class="container-fluid">
		<div class="row">
    		@foreach($videos2 as $post)
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
    <div style="margin-top:-27px">
        <a href="{{ route('categoryall', 19 )}}" style="margin-right:25px; float:right; text-decoration:none">View All</a>
    </div>
	<div class="feater">
	 <h4 class="category" style="margin-left:10px">Short Film</h4>
	</div> 
	<div class="container-fluid">
		<div class="row">
    		@foreach($videos3 as $post)
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
    <div style="margin-top:-27px">
        <a href="{{ route('categoryall', 10 )}}" style="margin-right:25px; float:right; text-decoration:none">View All</a>
    </div>
    	<!-- Music Video -->
    	<div class="feater">
	   <h4 class="category" style="margin-left:10px">Music Video</h4>
	   </div> 
	<div class="container-fluid">
		<div class="row">
    		@foreach($videos4 as $post)
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
    <div style="margin-top:-27px">
        <a href="{{ route('categoryall', 11 )}}" style="margin-right:25px; float:right; text-decoration:none">View All</a>
    </div>
	<div class="feater">
	 <h4 class="category" style="margin-left:10px">Poetry</h4>
	</div>
	<div class="container-fluid">
		<div class="row">
    		@foreach($videos5 as $post)
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
    <div style="margin-top:-25px">
        <a href="{{ route('categoryall', 12 )}}" style="margin-right:25px; float:right; text-decoration:none">View All</a>
    </div>
    <!-- Blog -->
    <div class="feater">
	 <h4 class="category" style="margin-left:10px">Blog</h4>
	</div>
	<div class="container-fluid">
		<div class="row">
    		@foreach($videos6 as $post)
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
    <div style="margin-top:-27px">
        <a href="{{ route('categoryall', 20 )}}" style="margin-right:25px; float:right; text-decoration:none">View All</a>
    </div>
	<div class="container-fluid">
	  <!-- Footer -->
	  <footer
			  class="text-center  text-lg-start"
			  style="background: rgb(2,0,36);
background: linear-gradient(70deg, rgba(2,0,36,1) 0%, rgba(89,211,252,1) 35%, rgba(0,212,255,1) 100%)"
			  >
		
		<!-- Grid container -->

		<!-- Copyright -->
		
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
