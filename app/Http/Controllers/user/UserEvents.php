<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEvents extends Controller
{
    //
    public function show()
    {
        return view('users.user-events');
    }
}
