<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Balance;
use App\Models\Transection;
use App\Models\Subscriber;
use App\Models\Transectionpin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class BalanceTansferController extends Controller
{

    public function getdataformui(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'receiverid' => 'required',
            'amount' => 'required|numeric',
            'pin' => 'required|numeric'
        ]);

           $sender_id = Auth::id();

          Session::put(['receiverid' => $request->receiverid, 'pin' => $request->pin, 'sender_id' => $sender_id, 'amount' => $request->amount]);

          return redirect('subscribertransfer.confirm');


    }

    public function confirmtransfer(Request $request)
    {

        $receiver_id = Session()->get('receiverid');

        $inputpin = Session()->get('pin');

        $sender_id = Session()->get('sender_id');

        $amount = Session()->get('amount');

        
        $pinuserid =Auth::id();

        // check sender_id and receiver_id
        $sender = Balance::where('user_id', $sender_id)->get()->first();
        $receiver = Balance::where('user_id', $receiver_id)->get()->first();
        $transectionpin =Transectionpin::where('user_id',$pinuserid)->get()->first();

         $pin = $transectionpin->pin;


         if($inputpin != $pin)
         {

            return redirect()->back()->withErrors([ 'Error' => 'Your transection Pin Is Not Currect']);

         }

        if (!$sender || !$receiver) {
            // if sender or receiver not found
            return redirect()->back()->withErrors(['error' => 'Invalid sender or receiver']);
        }

        if ($receiver == $sender ){

            return redirect()->back()->withErrors(['error' => 'you can not send on your own id']);
        }        

            DB::beginTransaction();
            try {



                if ($sender->amount < $amount){

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
        $sender->amount -= $amount;
        $sender->save();
        // update receiver balance
        $receiver->amount += $amount;
        $receiver->save();


        $transaction = new Transection();
        $transaction->sender_id = session('sender_id');
        $transaction->receiver_id = session('receiverid');
        $transaction->amount = session('amount');
        $transaction->save();

        

        // clear session data
        Session::forget(['receiverid', 'sender_id', 'amount']);


        

        //return redirect()->back()->with('success', 'Transfer successfully completed');
    }


}
