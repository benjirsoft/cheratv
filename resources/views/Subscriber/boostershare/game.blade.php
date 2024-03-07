@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="row">
    <div class="col-lg-12">
        <div class="row formtype">
          <div class="col-md-12">
            <div class="form-group">
                <img  src="{{ asset('assets') }}/img/minutebanner.jpg" width="100%" style="margin-bottom: 10px; margin-top:60px"/>
            </div>
            <div class="form-group">
                  <?php 

                      $checkboostshare = \App\Models\BoosterSubscriber::where('user_id', $userid=Auth::id())->first();
                  ?>
                  <center><h4>{{ $message ?? null}}</h4></center>
                <?php if($checkboostshare) { ?>
                  <?php
                  if(isset($randomNumber)) {
                      switch($randomNumber){
                        case 0:
                          echo '<Center><img src="'.asset('assets').'/img/image0.png" width="60" height="60" border-radius:50%/>';
                          break;
                        case 2:
             echo '<Center><img src="'.asset('assets').'/img/image2.png" width="60" height="60"/></center>';
                          break;
                        case 4:
                    echo '<Center><img src="'.asset('assets').'/img/image4.png" width="60" height="60"/></center>';
                          break;
                        case 6:
            echo '<Center><img src="'.asset('assets').'/img/image6.png" width="60" height="60"/></center>';
                          break;
                        case 8:
        echo '<Center><img src="'.asset('assets').'/img/image8.png" width="60" height="60"/></center>';
                          break;
                        case 10:
                echo '<Center><img src="'.asset('assets').'/img/image10.png" width="60" height="60"/></center>';
                      }
                    }
                  ?>   
                <br><br><br><br><br><br><br><br><br><center><a href="{{ route('gamep')}}"><img  src="{{ asset('assets') }}/img/button.png" width="50" height="50"/></a></center>
                <center><span style="font-weight:bold">Touch On Star Button</span></center>
                <?php } else { ?>
                 <a href="#" class="btn btn-primary">Please Purchase Boost Share</a>
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
