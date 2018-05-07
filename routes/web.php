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


Route::get('/leagues', 'PagesController@getLeagues'); 
Route::get('/leagues/{choice}', 'PagesController@getLeague')->name("league_chosen"); 
Route::get('/get_videos/{num}', 'PagesController@getVideosApi'); 


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::group(['prefix' => '{lang?}','middleware' => 'localization'],function() {
    
    Route::get('videos', function(){
        return view('videos');
    })->name('videosRoute'); 
    
    Route::get('article/{anchor}', 'PagesController@getArticle');     
    Route::get('/', 'PagesController@index'); 
    
});



