<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rankearn;

class RankController extends Controller
{
    
    public function getUserRank()
   {

     $userId = Auth::id(); 
    // Get the direct and indirect referrals
    $directReferrals = Rankearn::where('referid', $userId)->get();
    $indirectReferrals = Rankearn::whereIn('referid', $directReferrals->pluck('user_id'))->get();

    $directTotal = $directReferrals->sum('earnamount');
    $indirectTotal = $indirectReferrals->sum('earnamount');

    $firstRankCondition = $directTotal >= 11500 && $indirectTotal >= 16500;
    $secondRankCondition = $directReferrals->count() >= 5 && $indirectReferrals->count() >= 5;
    $thirdRankCondition = $directReferrals->count() >= 3 && $indirectReferrals->count() >= 2;
    $fourthRankCondition = $directReferrals->count() >= 2 && $indirectReferrals->count() >= 1;

    // Determine the user's rank
    if ($firstRankCondition) {
        return 'Power Subscriber';
    } elseif ($secondRankCondition) {
        return 'Super Subscriber';
    } elseif ($thirdRankCondition) {
        return 'Moon Subscriber';
    } elseif ($fourthRankCondition) {
        return 'Sky Subscriber';
    } else {
        return 'No Rank';
    }
}



}
