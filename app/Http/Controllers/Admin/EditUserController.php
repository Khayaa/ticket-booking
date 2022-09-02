<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class EditUserController extends Controller
{
    //
    public function show($id){
        $user = User::find($id);
        return view('admin.EditUser', compact('user'));
    }

    public function updateUser(ProfileUpdateRequest $request,$id){

        $user = User::find($id);
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        if($request->hasFile('profile_image')){
            $avatar = $request->file('profile_image');
            $filename = time(). '-'. '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('image/users/avatars',$filename,'public');
            $user->update(['image' => $filename]);

        }



        $user->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return redirect()->back()->with('success', 'Profile updated.');

}
}

