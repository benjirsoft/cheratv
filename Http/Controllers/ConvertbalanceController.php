<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Balance;
use App\Models\Bonus;
use App\Models\BonusConvert;
use App\Models\Powerbalance;
use App\Models\Transectionpin;
use App\Models\Powerconvertlist;
use Illuminate\Support\Facades\Validator;




class ConvertbalanceController extends Controller
{

    public function convertview()
    {

        $userid = Auth::id();
        $transactions = BonusConvert::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();

        return view('Subscriber.EarningBalance.index', compact('transactions'));
    }    
    public function convert(Request $request)
    {

       $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'pin' => 'required|numeric',
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $useramount = $request->input('amount');
        $pin = $request->input('pin');



        if ($useramount < 100)
        {
            return redirect()->back()->withErrors('Please Transfer Minimum 100 BDT Amount');
        }

        $userid = Auth::id();

        $convert = Bonus::where('user_id', $userid)->get()->first();

        $amount = $convert->bonus;

        if( $amount < $useramount)
        {
            return redirect()->back()->withErrors('Insufficient Balance');
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

        $bonus = Bonus::where('user_id', $userid)->get()->first();

        $bonus->bonus -= $useramount;

        $bonus->save();

        $blance = Balance::where('user_id', $userid)->get()->first();

        $blance->amount += $useramount;

        $blance->save();

        $converttransection = new BonusConvert;

        $converttransection->user_id = $userid;
        $converttransection->bcamount = $useramount;
        $converttransection->save(); 

        return redirect()->back()->with('success', 'Earning Balance Convert Successfully');

    }
    public function convertpower(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'pin' => 'required|numeric',
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $useramount = $request->input('amount');
        $pin = $request->input('pin');



        if ($useramount < 365)
        {
            return redirect()->back()->withErrors('Please Transfer Minimum 365 BDT Amount');
        }

        $userid = Auth::id();

        $convert = Balance::where('user_id', $userid)->get()->first();

        $amount = $convert->amount;

        if( $amount < $useramount)
        {
            return redirect()->back()->withErrors('Insufficient Balance');
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

        $bonus = Balance::where('user_id', $userid)->get()->first();

        $bonus->amount -= $useramount;

        $bonus->save();

        $blance = Powerbalance::where('user_id', $userid)->get()->first();

        $blance->balance += $useramount;

        $blance->save();

        $converttransection = new Powerconvertlist;

        $converttransection->user_id = $userid;
        $converttransection->amount = $useramount;
        $converttransection->save(); 

        return redirect()->back()->with('success', 'Power Balance Convert Successfully');
    }
}
