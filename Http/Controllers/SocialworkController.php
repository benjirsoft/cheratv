<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socialwork;
use App\Models\User;
use App\Models\Outsource;
use App\Models\Bonus;
use App\Models\BoosterSubscriber;
use App\Models\Earn;
use App\Models\Socialworkcategory;
use App\Models\Subscriberearn;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SocialworkController extends Controller
{
    
    public function earninglist()
    {
        
        return view('Subscriber.earninghistory.earninglist');
        
    }
    public function outsourceing()
    {
        
        return view('Subscriber.earninghistory.socialworkearnlist');    
        
    }
    
    
    public function socialworkstatus()
    {
        $results = \DB::table('socialworks')
    ->join('outsources', 'socialworks.id', '=', 'outsources.linkid')
    ->where('outsources.status', 1)
    ->select('socialworks.id', 'socialworks.title', 'socialworks.qty', 'socialworks.category', \DB::raw('count(*) as totalcount'))
    ->groupBy('socialworks.id', 'socialworks.title', 'socialworks.qty', 'socialworks.category')
    ->get();
    
      
      return view('Maintainadmin.Socialmedia.linkstatus', compact('results'));
                
    }

    public function submitwork(Request $request)
    {
         
        $userid = Auth::id();
    
        // Define the validation rules
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        // Validate the user input
        $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName(); // Get the original
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move(public_path('uploads'), $imageName);
        
            $userprofile = Outsource::where('user_id', $userid)->where('id', $request->id)->update([
                
                'image' => $imageName,    
            ]);
            
            $linkid = $request->input('linkid');
            $id = $request->input('id');
            
            $amoutoftk = Socialwork::where('id', $linkid)->first()->amount;
            
            $insert = [
                    
                    'user_id' => $userid,
                    'linkid' => $linkid,
                    'amount' => $amoutoftk,
                ];
                
                $inserts = Earn::create($insert);
                
            $oldbalance = Bonus::where('user_id', $userid)->first()->bonus ?? null;
            $netamount = $oldbalance + $amoutoftk;
            
            $updateblance = Bonus::where('user_id', $userid)->update([
                
                    'bonus' => $netamount,
                
                ]);
                
            if($updateblance)
            {
                
                    $updatestatus = Outsource::where('user_id', $userid)->where('id', $id)->where('status', 0)->update([
                        
                        'status' => 1,
                        
                        ]);
            }
            
           return redirect()->back()->with('success', 'Thanks For Complete Work');
        }
    }    
    
    public function categoryaddworkform()
    {
        return view('Maintainadmin.socialwork.addcategory');
    }
    
    public function addcategorywork(Request $request)
    {
        $data = [
                'name' => $request->name,
            ];
            
            $insert = Socialworkcategory::create($data);
            return redirect()->back()->with('success', 'Save Successfully');
    }
    
    public function deletecategorywork($id)
    {
        
        $delete = Socialworkcategory::where('id', $id)->delete();
        
        return redirect()->back();
        
    }
    
    public function socialworklist()
    {
        
        $list = Socialworkcategory::OrderBy('created_at', 'desc')->latest()->get();
        
        return view('Maintainadmin.socialwork.categorylist', compact('list'));
        
    }
    
    public function outsource($id)
    {
        
        $userid = Auth::id();
        
        $checkboosterid = BoosterSubscriber::where('user_id', $userid)->first();
        if($checkboosterid == null)
        {
            return redirect()->back()->with('success', 'Please Purchase First Booster Package');
        }
        
        $search = Outsource::where('linkid', $id)->where('user_id', $userid)->first();
        if($search)
        {
            return redirect()->back();
        }
        
        $categoryid = Socialwork::where('id', $id)->first()->category ?? null;
        
        $amount = Socialwork::where('id', $id)->first()->amount ?? null;
        
        
        
        $link = Socialwork::where('id', $id)->first()->link ?? null;
        
        $data = [
            
            'linkid' => $id,
            'user_id' => $userid,
            'category' => $categoryid,
            'status' => 0,
            ];
            
            $insert = Outsource::create($data);
            
            
                
        return redirect($link);
                
    }
    
    public function removeid($id)
    {
        
       $userid = Auth::id();
       $remove = Outsource::where('id', $id)->where('user_id', $userid)->where('status', 0)->delete();
       
       return redirect()->back();
        
    }
    
    public function addbalance($id)
    {
        
        $userid = Auth::id();
        $search = Outsource::where('id', $id)->where('user_id', $userid)->where('status', 1)->first();
        if($search)
        {
            return redirect()->back();
        }
        
        $idlink = Outsource::where('id', $id)->first()->linkid ?? null;
        
       
        
        $amount = Socialwork::where('id', $idlink)->first()->amount ?? null;
        
        
        
        $link = Socialwork::where('id', $id)->first()->link ?? null;
        
        $balancehistoryupdate = [
                    
                         'user_id' => $userid,
                         'section' => 'Earn From Outsourcing',
                         'amount' => $amount,
                       ];
                       
                     
                    
                    $update = Subscriberearn::create($balancehistoryupdate);
                    
                    if($update)
                    {
                        
                        $oldblance = Bonus::where('user_id', $userid)->first()->bonus ?? null;
                        
                        $amountupdate = $oldblance + $amount;
                        
                        
                        $balanceupdate = Bonus::where('user_id', $userid)->update([
                            
                            'bonus' => $amountupdate,
                            
                            ]);
                            
                        if($balanceupdate)
                        {
                            
                            $updateoutsource = Outsource::where('id', $id)->where('user_id', $userid)->where('status', 0)->update([
                                
                                'status' => 1,
                                
                                ]);
                            
                        }
                    }
                    
                    return redirect()->back();
        
        
    }
    
    public function outsourcing()
    {
        
        $userId = auth()->id();

        $allSocialworkData = Socialwork::all();
        $list = $allSocialworkData->filter(function ($socialwork) use ($userId) {
            $outsourceCount = Outsource::where('linkid', $socialwork->id)->count();
            
            $totalQty = $socialwork->qty;
           
            if ($outsourceCount < $totalQty) {
                $outsourceRecord = Outsource::where('linkid', $socialwork->id)
                                            ->where('user_id', $userId)
                                            ->first();
                return !$outsourceRecord;
            } else {
                return false; 
            }
        });

        return view('outsource.dashboard.index', compact('list'));
        
    }
    
    public function showwork()
    {
        
        $user = Auth()->user();

    $socialworks = Socialwork::where('user_id', $user->id)
                             ->where('qty', '>', 0)
                             ->get();
    $inactiveProfiles = Socialwork::where('user_id', $user->id)
                                  ->where('status', 0)
                                  ->get();

    return view('dashboard', compact('socialworks', 'inactiveProfiles'));
        
    }
    
    
    public function linkadd()
    {
            
        return view('Maintainadmin.Socialmedia.addlink');    
        
    }
    
    public function socialwork(Request $request)
    {
        $data = [
            
            'title' => $request->title,
            'category' => $request->category,
            'qty' => $request->qty,
            'amount' => $request->amount,
            'link' => $request->link,
            'user_id' => $request->user_id,
            'description' => $request->description,
            ];
            
          
        $insert = Socialwork::create($data);
        
        return redirect()->back()->with('success', 'Save Successfully');
        
    }
    
    
    
    public function listlink()
    {
        $link = Socialwork::OrderBy('created_at', 'desc')->latest()->get();
        return view('Maintainadmin.Socialmedia.listlink', compact('link')); 
    }
}
