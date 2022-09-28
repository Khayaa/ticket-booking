<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tickets;
use App\Models\Events;
class UserTickets extends Controller
{
    //
    public function show()
    {
        // $event =  Events::where
        $tickets = Tickets::where('user_id' , Auth()->user()->id)->get();
        return view('users.user-tickets' ,compact('tickets'));
    }
}
