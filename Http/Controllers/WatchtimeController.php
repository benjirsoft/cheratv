<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Watchtime;
use App\Models\Watch_minute;
use App\Models\Bonus;
use Carbon\Carbon;
use App\Models\Video;
use App\Models\BoosterSubscriber;
use App\Models\Subscriberearn;
use App\Models\BoossterWatchearn;
class WatchtimeController extends Controller
{


    public function boostview(Request $request)
    {
        $userid = Auth::id();

        $seconds = $request->input('elapsed_time');
        $videoid = $request->input('videoid');

        $minutes = floor($seconds / 60);
        
        $sumWatchtime = \App\Models\Watchtime::join('videos', 'watchtimes.videoid', '=', 'videos.id')
            ->where('watchtimes.user_id', $userid)
            ->whereDate('watchtimes.created_at', now()->toDateString())
            ->where('videos.category_id', 22)
            ->sum('watchtimes.watchduration');
        
        
        if($sumWatchtime < 30)
        {
            
            //normal 5 tk add option 
            
            
            $minutebalance =  Watch_minute::where('user_id', $userid)->first()->minute;
            if($minutes > $minutebalance){
                $setMinutes = $minutebalance;
            }else {
                $setMinutes = $minutes;
            }
            if($setMinutes && $setMinutes > 0){
    
                
                
                $getWalletBalance = Bonus::where('user_id', $userid)->first()->bonus; //Get wallet balance
                $getWallet = $getWalletBalance + ($setMinutes*5);
    
                $updateBonus = Bonus::where('user_id', $userid)->update([
                    'bonus' => $getWallet,
                ]);
                
                
                
                //    getWalletBalance + 5  && update to DB
                if($updateBonus){
                  
                    $updateMinute = $minutebalance - $setMinutes;
                    Watch_minute::where('user_id', $userid)->update([
                        'minute' => $updateMinute,
                    ]);
                }
                
                $earns = [
                    
                        'user_id' => $userid,
                        'section' => 'video watch',
                        'amount' => $setMinutes * 5,
                    
                    ];
                    
                $earns = Subscriberearn::create($earns);
               
            }
            
            $boostersubscriber = BoosterSubscriber::where('user_id', $userid)->first();
            if($boostersubscriber)
            {
                
                $getWalletBalance = Bonus::where('user_id', $userid)->first()->bonus; //Get wallet balance
                $getWalle = $getWalletBalance + ($minutes * 0.25);
    
                $updateBonus = Bonus::where('user_id', $userid)->update([
                    'bonus' => $getWalle,
                ]);
                
                if($updateBonus)
                {
                    
                    $data = [
                        
                        'user_id' => $userid,
                        'amount' => $minutes * 0.25,
                        'note' => "Earn From Boost Video",
                    ];
                    
                    $store = BoossterWatchearn::create($data);
                    
                    if($store)
                    {
                        $earn = [
                            
                                'user_id' => $userid,
                                'amount' => $minutes * 0.25,
                                'section' => "Earn From Boost Video Watch",
                            ];
                            
                            $datastore = Subscriberearn::create($earn);
                            
                            if($datastore)
                            {
                                
                                $watchtime = [
                                    
                                        'user_id' => $userid,
                                        'videoid' => $videoid,
                                        'watchduration' => $minutes,
                                    
                                    ];
                                    
                                    $minutestore = Watchtime::create($watchtime);
                            }
                    }
                    
                }
                
                
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        
        
        
    }       
    
    public function watchtime(Request $r)
    {

        //return $r->watch_time;
        $second = $r->watch_time;
        $video_id = $r->video_id;
        
        $categoryid = Video::where('id', $video_id)->first()->category_id ?? null;

        
        $videoowner = Video::where('id', $video_id)->first()->user_id;
        $categoryid = Video::where('id', $video_id)->first()->category_id;
        
            
        $getSecond = 0;
        $userid = Auth::id();
        $minutes = floor($second / 60); 
        
        $minutebalance =  Watch_minute::where('user_id', $userid)->first()->minute;
        if($minutes > $minutebalance){
            $setMinutes = $minutebalance;
        }else {
            $setMinutes = $minutes;
        }
        if($setMinutes && $setMinutes > 0){

            
            
            $getWalletBalance = Bonus::where('user_id', $userid)->first()->bonus; //Get wallet balance
            $getWallet = $getWalletBalance + ($setMinutes*5);

            $updateBonus = Bonus::where('user_id', $userid)->update([
                'bonus' => $getWallet,
            ]);
            
            
            
            //    getWalletBalance + 5  && update to DB
            if($updateBonus){
              
                $updateMinute = $minutebalance - $setMinutes;
                Watch_minute::where('user_id', $userid)->update([
                    'minute' => $updateMinute,
                ]);
            }
            
            
            $earns = [
                
                    'user_id' => $userid,
                    'section' => 'video watch',
                    'amount' => $setMinutes * 5,
                
                ];
                
            $earns = Subscriberearn::create($earns);
           
        }
           
        }
        
    }
    

