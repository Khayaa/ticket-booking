<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class eventsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
        $events = Events::paginate();
        return view('admin.Events' , compact('events'));
    }

    public function deleteEvent($id){
        $event = Events::find($id);
        $event->delete();
        return redirect()->back()->with('success', 'Event successfully Deleted.');
    }
}
