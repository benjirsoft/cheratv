<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Bonus;
use DB;
use Carbon\Carbon;

class AccountreportController extends Controller
{
    public function reportaccount()
    {
        $today = Carbon::today();
        
        $totalpurchasebalance = DB::table('balances')->sum('amount');
        $totalearningbalance = DB::table('bonuses')->sum('bonus');
        
        $earningbalances = DB::table('earningbalance_update_history')->whereDate('update_time', $today)->selectRaw('SUM(old_earningbalance) AS old_total, SUM(new_erningbalance) AS new_total')
            ->get();
        
        foreach ($earningbalances as $balance) {
            $todayearn = $balance->old_total - $balance->new_total;
  
        }
        
        $balances = DB::table('balance_update_history')->whereDate('update_time', $today)->selectRaw('SUM(old_balance) AS old_total, SUM(new_balance) AS new_total')
            ->get();
        
        foreach ($balances as $balancestock) {
            $todayconvert =  $balancestock->new_total - $balancestock->old_total;
  
        }
        
       return view('Accountadmin.report.index', compact('todayconvert', 'todayearn', 'totalpurchasebalance', 'totalearningbalance'));
        
    }
}
