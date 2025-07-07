<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user')->id;

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|min:6',
            'role' => 'nullable|string',
            'room_id' => 'nullable|integer',
            'ext_num' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }
}
