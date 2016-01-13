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

    Route::resource('articles', 'ArticlesController');

    Route::auth();
});
