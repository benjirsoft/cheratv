<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jolbihongo</title>
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
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <p>
<span style="font-size:25px; font-weight:bold">আমাদের সমন্ধে জানুন</span>-<br>

JolBIhongo- প্ল্যাটফর্মে আমরা বিশ্বাস করি যে, দুর্দান্ত কন্টেন্টসমূহ সবার কাছে অ্যাক্সেসযোগ্য হওয়া উচিত। এই কারণেই আমরা একটি ভিডিও স্ট্রিমিং ওয়েবসাইট তৈরি করেছি যা সিনেমা, নাটক, শর্ট ফিল্ম, মিউজিক ভিডিও, কবিতা, ব্লগ এবং আরও অনেক কিছু অফার করে, যার সবই আপনার নখদ
র্পণে বিদ্যমান।<br>
<br>
আমাদের লক্ষ্য একটি প্ল্যাটফর্ম প্রদান করা যা দর্শকদের তাঁদের পছন্দের কন্টেন্ট এর সাথে সংযুক্ত করে এবং আগ্রহী সদস্যদের নিয়ে একটি কমিউনিটি তৈরি করে৷ আমরা একটি ব্যবহারকারী-বান্ধব ইন্টারফেস, সহজ নেভিগেশন, এবং ভিডিওগুলির একটি বৈচিত্র্যপূর্ণ প্রদর্শন অফার করতে প্রতিশ্রুতিবদ্ধ যাতে আপনাকে ঘন্টার পর ঘ
ন্টা বিনোদন দেওয়া যায়।<br>
<br>

আরও সুখকর বিষয় হলো, আমরা আমাদের সদস্যদের পুরস্কৃত করার মূল্য বুঝি। তাই আমরা একটি রেফারেল প্রোগ্রামও অফার করি যা আপনাকে অন্যদের JolBihongo প্ল্যাটফর্মে যোগদানের জন্য আমন্ত্রণ জানিয়ে অর্থ উপার্জন করতে দেয়।<br>
<br>

তাছাড়া Boost Content উপভোগ করার মাধ্যমে, আপনি একই সময়ে  কিছু অতিরিক্ত উপার্জন করতে পারেন। পাশাপাশি আপনি আপনার ইউটিউব চ্যানেল এর ভিডিও সমূহ আমাদের প্ল্যাটফর্মে সম্পৃক্ত করেও উপার্জন করতে পারেন
।<br>
<br>

আমাদের ব্যবহারকারীদের সম্ভাব্য সর্বোত্তম সেবা প্রদানের জন্য আমরা ক্রমাগত আমাদের প্ল্যাটফর্ম উন্নত করছি। আমাদের নিবেদিত কর্মীগণ সর্বদা নতুন এবং চিত্তচাঞ্চল্যকর বিষয়বস্তু, সেইসাথে ব্যবহারকারীর উপার্জন উন্নত করার উদ্ভাবনী 
উপায়গুলির সন্ধানে থাকে৷<br>
<br>

JolBIhongo প্ল্যাটফর্মে আমরা প্রত্যাশা করি যে, আগ্রহী দর্শকদের আনন্দ বন্টন করার পাশাপাশি অর্থ উপার্জনের চমৎকার এই সুযোগ সৃষ্টির জন্য সুন্দর মনের সদস্যদের নিকট আমরা আন্তরিকতা পাবো। আপনাদের সহযোগীতায় আমরা এমন একটি কমিউনিটি গঠন করতে প্রতিশ্রুতিবদ্ধ যা আরও অগুনতি দর্শকদের দুর্দান্ত বিনোদন ও উপার্জনের সুযোগ দেবে।
<br>
<br>
JolBihongo<br>
Watch & Earn</p>
<br>
<br>
        </div>
        <h3>নিয়মনীতি</h3>
        <div class="row content">
          <div class="col-lg-12 pt-2 pt-lg-0">
              
            <p>
              
            বয়স সীম: JolBIhongo ওয়েবসাইট ব্যবহার করার জন্য ব্যবহারকারীদের অবশ্যই কমপক্ষে ১৫ বছর বয়সী হতে হবে। 
            <br>
            <br>
            
            শুধুমাত্র ব্যক্তিগত ব্যবহার: JolBIhongo ওয়েবসাইটটি শুধুমাত্র ব্যক্তিগত, অ-বাণিজ্যিক ব্যবহারের জন্য।  ব্যবহারকারীদের অনুমতি ছাড়া ওয়েবসাইট থেকে কোনো বিষয়বস্তু পুনরুত্পাদন, বিতরণ বা 
            প্রদর্শনের অনুমতি নেই।<br>
            <br>
            
            অ্যাকাউন্ট তৈরি: ব্যবহারকারীদের JolBIhongo ওয়েবসাইট ব্যবহার করার জন্য একটি অ্যাকাউন্ট তৈরি করতে হবে। তারা তাদের অ্যাকাউন্টের তথ্যের গোপনীয়তা বজায় রাখার জন্য এবং তাদের অ্যাকাউন্টে ঘটে যাওয়া যেকোনো কার্যকলাপের 
            জন্য দায়ী।<br>
            <br>
            
            ব্যবহারকারীর আচরণ: ব্যবহারকারীদের কোন বেআইনি বা অননুমোদিত উদ্দেশ্যে JolBIhongo ওয়েবসাইট ব্যবহার করা নিষেধ। ব্যবহারকারীরা অন্য ব্যবহারকারীদের হয়রানি বা ক্ষতি করতে পারবে না, মিথ্যা বা বিভ্রান্তিকর তথ্য পোস্ট করতে পারবে না বা ওয়েবসাইট বা এর ব্যবহারকারীদের ক্ষতি করতে পারে এমন কোনো কার্যকলাপে জড়িত হতে পারবে।
<br> 
<br>
            বিষয়বস্তুর মালিকানা: JolBIhongo ভিডিও, ছবি এবং পাঠ্য সহ ওয়েবসাইটের সমস্ত কন্টেন্ট এর অধিকারের মালিক৷  ব্যবহারকারীরা অনুমতি ছাড়া ওয়েবসাইটে কোনো বিষয়বস্তু অনুলিপি, বিতরণ বা পরিবর্তন করতে
            পারবে না।<br>
            <br>
            রেফারেল প্রোগ্রাম: রেফারেল প্রোগ্রামে অংশগ্রহণকারী ব্যবহারকারীরা সমস্ত প্রযোজ্য আইন বিধান মেনে চার জন্য দায়ী। ব্যবহারকারীরা কোনো প্রতারণামূলক বা প্রতারণামূলক কার্যকলাপে জড়িত হতে পারবে না এবং প্রোগ্রামের শর্তাবলী লঙ্ঘন করে এমন কোনো প্রণোদনা দিতে পারবে না।<br>
            <br>
            
            সমাপ্তি: JolBIhongo, ব্যবহারকারীর অ্যাকাউন্টগুলি বন্ধ করার এবং ওয়েবসাইটের শর্তাবলী লঙ্ঘন করে এমন কোনও সামগ্রী সরানোর অধিকার সংরক্ষণ করে৷ JolBIhongo কোনো বিজ্ঞপ্তি ছাড়াই যে কোনো সময় শর্তাবলী পরিবর্তন বা উন্নতি করার অধিকার সংরক্ষণ করে।
            </p>
          </div>
        </div>

      </div>
    </section>
    
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
