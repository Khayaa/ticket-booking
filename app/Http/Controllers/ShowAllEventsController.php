<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;


class ShowAllEventsController extends Controller
{
    public function show(){
        $events = Events::all();
        return view('allevents' , compact('events'));
    }
}
