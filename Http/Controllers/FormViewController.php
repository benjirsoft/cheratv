<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Accbalance;
use App\Models\Subscriber;
use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Transection;
use App\Models\Aaccountbalance;
use App\Models\Userprofile;
use App\Models\FlyingSubscriber;
use App\Models\WidthrawAccount;
use App\Models\Balanctransection;
use App\Models\UserBio;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Video;
use App\Models\BoosterSubscriber;
use App\Models\Tag;
use App\Models\Rank;
use App\Models\Rankearn;
use App\Models\RankSuper;
use App\Models\Rankmoon;
use App\Models\Notification;
use App\Models\Watch_minute;
use App\Models\Powerbalance;
use App\Models\Subscriptionearning;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FormViewController extends Controller
{
    
    
    
    
    public function convertminute()
    {
        $userid = Auth::id();
        
        $balance = Watch_minute::where('user_id', $userid)->first()->minute;
        return view('Subscriber.minute.convertminute', compact('balance'));
    }
    
    
    public function Subscriptionearninglist()
    {
        
            $userid = Auth::id();
            
            $subscriberearning = Subscriptionearning::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
            
            return view('Subscriber.powerbalance.earninghistory',compact('subscriberearning'));
    }
    
    
    
    public function convertshowpage()
    {
        
        $userid = Auth::id();
        
        $power = Balance::where('user_id', $userid)->first();
        
        $powerbalance = $power->amount;   
        
        
        return view('Subscriber.powerbalance.convertbalance', compact('powerbalance'));
    }
    
    public function showpower()
    {
        
        $userid = Auth::id();
        
        $power = Powerbalance::where('user_id', $userid)->first();
        
        $powerbalance = $power->balance;
        
        return view('Subscriber.powerbalance.balanceshow', compact('powerbalance'));
        
        
    }
    public function rankpage()
    {
        
        $userId = Auth::id();
        
        $directReferrals = Rankearn::where('referid', $userId)->get();
        $indirectReferrals = Rankearn::whereIn('referid', $directReferrals->pluck('user_id'))->get();

        // Calculate the total amounts for direct and indirect referrals
        $directTotal = $directReferrals->sum('earnamount');
        $indirectTotal = $indirectReferrals->sum('earnamount');
        
        // Define rank conditions
        $firstRankCondition = $directTotal >= 11500 && $indirectTotal >= 16500;
        $secondRankCondition = $directReferrals->count() >= 5 && $indirectReferrals->count() >= 5;
        $thirdRankCondition = $directReferrals->count() >= 3 && $indirectReferrals->count() >= 2;
        $fourthRankCondition = $directReferrals->count() >= 2 && $indirectReferrals->count() >= 1;
        
        // Determine the user's rank
        if ($firstRankCondition) {
            $rank = 'Power Subscriber';
            $next = 'Super Subscriber';
            $personal = 5;
            $team = 5;
            return view('Subscriber.rank.rankstatus', compact('rank', 'next', 'personal', 'team'));
        } elseif ($secondRankCondition) {
            $rank =  'Super Subscriber';
            $next = 'Moon Subscriber';
            $personal = 3;
            $team = 2;
            return view('Subscriber.rank.rankstatus', compact('rank',  'next', 'personal', 'team'));
        } elseif ($thirdRankCondition) {
            $rank =  'Moon Subscriber';
            $next = 'Sky Subscriber';
            $personal = 2;
            $team = 1;
            return view('Subscriber.rank.rankstatus', compact('rank',  'next', 'personal', 'team'));
        } elseif ($fourthRankCondition) {
            $rank =  'Sky Subscriber';
            $next = 'Gold';
            return view('Subscriber.rank.rankstatus', compact('rank',  'next'));
        } else {
            $rank =  'General Subscriber';
            $next = 'Power Subscriber';
            $personal = $directTotal;
            $team = $indirectTotal;
            return view('Subscriber.rank.rankstatus', compact('rank',  'next',  'personal', 'team'));
        } 
    }
    
    public function deleteunpaidsubscriber($id)
    {
        
        $flying = FlyingSubscriber::where('id', $id)->first();
        
        if($flying)
        {
            
            $flying->delete();
            
            return redirect()->back();
        }
        
        
    }

    public function convertform()
    {
        $userid = Auth::id();
        $balances = Bonus::where('user_id', $userid)->get()->first();
        $balance = $balances->bonus; 

        return view('Subscriber.EarningBalance.convertearningbalance', compact('balance'));
    }


    public function superadminbalancetransection()
    {

        $userid = Auth::id();
        $transactions = Transection::where('sender_id', $userid)->orWhere('receiver_id', $userid)->orderBy('created_at', 'desc')->latest()->get();

        return view('Superadmin.Balance.balancetransection', compact('transactions'));


    }


    public function createsubscriber($id)
    {
        
        $latestId = $this->generateId();

        $pendingsubscriber = FlyingSubscriber::where('id', $id)->take(5)->get()->first();


        return view('Superadmin.Subscriber.createsubscriber', compact('latestId', 'pendingsubscriber'));

    }

    public function profileimagechange()
    {

        $userid = Auth::id();

        $profileimage = UserBio::where('user_id', $userid)->get()->first();


        return view('Subscriber.profile.editprofile', compact('profileimage'));

    }

    public function profile()
    {

        $userid = Auth::id();

        $profile = UserBio::where('user_id', $userid)->get()->first();

        $personalinfo = Profile::where('user_id', $userid)->get()->first();




        return view('Subscriber.profile.index', compact('profile', 'personalinfo'));


    }


    public function passwordform()
    {


        return view('Subscriber.profile.changepassword');


    }


    public function customer()
    {

        return view('website.aboutas');

    }


    public  function generateId() {

    $latestId = DB::table('users')->latest('id')->first();
    if ($latestId) {
        $latestId = explode('S', $latestId->id)[1];
    } else {
        $latestId = 0;
    }
    return 'S' . str_pad($latestId + 1, 7, '0', STR_PAD_LEFT);
   }
    public function createsubscribertemplate()
    {
        $userid = Auth::id();
        
        $power = Balance::where('user_id', $userid)->first();
        
        $balance = $power->amount;
        
    $latestId = $this->generateId();
        return view('Subscriber.subscribar.createnewsubscribe', compact('latestId', 'balance'));
    }
    public function createbalanceform()
    {
        return view('Accountadmin.BalanceCreate.createbalance');
    }
    //accountdashboard templat
    public function accountdashboard()
    {
        

        $totalsubscribe = $this->totalsubscriber();
        $userid = Auth::id();
        $availablebalance = Accbalance::where('user_id', $userid)->get()->first();
        $total = $availablebalance->balance;

        $paymentconfirm = WidthrawAccount::where('accountid', $userid)->first();

        $amounts = optional($paymentconfirm)->amount;

        $pendingbalance = Balanctransection::where('status', 0)->sum('amount');

        return view('Accountadmin.dashboard.index', compact('total', 'totalsubscribe', 'amounts', 'pendingbalance'));
    }
    public function subscriberdashboard()
    {
        $userid = Auth::id();
        $balances = Balance::where('user_id', $userid)->get()->first();
        $balance = $balances->amount; 
        
        $power = Powerbalance::where('user_id', $userid)->first();
        
        $poweramount = $power->balance;
        
        $bonus = Bonus::where('user_id', $userid)->get()->first();
        $Bonuses = $bonus->bonus;
        
        
        $userid = Auth::id();

        $minute = Watch_minute::where('user_id', $userid)->first();

        $minutebalance = $minute->minute;
        
        
        $userid = Auth::id();
        
        $owner = Subscriber::where('user_id', $userid)->first();
        
        $father = $owner->sponsor_id;
        
        $firstgeneation = Subscriber::where('sponsor_id', $userid)->get();
        $all = $firstgeneation->count();

        $userid = Auth::id();
        $firstgeneation = Subscriber::where('sponsor_id', $userid)->get();

        $firstgeneationIds = $firstgeneation->pluck('user_id')->toArray();

        $secondGenerationUsers = Subscriber::whereIn('sponsor_id', $firstgeneationIds)->get();

        $secondtotal = $secondGenerationUsers->count();
        
        $alltotal = $all + $secondtotal;
        
        //rank check code 
        $userId = Auth::id();
        $directReferrals = Rankearn::where('referid', $userId)->get();
        $indirectReferrals = Rankearn::whereIn('referid', $directReferrals->pluck('user_id'))->get();

        // Calculate the total amounts for direct and indirect referrals
        $directTotal = $directReferrals->sum('earnamount');
        $indirectTotal = $indirectReferrals->sum('earnamount');

        // Define rank conditions
        $firstRankCondition = $directTotal >= 11500 && $indirectTotal >= 16500;
        $secondRankCondition = $directReferrals->count() >= 5 && $indirectReferrals->count() >= 5;
        $thirdRankCondition = $directReferrals->count() >= 3 && $indirectReferrals->count() >= 2;
        $fourthRankCondition = $directReferrals->count() >= 2 && $indirectReferrals->count() >= 1;

        // Determine the user's rank
        if ($firstRankCondition) {

            $rank = 'Power Subscriber';
            
        } elseif ($secondRankCondition) {
            $rank =  'Super Subscriber';
            
        } elseif ($thirdRankCondition) {
            $rank =  'Moon Subscriber';
            
        } elseif ($fourthRankCondition) {
            $rank =  'Sky Subscriber';
            
        } else {
            $rank =  'General Subscriber';
            
        }
        
        
        $labeupdate = Subscriber::where('user_id', $userid)->first();
        
        
        
        //packagevalidity count 
        
        $userId = Auth::id();
        $registrationDate = Subscriber::where('user_id', $userId)->value('created_at');
        // Use Carbon's parse method to convert the timestamp to a Carbon instance
        $userDate = Carbon::parse($registrationDate);
        
        // Add one year to the userDate
        $nextYearDate = $userDate->copy()->addYear();
    
        // Calculate the difference in days between the current date and the next year date
        $remainingDays = Carbon::now()->diffInDays($nextYearDate, false);
     
         $boostsubscriber = BoosterSubscriber::where('user_id', $userid)->first();
         
          
        return view('Subscriber.Dashboard.index', compact('balance', 'alltotal', 'remainingDays', 'Bonuses', 'minutebalance', 'rank', 'poweramount', 'boostsubscriber'));
    }
    
    
        

    public function firsttotal($user_id)
    {

        $firstgeneation = Subscriber::where('sponsor_id', $user_id)->get();
        $all = $firstgeneation->count();

        return view('Subscriber.subscribar.totalsubscriber', compact('all'));
    }

    public function firstgeneation()
    {
        $userid = Auth::id();
        $firstgeneation = Subscriber::where('sponsor_id', $userid)->get();

        $firstgeneationIds = $firstgeneation->pluck('user_id')->toArray();

        $secondGenerationUsers = Subscriber::whereIn('sponsor_id', $firstgeneationIds)->get();

        $secondtotal = $secondGenerationUsers->count();

        return view('Subscriber.subscribar.viewmysubscribar', compact('firstgeneation', 'secondtotal', 'secondGenerationUsers'));
    }

    public function getSecondGenerationUsers()
    {

        $userid = Auth::id();
        $firstgeneation = Subscriber::where('sponsor_id', $userid)->get()->pluck('user_id');

        $secondGenerationUsers = Subscriber::whereIn('sponsor_id', $firstgeneation)->get();

        return view('Subscriber.subscribar.secondgenaration', compact('secondGenerationUsers'));
    }

    public function subscriberlist()
    {

        $subscriberlist = Subscriber::all();

        return view('Accountadmin.Subscriber.index', compact('subscriberlist'));

    }


    public function transectionvview()
    {
        $userid = Auth::id();
        $transactions = Transection::where('sender_id', $userid)->orWhere('receiver_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
        return view('Subscriber.balance.viewtransection', compact('transactions'));
    }
    public function subscriberbalancetransformform()
    {

        $userid = Auth::id();

        $userProfiles = Profile::where('user_id', $userid)->get();

        $balances = Bonus::where('user_id', $userid)->get()->first();
        $balance = $balances->bonus; 
       
        return view('Subscriber.balance.index', compact('userProfiles', 'balance'));
                 
    }
     public function superadmindashboard()
     {

        $userid = Auth::id();

        $balances = Balance::where('user_id', $userid)->first();

        if($balances)
        {
            $balance = $balances->amount; 
        }
        else 
        {
            $balance = null;
        }
        

        $subscriber = Subscriber::all();

        $allsubscriber = $subscriber->count();
        
        $Totalboosterlist = BoosterSubscriber::count();
        
        return view('Superadmin.dashboard.index', compact('balance', 'allsubscriber', 'Totalboosterlist'));

     }
     //maintain section all form template 
     public function maintainadmin()
     {
         $videos = Video::all()->count();

        $category = Category::all()->count();

        $tag = Tag::all()->count();

        $user = User::all()->count();
        return view('Maintainadmin.dashboard.index', compact('videos', 'category', 'tag', 'user'));
     }
    public function categoryinsertform()
    {
        return view('Maintainadmin.category.insert');
    }
    public function messagevview()
    {
        return view('Maintainadmin.message.indexmessage');
    }
    public function addvideoform()
    {
        return view('Maintainadmin.video.advideo');
    } 
    public function addtagform()
    {
        return view('Maintainadmin.tag.inserttag');
    }
    public function addwebsitecontenttemplate()
    {
        return view('Maintainadmin.website.insert');
    }
    public function categorytemplate()
    {
        return view('Maintainadmin.category.index');
    }
    public function taglisttemplate()
    {
        return view('Maintainadmin.tag.viewtag');
    }
    public function websitecontentlist()
    {
        return view('Maintainadmin.website.index');
    }
    public function websitevideolist()
    {
        return view('Maintainadmin.video.index');
    }

    public function viewvitualbalance()
    {
        $viewvitualbalance = Aaccountbalance::all();
        
        return view('Accountadmin.BalanceCreate.viewcreateitualbalance', compact('viewvitualbalance'));

    }

    public function totalsubscriber()
    {
        $totalsubscriber = Subscriber::all();
        $totalsubs = $totalsubscriber->count();
        return $totalsubs;
    }

    public function accountbalancetransferform()
    {
        return view('Accountadmin.balanceTransfer.index');
    }

    public function transectionviewaccountdashboard()
    {

        $userid = Auth::id();
        $transactions = Transection::where('sender_id', $userid)->orWhere('receiver_id', $userid)->orderBy('created_at', 'desc')->latest()->get();

        return view('Accountadmin.balanceTransfer.viewtransection', compact('transactions'));


    }

    public function transectionpinsetform()
    {

        return view('Subscriber.transection.settransectionkey');

    }

    public function updatepinform()
    {

        return view('Subscriber.transection.updatetransectionkey');
    }  

}
