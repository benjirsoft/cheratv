<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Balance;
use App\Models\Package;
use App\Models\Refarrel;
use App\Models\Subscriber;
use App\Models\Bonus;
use App\Models\Bgt;
use App\Models\UserBio;
use App\Models\Profile;
use App\Models\Boostersharereferminute;
use App\Models\Watch_minute;
use App\Models\Powerbalance;
use App\Models\Subscriptionearning;
use App\Mail\Sendsubscriberinformation;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Validator;
use App\Models\FlyingSubscriber;
use Illuminate\Support\Facades\DB;

class subscriberregistrationController extends Controller
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


  public function subscriberregistraetion(Request $request)
  {
        $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required|email',
            'mobileno' => 'required',
            'packages_id' => 'required',
            'referid' => 'required',
            

        ]);
        
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobileno');
        $package = $request->input('packages_id');
        $sponsor_id = $request->input('referid');
        $user_id = $this->generateId();
        

       if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if($package == 2)
        {
          $password = $mobile;

          $setbcreate = bcrypt($password);

         $role = 'subscriber';

         $sponsorid = User::where('id', $sponsor_id)->get()->first();

         if (!$sponsorid)
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
        
            
            //add subscriptionearning list

            $subscriber = new Subscriber;
            $subscriber->user_id = $user_id;
            $subscriber->name = $name;
            $subscriber->sponsor_id = $sponsor_id;
            $subscriber->packages_id = $package;
            $subscriber->mobileNo = $mobile;
            $subscriber->label = $lavel;
            $subscriber->save();

            
            
            $balance = 0.00;
            $powertable =new Powerbalance;
            $powertable->user_id = $user_id;
            $powertable->balance = $balance;
            $powertable->save();
            
            

        //referral table data insert

            $referral = new Refarrel;
            $referral->child_id = $user_id;
            $referral->childname = $name;
            $referral->parrent_id = $sponsor_id;
            $referral->save();
            //balance table data insert 
            $amount = 0;
            $balance = new Balance;
            $balance->user_id = $user_id;
            $balance->name = $name;
            $balance->amount = $amount;
            $balance->save();
            
            
            
            $user = new User;
            $user->id = $user_id;
            $user->name = $name;
            $user->email = $email;
            $user->password = $setbcreate;
            $user->role = $role;
            $user->save();
            $bcamount = 0;
            $bonusaccount = new Bonus;
            $bonusaccount->user_id = $user_id;
            $bonusaccount->name = $name;
            $bonusaccount->bonus = $bcamount;
            $bonusaccount->save();

            //add user_id to Profile model
            $Profiles = new Profile;
            $Profiles->user_id = $user_id;
            $Profiles->mobilebankingno = $mobile;
            $Profiles->save();

            //add user_id to UserBio Model 

            $userbio = new UserBio;
            $userbio->user_id = $user_id;
            $userbio->save();
            
            $minute = 0;

            $minuteadd = new Watch_minute;

            $minuteadd->user_id = $user_id;
            $minuteadd->minute = $minute;
            $minuteadd->save();
            
            $findnewid = Watch_minute::where('user_id', $user_id)->first();
            if($findnewid)
            {
                $tenminute = 10;   
                $findnewid->minute += $tenminute;
                $findnewid->save();
                
                $addirecttk = [
                        'user_id' => $user_id,
                        'minute' => $tenminute,
                        'section' => 'Welcome Bonus',
                        'sourceid' => 'NewID Purpose',
                    ];
                    
                $addtk = Boostersharereferminute::create($addirecttk);
                
            }


            //Send Mail User gmail account
            $data = [
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'mobileNo' => $mobile,
            ];

            

            Mail::to($email)->send(new Sendsubscriberinformation($data));
            return redirect()->back()->with('success', 'Subscriber added successfully');  
            
        }
        else
        {
            
        $status = 0;
        $flyingsubscriberdata = new FlyingSubscriber;

        $flyingsubscriberdata->name = $request->name;
        $flyingsubscriberdata->referid = $request->referid;
        $flyingsubscriberdata->email = $request->email;
        $flyingsubscriberdata->mobileno = $request->mobileno;
        $flyingsubscriberdata->packages_id = $request->packages_id;
        $flyingsubscriberdata->sendernumber = $request->sendernumber;
        $flyingsubscriberdata->status = $status;
        $flyingsubscriberdata->save();
        return redirect('https://shop.bkash.com/jol-bihongo-international01932/pay/bdt365/6CUZws?fbclid=IwAR27o5xGq0VE9LrGrqPOusasmmTOGjQ5NfILLDSHLA4X71H2UHQ8c9g-e6c'); 
            
        }

        

  }


  public function requestviewsubscriber()
  {

      $subscriber = FlyingSubscriber::orderBy('created_at', 'desc')->latest()->get();
      return view('Superadmin.Subscriber.requestnewsubscriber', compact('subscriber'));

  }



}
