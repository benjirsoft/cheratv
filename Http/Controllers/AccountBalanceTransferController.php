<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Transection;
use App\Models\Accbalance;
use App\Models\Powerbalance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AccountBalanceTransferController extends Controller
{
    public function accountbalancetransferform(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiverid' => 'required',
            'amount' => 'required|numeric',
        ]);

           $sender_id = Auth::id();

          Session::put(['receiverid' => $request->receiverid, 'sender_id' => $sender_id, 'amount' => $request->amount]);

          return redirect('accountbtransferconfirm');
    }

    public function accounttransferbalancegetdatafromui(Request $request)
    {

        $receiver_id = Session()->get('receiverid');
        $sender_id = Session()->get('sender_id');
        $amount = Session()->get('amount');

       
        // check sender_id and receiver_id
        $sender = Accbalance::where('user_id', $sender_id)->get()->first();
        $receiver = Powerbalance::where('user_id', $receiver_id)->get()->first();



        if (!$sender || !$receiver) {
            // if sender or receiver not found
            return redirect()->back()->withErrors(['error' => 'Invalid sender or receiver']);
        }

        if ($receiver == $sender ){

            return redirect()->back()->withErrors(['error' => 'you can not send on your own id']);
        }        

            DB::beginTransaction();
            try {



                if ($sender->balance < $amount){

                    return redirect()->back()->withErrors(['error' => 'your do not have sufficient balance']);
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => 'Transfer failed']);
            }

        if ($amount < 100) {
            
            return redirect()->back()->withErrors(['error' => 'Amount must be greater than or equal to 100']);
        }

        // Perform the transfer
        // update sender balance
        $sender->balance -= $amount;
        $sender->save();
        // update receiver balance
        $receiver->balance += $amount;
        $receiver->save();


        $transaction = new Transection();
        $transaction->sender_id = session('sender_id');
        $transaction->receiver_id = session('receiverid');
        $transaction->amount = session('amount');
        $transaction->save();

        

        // clear session data
        Session::forget(['receiverid', 'sender_id', 'amount']);

        return redirect()->back()->with('success', 'Transfer successfully completed');
    }

}
