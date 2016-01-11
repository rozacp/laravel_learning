<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'PagesController@home')->name('pages.home');
    Route::get('about', 'PagesController@about')->name('pages.about');
    Route::get('contact', 'PagesController@contact')->name('pages.contact');

    Route::get('tags/{tag}', 'TagsController@show')->name('tags');

//	Route::get('articles', 'ArticlesController@index');
//	Route::get('articles/{id}', 'ArticlesController@show')->where('id', '^[0-9]*$');
//	Route::get('articles/create', 'ArticlesController@create');
//	Route::post('articles', 'ArticlesController@store');
//  Route::get('articles/{id}/edit', 'ArticlesController@edit')->where('id', '^[0-9]*$');

    Route::resource('articles', 'ArticlesController');

    Route::auth();

});
