<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventDetails extends Controller
{
    //
    public function show($id){
        $event = Events::where('id', $id)->first();
        return view('event-details' , compact('event'));
    }
}
