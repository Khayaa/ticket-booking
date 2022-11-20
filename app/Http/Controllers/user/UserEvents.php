<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Events;

class UserEvents extends Controller
{
    //
    public function show()
    {
        $tickets = Tickets::where('user_id' , Auth()->user()->id)->get();
        $allevents = Events::all();
        return view('users.user-events', ['events'=> $allevents , 'tickets' => $tickets]);
    }
}
