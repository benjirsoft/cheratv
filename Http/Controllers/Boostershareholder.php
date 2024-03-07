<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoosterSubscriber;
use App\Models\Boostersharereferminute;
use Auth;


class Boostershareholder extends Controller
{
    
    public function boosterlist()
    {

        $boosterlist = BoosterSubscriber::all();

        return view('Superadmin.boostershareholder.index', compact('boosterlist'));

    }
    
    
    public function boosterself()
    {
        
        $userid = Auth::id();
        $boosterlist = BoosterSubscriber::where('user_id', $userid)->get();
        return view('Subscriber.boostershare.boostershareholder.index', compact('boosterlist'));
        
    }
    
    public function listminuteearning()
    {   
        $userid = Auth::id();
        $listearningbooster = Boostersharereferminute::where('user_id', $userid)->orderBy('created_at', 'desc')->latest()->get();
        
        return view('Subscriber.boostershare.minuteearn', compact('listearningbooster'));
    }

}
