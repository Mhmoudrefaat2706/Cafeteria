<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string',
            'room_id' => 'nullable|integer',
            'ext_num' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }
}
