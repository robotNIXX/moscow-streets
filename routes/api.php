<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
    
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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
    
    $api = app('Dingo\Api\Routing\Router');
    
    $api->version('v1', function ($api) {
        $api->group(['prefix' => 'auth'], function ($api) {
            $api->post('login', 'App\Http\Controllers\API\V1\AuthController@login')->name('login');
            $api->get('refresh', 'App\Http\Controllers\API\V1\AuthController@refresh');
            
            $api->group(['middleware' => 'auth:api'], function ($api) {
                $api->get('user', 'App\Http\Controllers\API\V1\AuthController@user');
                $api->post('logout', 'App\Http\Controllers\API\V1\AuthController@logout');
//                admin routes
                $api->group(['middleware' => ['role:admin']], function ($api) {
                    $api->post('/import/tasks', 'App\Http\Controllers\API\V1\TasksController@import')->name('tasks.import');
                });
                $api->group(['prefix' => 'tasks'], function ($api) {
                    $api->get('/', 'App\Http\Controllers\API\V1\TasksController@index')->name('tasks.list');
                });
            });
        });
    });