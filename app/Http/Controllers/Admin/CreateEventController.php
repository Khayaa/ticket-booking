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
            'number_of_tickets' => ['required', 'integer'],
            'slug' => 'required',
            'description' => 'required',
            'event_type' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => ['nullable'],
            'event_status' => 'required',
            'thumbnail' => ['image', 'mimes:png,jpeg', 'nullable'],
            'date' => 'required',
        ]);
        $slugg =  str_replace(' ','_' ,$validated['slug']);




           $event =  Events::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_type' => $validated['event_type'],
            'slug' => $slugg,
            'number_of_tickets' => $validated['number_of_tickets'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'price' => $validated['price'],
            'event_status' => $validated['event_status'],
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
