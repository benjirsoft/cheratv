<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch_minute;
use Auth;

class MinuteController extends Controller
{
    public function minute()
    {
        $userid = Auth::id();

        $user = Watch_minute::where('user_id', $userid)->first();

        $balanceminute = $user->minute;

        return view('Subscriber.minute.index', compact('balanceminute'));

    }
}
