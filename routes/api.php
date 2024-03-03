<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthorizationsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->name('api.v1.')->group(function() {
    
    //限流 1:10
    Route::middleware('throttle:' . config('api.rate_limits.sign'))
    ->group(function () {
        
        
        // 用户注册
        Route::post('users', [UsersController::class, 'store'])->name('users.store');
        
        // 登录
        Route::post('authorizations', [AuthorizationsController::class, 'store'])->name('authorizations.store');

        // 刷新token
        Route::put('authorizations/current', [AuthorizationsController::class, 'update'])->name('authorizations.update');
        
        // 删除token
        Route::delete('authorizations/current', [AuthorizationsController::class, 'destroy'])->name('authorizations.destroy');
        
        //版本信息    
        Route::get('version', function() {return 'this is version v1';})->name('version');     
    });
    
    //限流 1:60
    Route::middleware('throttle:' . config('api.rate_limits.access'))
    ->group(function () {
    //游客可以访问的接口
    
        // 某个用户的详情
        Route::get('users/{user}', [UsersController::class, 'show'])->name('users.show');

        // 登录后可以访问的接口 
        Route::middleware('auth:api')->group(function() {
            
            // 当前登录用户信息
            Route::get('user', [UsersController::class, 'me'])->name('user.show');
            
            // 编辑登录用户信息
            Route::patch('user', [UsersController::class, 'update'])->name('user.update');

            
        });
        
        
        
        
         

    });
    
    Route::fallback(function () {
        //
        return 'not found!';
    });
  
});




