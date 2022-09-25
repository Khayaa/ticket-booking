<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        if($request->hasFile('profile_image')){
            $avatar = $request->file('profile_image');
            $filename = time(). '-'. '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('image/users/avatars',$filename,'public');
            auth()->user()->update(['image' => $filename]);

        }



        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
