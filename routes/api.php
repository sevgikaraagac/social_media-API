<?php

use Illuminate\Http\Request;

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
////
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login','Api\loginController@login')->name('login');
        Route::post('/register','Api\RegisterController@register')->name('register');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::post('/create','Api\ProfileController@create');
        Route::post('/updateProfile','Api\ProfileController@updateProfile');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::post('/create','Api\PostController@create');
        Route::get('/remove','Api\PostController@remove');
        Route::post('/updatePost','Api\PostController@updatePost');
        Route::get('/showPost','Api\PostController@showPost');
    });
    Route::group(['prefix' => 'follow_follower'], function () {
        Route::post('/create','Api\Follow_FollowerController@create');
        Route::get('/remove','Api\Follow_FollowerController@remove');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::post('/message', 'Api\MessageController@create_message')->name('create_message');
        Route::post('/remove_message', 'Api\MessageController@remove_message');
        Route::post('/remove_all', 'Api\MessageController@remove_all');
        Route::post('/remove_whom_all', 'Api\MessageController@remove_whom_all');
        Route::post('/get_message', 'Api\MessageController@get_message');
    });
    Route::group(['prefix' => 'like'], function () {
        Route::post('create_like','Api\LikeController@create');
        Route::get('get_like','Api\LikeController@getLike');
        Route::post('delete_like','Api\LikeController@delete');
    });
    Route::group(['prefix' => 'notification'], function () {
        Route::post('/remove_notification', 'Api\NotificationController@remove_notification');
        Route::post('/get_notification', 'Api\NotificationController@get_notification');
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::post('create_comment','Api\CommentController@create');
        Route::get('get_comments','Api\CommentController@getComments');
        Route::post('delete_comment/{id}','Api\CommentController@delete');
        Route::post('update_comment','Api\CommentController@updateComment');
    });
});
