<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\CustomRequest;
class AuthorizationRequest extends CustomRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string',
            'password' => 'required|alpha_dash|min:6',
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
