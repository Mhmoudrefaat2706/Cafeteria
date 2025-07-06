<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|string',
            'room_id' => 'nullable|integer',
            'ext_num' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'role.required' => 'Role is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Image must be in jpg, jpeg, or png format.',
            'room_id.integer' => 'Room ID must be a number.',
        ];
    }
}

