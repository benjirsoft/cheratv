<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBio;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;

class UserBioController extends Controller
{

    public function storebio(Request $request)
    {


        $userid = Auth::id();

        $userprofile = UserBio::where('user_id', $userid)->first();

        // Define the validation rules
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|required|max:255',
        ];

        // Validate the user input
        $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName(); // Get the original
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move(public_path('uploads'), $imageName);
        
            // Check if image has changed before updating
            if ($userprofile->image !== $imageName) {
                $userprofile->image = $imageName;
            }
        }

        if ($request->has('description') && $userprofile->description !== $request->description) {
            $userprofile->description = $request->description;
        }

        $userprofile->save();

        return redirect()->back()->with('success', 'Update Successfully');



    }

    public function personaldetails(Request $request)
    {
    //update personal details 

        $validator = Validator::make($request->all(),[

            'mobilebankingno' => 'required|string',
            
            
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $gender = $request->input('gender');
        $mobilebankingno = $request->input('mobilebankingno');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');

        $userid = Auth::id();

        $personal = Profile::where('user_id', $userid)->first();
        $personal->gender = $gender;
        $personal->mobilebankingno = $mobilebankingno;
        $personal->address = $address;
        $personal->city = $city;
        $personal->state = $state;
        $personal->zipcode = $zipcode;
        $personal->country = $country;
        $personal->save();

        return redirect()->back()->with('success', 'update success');


    }
}
