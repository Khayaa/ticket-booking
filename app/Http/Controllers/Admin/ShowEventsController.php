<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class ShowEventsController extends Controller
{
    //
    public function show(){
        $events = Events::paginate();
        return view('ShowEvents' , compact('events'));
    }
}
