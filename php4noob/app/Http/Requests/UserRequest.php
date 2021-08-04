<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

public function messages()
{
    return [
        'name.required' => 'A name is required ❌',
        'email.required' => 'A email is required ❌',
    ];
}

public function rules()
{
    return [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required',
    ];
}
}
