<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tickets;

class UserEvents extends Controller
{
    //
    public function show()
    {
        $tickets = Tickets::where('event_id' , Auth()->user()->id)->get();
        return view('users.user-events');
    }
}
