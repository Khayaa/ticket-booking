<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user())],
            'surname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','regex:/[0-9]{10}/', 'size:10',Rule::unique('users')->ignore(Auth::user())],
            'id_number' => ['required','regex:/[0-9]{13}/','size:13',Rule::unique('users')->ignore(Auth::user())],
            'profile_image' =>['sometimes','image','mimes:png,jpg'] ,
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
