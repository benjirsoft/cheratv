<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balanctransection; 
use App\Models\SubscriberRequestwidthrawal; 
use App\Models\AccountPaidbalance; 
use App\Models\WidthrawAccount; 
use App\Models\Transectionpin;
use Illuminate\Support\Facades\Validator;
use Auth;

class AccountController extends Controller
{

    public function storepinform()
    {

        return view('Accountadmin.Transaectionkey.settransectionkey');

    }

    public function updatepinform()
    {

        return view('Accountadmin.Transaectionkey.updatetransectionkey');

    }

    public function storepin(Request $request)
    {


        $validator = Validator::make($request->all(),[

            'newpin' => 'required|size:5',
            

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userid = Auth::id();

        $user = Transectionpin::where('user_id', $userid)->first();

        if ($user)
        {
            return back()->withErrors('Sorry Your Transection Pin Already Exist Please Update Your Pin');
        }
        else
        {

            $pin = new Transectionpin;
            $pin->user_id = $userid;
            $pin->pin = $request->newpin;
            $pin->save();

            return redirect()->back()->with('success', 'Your Pin Is Successfully Submit');
        }

    }

    public function updateconfirm(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'oldpin' => 'required|size:5',
            'newpin' => 'required|size:5',
            'confirmpin' => 'required|size:5',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $oldpin = $request->input('oldpin');
        $newpin = $request->input('newpin');
        $confirmpin = $request->input('confirmpin');


        if ($newpin != $confirmpin) {
          return back()->withErrors('Your new pin and confirm pin do not match');
        }

         $userid = Auth::id();

        $checkpin = Transectionpin::where('user_id', $userid)->first();

        if(!$checkpin){
            return back()->withErrors('No old pin exists');
        }

        $pin = $checkpin->pin;

        if($pin != $oldpin) {
            return back()->withErrors('Your Old Pin Does NOT Match');
        }

        
            $updatepin = Transectionpin::where('user_id', $userid)->first();
            $updatepin->pin = $newpin;
            $updatepin->save();            
            return redirect()->back()->with('success', 'Your Pin Successfully Update');
        
    }


    public function paidlistiew()
    {

        $accountpaidlist = AccountPaidbalance::orderBy('created_at', 'desc')->latest()->get();
        
        //dd($accountpaidlist);

        return view('Accountadmin.widthrawalpayment.paymenthistory', compact('accountpaidlist'));

    }
    public function WidthrawaltoAccountrequest()
    {

    
        $widthrawalrequest = Balanctransection::orderBy('created_at', 'desc')->latest()->get();

        return view('Accountadmin.widthrawalpayment.index', compact('widthrawalrequest'));

    }

    public function makepayment($transectionid)
    {

        $subscriber = SubscriberRequestwidthrawal::where('transectionid', $transectionid)->get()->first();


        return view('Accountadmin.widthrawalpayment.makepayment', compact('subscriber'));

    }

    public function confirmpaymentnow(Request $request)
    {
        

        $validator = Validator::make($request->all(),[

            'user_id' => 'required|string|max:255',
            'mobilebankingno' => 'required',
            'sendermobileno' => 'required',
            'amount' => 'required',
            'mobiletransecctionno' => 'required',
            'pin' => 'required'
            
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = $request->input('user_id');
        $transecctionid = $request->input('transecctionid');
        $mobilebankingno = $request->input('mobilebankingno');
        $sendermobileno = $request->input('sendermobileno');
        $amount = $request->input('amount');
        $mobiletransectionno = $request->input('mobiletransecctionno');
        $transectionid = $request->input('transecctionid');


        $pin = $request->input('pin');


        $userid = Auth::id();

        $check = Transectionpin::where('user_id', $userid)->get()->first();

        if($check)
        {
            $pins = $check->pin;

        }
        else
        {
            $check = null;

            return redirect()->back()->withErrors('We Do Dot Foud Your Pin Please Insert Fast Your Pin');
        }
        


        if ($pins != $pin)
        {

            return redirect()->back()->withErrors('Pin Incorrrect Please Try Again');
        }

        $paid = new AccountPaidbalance;

        $paid->user_id = $user_id;
        $paid->transecctionid = $transecctionid;
        $paid->sendermobileno = $sendermobileno;
        $paid->mobilebankingno = $mobilebankingno;
        $paid->amount = $amount;
        $paid->mobiletransecctionno = $mobiletransectionno;
        $paid->save();


        $status = 1;

        $transectionstatusup = Balanctransection::where('transectionid', $transectionid)->get()->first();

        $transectionstatusup->status = $status;
        $transectionstatusup->save();

        //add account balance 

        $userid = Auth::id();
        $add = WidthrawAccount::where('accountid', $userid)->get()->first();
        $add->amount += $amount;
        $add->save();

        return redirect()->back()->with('success', 'Payment Successfully Send'); 

    }



}
