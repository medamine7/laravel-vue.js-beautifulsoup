<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/get_videos/{choice}/{num}', 'PagesController@getVideosApi'); 


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get("/mail",function(){
    $json='{"heading":"عنواني",
        "body":"مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي مقالتي ",
        "image":"articles\\\May2018\\\p0SON0SZSLOODaXjQn7m-cropped.jpg"}';
    $content="this is a testing matter i don't what to say other than screw that piece of shit of a teacher.this is a testing matter i don't what to say other than screw that piece of shit of a teacher.";    

    return new App\Mail\myMail(json_decode($json)); 
});


Route::post("subscribe","SubscriptionController@subscribed");

Route::group(['prefix' => '{lang?}','middleware' => 'localization'],function() {
    
    Route::get('videos', function(){
        return view('videos');
    })->name('videosRoute'); 
    
    Route::get('article/{slug}', 'PagesController@getArticle');     
    Route::get('video/{slug}', 'PagesController@getVideo');     
    Route::get('/', 'PagesController@index'); 
    Route::get('/leagues', 'PagesController@getLeagues'); 
    Route::get('leagues/{choice}', 'PagesController@getLeague')->name("league_chosen"); 
    
});


