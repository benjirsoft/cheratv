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
    
    use Carbon\Carbon;
    
    $todayDateValue = Carbon::today();
    $todayearntotal = \App\Models\BoossterWatchearn::where('user_id', $userid)
    ->whereDate('created_at', '=', $todayDateValue->toDateString())
    ->sum('amount');

     
	?>
	
	
  <div class="feater" style="display:block; overflow:hidden">
        <div class="left-section" style="float:left; font-size:15px; margin-right:5px">
            @if($namecategory == "Boost Content")
                <span>Today's Earning : {{ $todayearntotal }} BDT</span><br>
                <span>Today's Ear-Limit: {{ 30 - $sumWatchtime }} Minutes </span><br>
                <span>Today's Seen:{{ $sumWatchtime }} Minutes</span><br>
           @endif
        </div>
        <div class="right-section" style="float:right; font-size:15px; margin-top:-65px; margin-right:5px">
                <div id="timePlayed" style="margin-left: 120px; color: red; margin-top:5px; margin-bottom:5px">
                    Timer: <span id="elapsedTime">0:00:00</span>
                </div><br>
            @if($namecategory == "Boost Content")
                <form action="{{ route('watchtimeboost')}}" method="get">
                  <input type="hidden" id="elapsedTimeInput" name="elapsed_time" value="">
                  <input type="hidden" name="videoid" value="{{request()->id}}">
                  
                  <button style="margin-left:130px; margin-top:-45px" type="submit" class="btn btn-primary">Submit</button>
                </form>  
           @endif
        </div>
  </div> 
  <br>
  <br>
  <br>

  <div class="card-container" style="margin-top:-40px">
      <div class="card">
        <div class="player" id="player"></div>
      </div>
  </div>
  <div style="margin-top:5px" class="container-fluid">
    <h4 style="margin-left: 10px; margin-right: 10px; text-align: center; padding: 10px; background:red; border-radius:5px; color:white">{{ $namecategory }}</h4>


    <div class="row">
      @foreach($findall as $post)
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
              <div class="image">
                  <a href="{{ route('websitevideo', [$post->id]) }}">
                    <img src="https://tv.cherapal.com/{{ $post->thambleimage}}" width="100%"  alt="Card image" style="border-radius:10px">
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
    <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
   <script type="text/javascript">
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;

      <?php  $categoryid = \App\Models\Video::where('id', request()->id)->first()->category_id;

      ?>



     if ({{ $categoryid }} === 22) {

      function onYouTubeIframeAPIReady() {
          player = new YT.Player('player', {
              height: '390',
              width: '350',
              videoId: '{{ $videoid ?? NULL }}',
              playerVars: {
                  controls: 0, // Disable player controls
              },
              events: {
                  'onReady': onPlayerReady,
                  'onStateChange': onPlayerStateChange
              }
          });
      }

      // 4. The API will call this function when the video player is ready.
      var seconds = 0;
      var timer;
      function onPlayerReady(event) {
          event.target.playVideo();

          startTimer();
      }

      

       async function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING) {
                // Player play
                startTimer();
            } else {
                // Player pause
                if (seconds > 0) {
                    updateTimerDisplay();
                    document.getElementById('elapsedTimeInput').value = seconds;
                }
                clearInterval(timer);
            }
        }

      function startTimer() {
          timer = setInterval(function () {
              seconds++;
              updateTimerDisplay();
          }, 1000);
      }

      function updateTimerDisplay() {
          // Convert seconds to HH:MM:SS format
          var hours = Math.floor(seconds / 3600);
          var minutes = Math.floor((seconds % 3600) / 60);
          var remainingSeconds = seconds % 60;

          // Format the time as HH:MM:SS
          var formattedTime = `${hours}:${minutes}:${remainingSeconds}`;

          document.getElementById('elapsedTime').innerText = formattedTime;
      }

      function stopVideo() {
          player.stopVideo();
      }

    }
    else 
    {

      function onYouTubeIframeAPIReady() {
          player = new YT.Player('player', {
              height: '390',
              width: '350',
              videoId: '{{ $videoid ?? NULL }}',
              events: {
                  'onReady': onPlayerReady,
                  'onStateChange': onPlayerStateChange
              }
          });
      }

      // 4. The API will call this function when the video player is ready.
      var seconds = 0;
      var timer;
      function onPlayerReady(event) {
          event.target.playVideo();
        
      }

       async function onPlayerStateChange(event) {
          if (event.data == YT.PlayerState.PLAYING) {
              // Player play
              startTimer();
          } else {
              // Player pause
              if (seconds > 0) {
                  let data = {
                      'watch_time': seconds,
                      'video_id': '{{request()->id}}'
                  };
                  let response = await axios.post('{{ route("watchtime") }}', data);
                  console.log(response.data);
              }
              clearInterval(timer);
          }
      }

      function startTimer() {
          timer = setInterval(function () {
              seconds++;
              updateTimerDisplay();
          }, 1000);
      }

      function updateTimerDisplay() {
    // Convert seconds to HH:MM:SS format
          var hours = Math.floor(seconds / 3600);
          var minutes = Math.floor((seconds % 3600) / 60);
          var remainingSeconds = seconds % 60;

          // Format the time as HH:MM:SS
          var formattedTime = `${hours}:${minutes}:${remainingSeconds}`;

          // Update the timePlayed element
          document.getElementById('timePlayed').innerText = 'Time Played: ' + formattedTime;
      }

      function stopVideo() {
          player.stopVideo();
      }
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
