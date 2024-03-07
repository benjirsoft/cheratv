@extends('layout.socialmedia.admin')
@section('content')
        <?php
            use Carbon\Carbon;
            $todaydate = Carbon::now();
            
            
            $userid = Auth::id();
            $pending = App\Models\Outsource::where('user_id', $userid)->where('status', 0)->get();
            $todayearn = App\Models\Earn::where('user_id', $userid)->wheredate('created_at', $todaydate)->sum('amount');
        ?>
      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-6 mt-3">
              </section>
            </div>
          </div>
        </div>
        <br>
        <h4>Todays Earning: {{ $todayearn }} BDT</h4>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif
        <div class="row">
            @foreach($pending as $project)
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                  <div class="card-body">
                    <div class="dash-widget-header">
                    <div style="align:center">
                        <center><span style="font-size:15px">{{ \App\models\Socialwork::where('id', $project->linkid)->first()->title ?? null }} </span></center>  
                        <h5 class="card_widget_header">
                            <a href="#">
                               <?php
                               
                                switch($project->category){
                                    case 1:
                                    echo '<center><img src="assets/img/like.jpg" width="200" height="50"></center>';
                                break;
                                    case 2:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                break;
                                    case 3:
                                    echo '<center><img src="assets/img/view.png" width="200" height="50"></center>';
                                break;
                                    case 4:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                break;
                                    case 5:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                break;
                                    case 6:
                                    echo '<center><img src="assets/img/follow.png" width="200" height="50"></center>';
                                break;
                                    case 7:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                }
                               ?>
                                 
                            </a>
                        </h5>
                        <div class="footer">
                            <div>
                                <center><form action="{{ route('outsourceimage')}}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control" type="file" id="formFile" name="image" required>
                                    <input class="form-control" type="hidden" value="{{ $project->linkid }}" name="linkid">
                                    <input class="form-control" type="hidden" value="{{ $project->id }}" name="id">
                                    <button>Save</button>
                                </form></center>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            @endforeach
        </div>    
        <div class="row">
            @foreach($list as $project)
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                  <div class="card-body">
                    <div class="dash-widget-header">
                      <div>
                        <center><h5 class="card_widget_header" style="margin-left:40px">
                            <center><a href="{{ route('outsourcing',[$project->id])}}">
                               <?php
                               
                                switch($project->category){
                                    case 1:
                                    echo '<center><img src="assets/img/like.jpg" width="200" height="50"></center>';
                                break;
                                    case 2:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                break;
                                    case 3:
                                    echo '<center><img src="assets/img/view.png" width="200" height="50"></center>';
                                break;
                                    case 4:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                break;
                                    case 5:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                break;
                                    case 6:
                                    echo '<center><img src="assets/img/follow.png" width="200" height="50"></center>';
                                break;
                                    case 7:
                                    echo '<center><img src="assets/img/youtube.png" width="200" height="50"></center>';
                                }
                               ?>
                                 
                            </a></center>
                        </h5></center>
                        <center><h6 class="text-muted"></h6><span style="margin-left:50px">{{$project->amount }} BDT</span></div></center>                  
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
  @endsection