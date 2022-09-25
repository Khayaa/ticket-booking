<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //
    public function show(){
        return view('admin.profile');
    }
    public function update(Request $request){

        $request->validate([
            'fullname'=>'required',
            'phone_number'=> 'required',
            'avatar'=>['sometimes','image',] ,
            'password'=>['nullable' , 'confirmed']
        ]);
        if ($request->password) {
            auth()->guard('admin')->user()->update(['password' => Hash::make($request->password)]);
        }
        
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '-'. '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('image/users/avatars',$filename,'public');
            auth()->guard('admin')->user()->update(['avatar' => $filename]);

        }


        auth()->guard('admin')->user()->update([
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,

        ]);



        return redirect()->back()->with('success', 'Profile updated.');

    }
}
