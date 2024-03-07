<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WidthrawAccount;
use App\Models\SubscriberRequestwidthrawal;
use App\Models\Transectionpin;
use App\Models\Bonus;
use App\Models\Balanctransection;
use App\Models\AccountPaidbalance;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
use App\Models\User;
use Auth;

class SubscriberwidthrawalController extends Controller
{

    public function eaningbalance()
    {
        $userid = Auth::id();

        $paymentconfirm = AccountPaidbalance::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();

        return view('Subscriber.EarningBalance.receiveearningbalance', compact('paymentconfirm'));


    }



    public function generateTransactionId()
    {
        do {
            $numberPart = mt_rand(100000, 999999); // Generate a 6-digit random number
            $textPart = strtoupper(substr(uniqid(), -4)); // Generate a 4-character unique string

            $transactionId = $numberPart . $textPart; // Combine the two parts to create the potential transaction ID

            // Check if the transaction ID already exists in the database
            $existingTransaction = SubscriberRequestwidthrawal::where('transectionid', $transactionId)->first();
        } while ($existingTransaction); // Repeat the loop if the transaction ID already exists

        return $transactionId;
    }

    public function WidthrawaltoAccount(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'mobilebankingno' => 'required',
            'pin' => 'required|numeric',
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $amount = $request->input('amount');
        $mobilebankingno = $request->input('mobilebankingno');
        $pin = $request->input('pin');

        $userid = Auth::id();

        $checkpin = Transectionpin::where('user_id', $userid)->first();

        if($checkpin)
        {

            $pins = $checkpin->pin;
        }
        else
        {
            $pins = null;
        }

        

        if($pin != $pins)
        {

            return redirect()->back()->withErrors('Your Pin Incorrrect');
        }


        $transactionId = $this->generateTransactionId();

        $userid = Auth::id();
        $balance = Bonus::where('user_id', $userid)->first();

        $balancecheck = $balance->bonus;

        if($balancecheck < $amount)
        {
            return redirect()->back()->withErrors('Insufficient Balance');
        }

        if($amount < 300)
        {
            return redirect()->back()->withErrors('Minimum 300 BDT Amount Send Widthrawal Request Send');
        }

        $balancecute = Bonus::where('user_id', $userid)->get()->first();

        $balancecute->bonus -= $amount;
        $balancecute->save();

        $widthrawalamount = new SubscriberRequestwidthrawal;

        $widthrawalamount->user_id = $userid;
        $widthrawalamount->amount = $amount;
        $widthrawalamount->mobilebankingno = $mobilebankingno;
        $widthrawalamount->pin = $pin;
        $widthrawalamount->transectionid = $transactionId;
        $widthrawalamount->save();

        $status = 0;
        $widthrawaltransection = new Balanctransection;
        $widthrawaltransection->user_id = $userid;
        $widthrawaltransection->transectionid = $transactionId;
        $widthrawaltransection->amount = $amount;
        $widthrawaltransection->status = $status;
        $widthrawaltransection->save();
        
        $username = User::where('id', $userid)->first()->name ?? null;

        $notification = [
                'user_id' => $username,
                'message' => $username. 'send a request for payout' .$amount.  'tk',
                'status' => '0',
            ];
            $store = Notification::create($notification);

        return redirect()->back()->with('success', 'Your Withdrawal Request Successfully Submitted, Please Track Your Transaction ID-' . $transactionId);

    }

    public function viewtransection()
    {
          $userid = Auth::id();
          $widthrawalrequest = Balanctransection::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
          return view('Subscriber.balance.viewtransection', compact('widthrawalrequest'));


    }
    
    
    public function requesthistory()
    {
      $userid = Auth::id();
      $widthrawalrequest = SubscriberRequestwidthrawal::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
      //dd($widthrawalrequest);
      return view('Subscriber.balance.requesthistory', compact('widthrawalrequest'));
    }





}
