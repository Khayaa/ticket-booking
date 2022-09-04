<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class EditEventController extends Controller
{
    //
    public function show($id){
        $event = Events::find($id);

        return view('admin.editEvents' , compact('event'));
    }

    public function update(Request $request,$id){

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


        $event = Events::find($id);
           $event->update([
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
            $event->update(['thumbnail' => $filename]);
        }
        return redirect()->back()->with('success', 'Event Updated .');
    }
}
