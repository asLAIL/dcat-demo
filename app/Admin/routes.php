<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    Route::resource('sys/config','SysConfigController');
    
    //轮播图
    Route::resource('shop/loopinfo','ShopLoopinfoController');
    //商品
    Route::resource('shop/vege','ShopVegetableController');
    //商品分类
    Route::resource('shop/vegetype','ShopVegetabletypeController');
    //商品评论
    Route::resource('shop/vegetype','ShopOrderevalController');
    
    Route::post('sys/config/save','SysConfigController@saveConfig');
    
    
});
