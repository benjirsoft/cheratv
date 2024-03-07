@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-4"><span style="font-size: 18px;">Purchage  Booster Pack</span></h5>
      </div>
    </div>
    <?php 
        
        $userid = Auth::id();
        
        $totaloutsource = \App\Models\Earn::where('user_id', $userid)->sum('amount');
        $boostervideowatch = \App\Models\BoossterWatchearn::where('user_id', $userid)->sum('amount');
    ?>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="row formtype">
          <div class="col-md-12">
            <div class="form-group">
              <center><label><span style="font-size:13px">Booster Pack</span></label></center>
                <center><input style="background:#0069D9; color:white; font-weight:bold; font-size:25px; text-align:center" class="form-control" value="1100 BDT" readonly name="shareamount" type="numeric"></center>
               <?php 
                 $booster =\App\Models\BoosterSubscriber::where('user_id', $userid=Auth::id())->first();
                ?>
                @if($booster)
                <br>
                  <center><h4 class="btn btn-primary">You are already Updated Booster Pack.</h4></center>
                  <center><h4 class="btn btn-primary">Total Earnings Possibility= 3000 BDT</h4></center>
                   <center><h4 class="btn btn-primary">Till Now Earning=  {{$totaloutsource + $boostervideowatch}} BDT</h4></center>
                   <br>
                   <center><h4 class="btn btn-primary">Condition= 1 Refer Booster Package UpTo Earning 1500 BDT</h4></center>
                @else
               </center><a style="margin-left:120px" href="{{ route('boostsharepurchaseadd')}}" class="btn btn-primary"><span style="font-size:18px;">Next</span></a></center>
               @endif
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
