<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Balance;
use App\Models\Refarrel;
use App\Models\Subscriber;
use App\Models\Bonus;
use App\Models\Bgt;
use App\Models\UserBio;
use App\Models\Profile;
use App\Models\Watch_minute;
use App\Models\GiftAccount;
use App\Models\Powerbalance;
use App\Mail\Sendsubscriberinformation;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GiftAccountController extends Controller
{
    
    public  function generateId() {

    $latestId = DB::table('users')->latest('id')->first();
    if ($latestId) {
        $latestId = explode('S', $latestId->id)[1];
    } else {
        $latestId = 0;
    }
    return 'S' . str_pad($latestId + 1, 7, '0', STR_PAD_LEFT);
   }
    
    public function giftaccountform()
    {
        $latestId = $this->generateId();
        return view('Superadmin.gift.index', compact('latestId'));
    }

    public function creategiftaccount(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'user_id' => 'required|string|max:255',
            'name' => 'required|string',
            'sponsor_id' => 'required',
            'packages_id' => 'required',
            'mobileNo' => 'required',
            'email' => 'required|string',
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Session::put([
          'user_id' => $request->user_id, 
          'name' => $request->name,
          'sponsor_id' => $request->sponsor_id,
          'packages_id' => $request->packages_id,
          'mobileNo' => $request->mobileNo,
          'email' => $request->email,
        ]);

       $user_id = Session()->get('user_id');
       $name = Session()->get('name');
       $sponsor_id = Session()->get('sponsor_id');
       $packages_id = Session()->get('packages_id');
       $mobileNo = Session()->get('mobileNo');
       $email = Session()->get('email');

       $password = $mobileNo;

       $setbcreate = bcrypt($password);

       $checkuserid = Subscriber::where('user_id', $user_id)->get()->first();

       if($checkuserid)
       {
         return redirect()->back()->withErrors(['error' => 'Invalid User Id']);
       }
      
       $role = 'subscriber';

        $sponsor_id = User::where('id',$sponsor_id)->get()->first();

        if (!$sponsor_id)
        {
            return redirect()->back()->withErrors(['error' => 'Invalid sponsor_id']);

        }

        $emails = User::where('email', $email)->get()->first();

        if($emails)
        {
          return redirect()->back()->withErrors(['error' => 'Email Already Esixt Please provide alternatiev Mail']);
        }
        $lavel = 'General Subscriber';
        $amount = 0;
        
            $subscriber = new Subscriber;
            $subscriber->user_id = $request->user_id;
            $subscriber->name = $request->name;
            $subscriber->sponsor_id = $request->sponsor_id;
            $subscriber->packages_id = $request->packages_id;
            $subscriber->mobileNo = $request->mobileNo;
            $subscriber->label = $lavel;
            $subscriber->save();
        
        //referral table data insert

            $referral = new Refarrel;
            $referral->child_id = $request->user_id;
            $referral->childname = $request->name;
            $referral->parrent_id = $request->sponsor_id;
            $referral->save();
            //balance table data insert 
            $amount = 0;
            $balance = new Balance;
            $balance->user_id = $request->user_id;
            $balance->name = $request->name;
            $balance->amount = $amount;
            $balance->save();
            $user = new User;
            $user->id = $request->user_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $setbcreate;
            $user->role = $role;
            $user->save();
            $bcamount = 0;
            $bonusaccount = new Bonus;
            $bonusaccount->user_id = $request->user_id;
            $bonusaccount->name = $request->name;
            $bonusaccount->bonus = $bcamount;
            $bonusaccount->save();

            //add user_id to Profile model
            $Profiles = new Profile;
            $Profiles->user_id = $user_id; 
            $Profiles->mobilebankingno = $mobileNo;
            $Profiles->save();

            //add user_id to UserBio Model 

            $userbio = new UserBio;
            $userbio->user_id = $user_id;
            $userbio->save();
            
            $balance = 0.00;
            $powertable =new Powerbalance;
            $powertable->user_id = $request->user_id;
            $powertable->balance = $balance;
            $powertable->save();
            
            $minute = 0;

            $minuteadd = new Watch_minute;

            $minuteadd->user_id = $user_id;
            $minuteadd->minute = $minute;
            $minuteadd->save();

            $giftaccount = new GiftAccount;
            $giftaccount->user_id = $user_id;
            $giftaccount->save();


            //Send Mail User gmail account
            $data = [
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'mobileNo' => $mobileNo,
            ];

            

            Mail::to($email)->send(new Sendsubscriberinformation($data));


            //dd($user_id, $name, $sponsor_id);

            Session::forget(['user_id', 'name', 'sponsor_id', 'packages_id', 'mobileNo', 'email']);
            
            return redirect()->back()->with('success', 'Gift Subscriber added successfully');    

    }
    
}
