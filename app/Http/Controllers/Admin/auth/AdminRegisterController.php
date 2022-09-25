<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    //
    public function show(){
        return view('admin.auth.register');
    }
    public function create(Request $request){
        $request->validate([
            'fullname' => 'required',
            'email'=>['email','required','unique:admins,email,'],
            'phone_number'=>'required',
            'password'=>['required' , 'confirmed']
        ]);

        Admin::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/admin/login')->with($request->session()->flash('account_created','Account Succesfully created'));
    }
}
