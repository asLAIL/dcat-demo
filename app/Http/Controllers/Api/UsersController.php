<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
   
    
    public function store(UserRequest $request)
    {
        

        $user = User::create([
            'name' => $request->name,
            'password' => $request->password,
        ]);
        
        return $this->success(new UserResource($user));
    }
    
    public function show(User $user, Request $request)
    {
       
        return $this->success(new UserResource($user));
    }

    public function me(Request $request)
    {
        return $this->success(new UserResource($request->user()));
    }
    
    public function update(UserRequest $request)
    {
        $user = $request->user();

        $attributes = $request->only(['name', 'email', 'introduction']);

        // if ($request->avatar_image_id) {
        //     $image = Image::find($request->avatar_image_id);

        //     $attributes['avatar'] = $image->path;
        // }

        $user->update($attributes);

        return $this->success(new UserResource($user));
    }

    
}
