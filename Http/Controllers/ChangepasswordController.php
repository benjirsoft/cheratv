<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class ChangepasswordController extends Controller
{
    

    public function changepassword(Request $request)
    {
               
        $user = Auth::user();

        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('newpassword');
        $confirmPassword = $request->input('confirmpassword');
        
        if (!Hash::check($oldPassword, $user->password)) {
            return redirect()->back()->withErrors(['Old password is incorrect']);
        }
        
        if ($newPassword != $confirmPassword) {
            return redirect()->back()->withErrors(['new_password' => 'New password and confirmed password do not match']);
        }
        
        $user->password = Hash::make($newPassword);
        $user->save();
        
        return redirect()->back()->with('success', 'Password changed successfully!');

    }



}
