<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  public function authorize(): bool
{
    return auth()->check() && auth()->user()->role === 'user';
}


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
              return [
            'notes' => 'nullable|string',
            'room_id' => 'required|exists:rooms,id',
        ];
    }
        public function messages()
    {
        return [
            'room_id.required' => 'Please select a room.',
            'room_id.exists' => 'The selected room does not exist.',
        ];
    }
}
