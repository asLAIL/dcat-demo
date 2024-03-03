<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\CustomRequest;

class UserRequest extends CustomRequest
{
    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
            'password' => 'required|alpha_dash|min:6',
        ];
    }

    public function attributes()
    {
        return [
            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'password.required' => 'A password is required',
        ];
    }
}
