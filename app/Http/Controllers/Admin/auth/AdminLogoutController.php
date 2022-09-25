<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    //
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect('/');


    }
}
