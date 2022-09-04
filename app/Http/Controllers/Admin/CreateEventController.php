<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class CreateEventController extends Controller
{
    //
    public function show()
    {
        return view('admin.createEvents');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_type' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => ['nullable'],
            'event_type' => 'required',
            'thumbnail' => ['image', 'mimes:png,jpeg', 'nullable'],
            'date' => 'required',
        ]);



           $event =  Events::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_type' => $validated['event_type'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'price' => $validated['price'],
            'event_type' => $validated['event_type'],
            'date' => $validated['date'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $avatar = $request->file('thumbnail');
            $filename = time() . '-' . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('image/events/', $filename, 'public');
           $event->thumbnail = $filename;
        }

        $event->save();



        return redirect()->route('admin.events')->with('success', 'Event Created .');
    }
}
