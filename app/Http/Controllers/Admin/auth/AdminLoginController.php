<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function show(){
        return view('admin.auth.login');

    }
    public function login(Request $request){
       $credentials = $request->validate([
            'email' => ['required' , 'email'],
            'password' => 'required',
       ]);

       if(Auth::guard('admin')->attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('admin/dashboard');


       }
    //    return back()->withErrors(
    //     [$this->addError('email' , trans('auth.failed'))]
    // );

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

    }
}
