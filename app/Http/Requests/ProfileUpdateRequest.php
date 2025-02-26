<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

     public function authorize()
     {
         return true; // You can implement any authorization logic here if needed
     }
    public function rules(): array
    {
        return [
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
