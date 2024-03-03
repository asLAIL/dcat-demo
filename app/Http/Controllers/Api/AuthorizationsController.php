<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Auth\AuthenticationException;
use App\Http\Requests\Api\AuthorizationRequest;

class AuthorizationsController extends Controller
{
    //
    public function store(AuthorizationRequest $request)
    {
       
        $username = $request->name;

       
        $credentials['name'] = $username;
        $credentials['password'] = $request->password;

        if (!$token = \Auth::guard('api')->attempt($credentials)) {
            return $this->failed("用户名或密码错误");
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }
    
    protected function respondWithToken($token)
    {
        return response()->json([
            'status'=>'success',
            'code'=>201,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function update()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token)->setStatusCode(201);
    }

    public function destroy()
    {
        auth('api')->logout();
        return response(null, 204);   
    }

}
