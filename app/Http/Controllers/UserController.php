<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function change_password()
    {
        $data['head_title'] = " Change Password";
        return view("profile.change_passowrd",$data);
    }
    public function update_password(Request $request)
    {
        $user =User::getsingle(Auth::user()->id);
        // dd($user);   
        if(Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with("success","New Password Submited Successfully");
        }else{
            return redirect()->back()->with("error","Password Dose Not Match");
        }   

    }
    
   
}
