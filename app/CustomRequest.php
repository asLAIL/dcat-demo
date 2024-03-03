<?php
namespace App;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CustomRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => 'error',
            'code'=>400,
            'message' => $validator->errors()->first(),
            // 'errors' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, Response::HTTP_BAD_REQUEST));
    }
}
