<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\BalanceRequest;
use App\Models\Transectionpin;
use App\Models\Addbalancetransection;
use App\Models\Balance;
use App\Models\BoosterSubscriber;
use Illuminate\Support\Facades\DB;
use App\Models\Subscriber;
use App\Models\Watch_minute;
use App\Models\Boostgame;
use Carbon\Carbon;
use App\Models\Watchtime;
use App\Models\AccountMinute;
use App\Models\Bonus;
use App\Models\Subscriptionearning;
use App\Models\MinuteConvert;
use App\Models\Boostersharereferminute;
use App\Models\EarnBooster;
use App\Models\Subscriberearn;


class AddbalanceController extends Controller
{
    //minute convert to earning balance 
    public function minuteconvert(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'minute' => 'required',
            'pin' => 'required|numeric',
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $useramount = $request->input('minute');
        $pin = $request->input('pin');



        if ($useramount < 20)
        {
            return redirect()->back()->withErrors('Please Transfer Minimum 20 Minute');
        }

        $userid = Auth::id();
        $amount = Watch_minute::where('user_id', $userid)->first()->minute;
        if( $amount < $useramount)
        {
            return redirect()->back()->withErrors('Insufficient Minute Balance');
        }


        $userpin = Transectionpin::where('user_id', $userid)->first();

        if($userpin)
        {
            $userpins = $userpin->pin;
        }
        else
        {
            $userpins = null;
        }
        if($userpins != $pin)
        {
            return redirect()->back()->withErrors('your pin does not match');
        }

        $bonus = Watch_minute::where('user_id', $userid)->first();

        $bonus->minute -= $useramount;

        $bonus->save();

        $blance = Bonus::where('user_id', $userid)->first();

        $blance->bonus += $useramount * 4;

        $blance->save();

        $converttransection = new MinuteConvert;

        $converttransection->user_id = $userid;
        $converttransection->amount = $useramount;
        $converttransection->save(); 
        $onetk = 1;
        
        $account = [
            
            'user_id' => $userid,
            'amount' => $onetk,
            ];
            
        $insert = AccountMinute::create($account);
        
        $history = [
            'user_id' => $userid,
            'tk' => $useramount * 4,
            'section' => "Minute Convert",
            'sourceid' => "From Self Minute Balance"
            ];
            
        $store = Boostersharereferminute::create($history); 
        
        $subscriberearn = [
                
                'user_id' => $userid,
                'section' => 'minuteconvert',
                'amount' => $useramount * 4,
            ];
            
            $storeminuteconvert = Subscriberearn::create($subscriberearn);

        return redirect()->back()->with('success', 'Minute Balance Convert Successfully');
        
        
    }
    
    
    public function watch_minute()
    {
        $userid = Auth::id();
        $watchtime = Watchtime::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
        return view('Subscriber.videoplaylist.subscriberplaylist', compact('watchtime'));
    }
    
    public function earnminutelist()
    {
        $userid = Auth::id();
        $minutelist = Boostgame::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
        return view('Subscriber.boostershare.boostershareearninghistory', compact('minutelist'));
    }
    
     private $fixedNumbers = [0, 2, 4, 6];
     private $played = false;

    private function getRandomNumber()
    {
        return $this->fixedNumbers[array_rand($this->fixedNumbers)];
    }

    public function play()
    {

        $user = Auth::id();
        $today = Carbon::today();
        $checkTodayData = Boostgame::where('user_id', $user)->whereDate('created_at', $today)->first();
        if($checkTodayData)
        {
            $message = "Already Completed";
            return view('Subscriber.boostershare.game', compact('message'));   
        }
        else
        { 
            $randomNumber = $this->getRandomNumber();
            $userdata = [

                'user_id' => $user,
                'digit' => $randomNumber,  
            ];
            
            $booster = BoosterSubscriber::where('user_id', $user)->first()->status ?? null;
            
            if($booster==1)
            {
                $insert = Boostgame::create($userdata);
                $finduser = Watch_minute::where('user_id', $user)->first();
                $finduser->minute += $randomNumber * 25;
                $finduser->save();
                
                
                $minuteadd = [
                
                'user_id' => $user,
                'minute' => $randomNumber * 25,
                'section' => 'Bonus Button',
                'sourceid'=> 'Self',
            ];
            
            $store = Boostersharereferminute::create($minuteadd);
            
            $buttonincome = [
                    
                    'user_id' => $user,
                    'boostersell' => 0,
                    'bonusbutton' => ($randomNumber * 25) * 5,
                ];
            
            $bonusbotton = EarnBooster::create($buttonincome);
                
            }
            else{
                
                $insert = Boostgame::create($userdata);
                $finduser = Watch_minute::where('user_id', $user)->first();
                $finduser->minute += $randomNumber;
                $finduser->save();
                
                $minuteadd = [
                
                'user_id' => $user,
                'minute' => $randomNumber,
                'section' => 'Bonus Button',
                'sourceid'=> 'Self',
            ];
            
            $store = Boostersharereferminute::create($minuteadd);
            
            $buttonincome = [
                    
                    'user_id' => $user,
                    'boostersell' => 0,
                    'bonusbutton' => $randomNumber * 5,
                ];
            
            $bonusbotton = EarnBooster::create($buttonincome);
                
            }
            
            return view('Subscriber.boostershare.game', compact('randomNumber'));   
        }
    }

    public function gamepage()
    {

        return view('Subscriber.boostershare.game');
    }

    public function termandcondition()
    {

        return view('Subscriber.boostershare.tarmandcondition');

    }

    public function shareconfirmpurchase(Request $request)
    {

        $userid = Auth::id();

        $pin =$request->input('transectionpin');
        $amount = $request->input('amount');
        $useramount = Balance::where('user_id', $userid)->get()->first();
        $transectionpin =Transectionpin::where('user_id', $userid)->first();
        $pins = $transectionpin->pin;
        if($pin != $pins)
        {
            return redirect()->back()->withErrors([ 'Error' => 'Your transection Pin Is Not Currect']);
        } 

        DB::beginTransaction();
            try {
                if ($useramount->amount < $amount){
                    return redirect()->back()->withErrors(['error' => 'your do not have sufficient balance']);
                }
                
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
               
            }

        $useramount->amount -= $amount;
        $useramount->save();

        $packagename = 'Booster ID';

        $boostersubscriber = [

            'user_id' => $userid,
            'packagename' => $packagename,
            'amount' => $amount,
        ];

        $insert = BoosterSubscriber::create($boostersubscriber);

        $finddirectrefer = Subscriber::where('user_id', $userid)->first()->sponsor_id;

        $indirectrefer = Subscriber::where('user_id', $finddirectrefer)->first()->sponsor_id;

        $direct = BoosterSubscriber::where('user_id', $finddirectrefer)->first();
        if($direct)
        {
            $fortyminute = '20';

            $minutefordirect = Watch_minute::where('user_id', $finddirectrefer)->first();
            $minutefordirect->minute += $fortyminute;
            $minutefordirect->save();
            
            $directuser = [
                    
                    'user_id' => $finddirectrefer,
                    'minute' => $fortyminute,
                    'section' => 'Booster Share',
                    'sourceid' => $userid,
                
                ];
                
            $insert = Boostersharereferminute::create($directuser);
            
            $earn = [
                    'user_id' => $finddirectrefer,
                    'boostersell' => 100,
                    'bonusbutton' => 0,
                ];
                
                
                $earnstore = EarnBooster::create($earn);
                
        }

        $indirectrefers = BoosterSubscriber::where('user_id', $indirectrefer)->first();
        if($indirectrefers)
        {
            $fortyminute = '20';
            $minutefordirect = Watch_minute::where('user_id', $indirectrefer)->first();
            $minutefordirect->minute += $fortyminute;
            $minutefordirect->save();
            
            $indirectuser = [
                
                    'user_id' => $indirectrefer,
                    'minute' => $fortyminute,
                    'section' => 'Booster Share',
                    'sourceid' => $userid,
                
                ];
            $store = Boostersharereferminute::create($indirectuser);
            
             $earns = [
                    'user_id' => $indirectrefer,
                    'boostersell' => 100,
                    'bonusbutton' => 0,
                ];
                
                
                $earns = EarnBooster::create($earns);
        }

        return redirect()->back()->with('success', 'Booster Package Successfully Purchase');       

    }

    public function boost()
    {
        $amountofshare = '1100';
        return view('Subscriber.boostershare.transectionpin', compact('amountofshare'));
    }

    public function boostershare()
    {
        $userId = Auth::id();
        $registrationDate = BoosterSubscriber::where('user_id', $userId)->value('created_at');
        // Use Carbon's parse method to convert the timestamp to a Carbon instance
        $userDate = Carbon::parse($registrationDate);
        
        // Add one year to the userDate
        $nextYearDate = $userDate->copy()->addMonths(6);
    
        // Calculate the difference in days between the current date and the next year date
        $remainingDays = Carbon::now()->diffInDays($nextYearDate, false);
        
        
        $earntotal = EarnBooster::where('user_id', $userId)->get();
        
        // Initialize counters
        $boostersellTotal = 0;
        $bonusbuttonTotal = 0;
        
        // Loop through each item in the collection and accumulate values
        foreach ($earntotal as $item) {
            $boostersellTotal += $item->boostersell;
            $bonusbuttonTotal += $item->bonusbutton;
        }
        
        $sixthousandtk = 6000;
        $totalEarn = $boostersellTotal + $bonusbuttonTotal;
        
        $earn = $sixthousandtk - $totalEarn;
        
        return view('Subscriber.boostershare.boostershare', compact('remainingDays', 'earn'));

    }


    public function addbalance()
    {

        return view('Subscriber.balance.addbalance');

    } 

    public function addbalancetosubscriber(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'paymentmethod' => 'required',
            'sendernumber' => 'required',
            'transection' => 'required'
        ]);

        if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $receivenumber = '01759826962';

        $userid = Auth::id();

        $data = [

            'receivenumber' => $receivenumber,
            'user_id' => $userid,
            'amount' => $request->amount,
            'paymentmethod' => $request->paymentmethod,
            'sendernumber' => $request->sendernumber,
            'transection' => $request->transection,

        ];

        $insert = BalanceRequest::create($data);

        return redirect()->back()->with('success', 'Balance Request Added Successfully');
    }

    public function addbalancerequesthistory()
    {

        $userid = Auth::id();
        $balancerequest = BalanceRequest::where('user_id', $userid)->get();
        return view('Subscriber.balance.addbalancehistory', compact('balancerequest'));

    }

    public function addbalancerereuest()
    {
        
        $balancerequest = BalanceRequest::all();
        return view('Superadmin.Balance.addbalancerequesthistory', compact('balancerequest'));
    }

    public function transferbalance($id)
    {

        $requestid = BalanceRequest::where('id', $id)->first();


        return view('Superadmin.Balance.transferbalance', compact('requestid'));

    }

    public function actiontransferamount(Request $request)
    {


        $amount = $request->input('amount');
        $subscriberid = $request->input('subscriberid');
        $paymentmethod = $request->input('paymentmethod');
        $sendermobileno = $request->input('sendermobileno');
        $subscribermobilebankingno = $request->input('subscribermobilebankingno');
        $pin = $request->input('pin');
        $id = $request->input('id');

        $userid = Auth::id();
          // check sender_id and receiver_id
        $sender = Balance::where('user_id', $userid)->get()->first();
        $receiver = Balance::where('user_id', $subscriberid)->get()->first();
        $transectionpin =Transectionpin::where('user_id', $userid)->get()->first();

         $pins = $transectionpin->pin;


         if($pin != $pins)
         {

            return redirect()->back()->withErrors([ 'Error' => 'Your transection Pin Is Not Currect']);

         }       

            DB::beginTransaction();
            try {



                if ($sender->amount < $amount){

                    return redirect()->back()->withErrors(['error' => 'your do not have sufficient balance']);
                }
                
               


                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => 'Transfer failed']);
            }

        // update sender balance
        $sender->amount -= $amount;
        $sender->save();
        // update receiver balance
        $receiver->amount += $amount;
        $receiver->save();

        $balancetransfer = [

            'user_id' => $subscriberid,
            'amount' => $amount,
            'receivenumber' => $subscribermobilebankingno,
        ];

        $insert = Addbalancetransection::create($balancetransfer);

        $status = 1;

        $updatestatus = BalanceRequest::where('id', $id)->first();
        $updatestatus->status = $status;
        $updatestatus->save();

        return redirect()->back()->with('success', 'Balance Transfer successfully');
        
    }
}
