<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Bonus;
use App\Models\Aaccountbalance;
use App\Models\Accbalance;
use App\Models\Transectionpin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;

class SecurityController extends Controller
{


    public function userpin()
    {
        
        return view('Accountadmin.report.customerpin');
    }
    
    public function createbalance(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'amount' => 'required',

        ]);

       if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userid = Auth::id();


        $createbalance = new Aaccountbalance;

        $createbalance->user_id = $userid;
        $createbalance->balances = $request->amount;
        $createbalance->save();

        $updatebalance = Accbalance::where('user_id', $userid)->get()->first();
        $updatebalance->balance += $request->amount;
        $updatebalance->save();    


        return redirect()->back()->with('success', 'balance update successfully');
    }



    public function settransection(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'newpin' => 'required|size:5',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $pin = $request->input('newpin');

        $userid = Auth::id();

        $user = Transectionpin::where('user_id', $userid)->get()->first();

        if ($user)
        {
            return back()->withErrors('Sorry Your Transection Pin Already Exist Please Update Your Pin');
        }
        else
        {

            $transectionpin = new Transectionpin;
            $transectionpin->user_id = $userid;
            $transectionpin->pin = $pin;
            $transectionpin->save();

            return redirect()->back()->with('success', 'Your Pin Is Successfully Submit');
        }

    }

    public function updatepinconfirm(Request $request)
    {

        dd($request->all());
       $validator = Validator::make($request->all(),[

            'newpin' => 'required|size:5',
            'confirmpin' => 'required|size:5',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        

        $oldpin = $request->input('oldpin');
        $newpin = $request->input('newpin');
        $confirmpin = $request->input('confirmpin');
        
        dd($oldpin, $newpin, $confirmpin);

        if ($newpin != $confirmpin) {
          return back()->withErrors('Your new pin and confirm pin do not match');
        }

         $userid = Auth::id();

        $checkpin = DB::table('pins')->where('user_id', $userid)->first();

        if(!$checkpin){
            return back()->withErrors('No old pin exists');
        }

        $pin = $checkpin->pincode;

        if($pin != $oldpin) {
            return back()->withErrors('Your Old Pin Does NOT Match');
        }

            $updatepin = DB::table('pins')->where('user_id', $userid)->update([

                'pincode' => $confirmpin,
            ]);
            
            return redirect()->back()->with('success', 'Your Pin Successfully Update');

        
    }

   
    

}

