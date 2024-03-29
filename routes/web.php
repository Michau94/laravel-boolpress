<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes(['register' => true]);


//# Rotte che necessitano di autenticazione (Admin); 

Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    //rotte form contatto
    Route::get('/contatti', 'EmailController@contact')->name('contact');
    Route::post('/contact', 'EmailController@handleContact')->name('contact.send');
    Route::get('/ths', 'EmailController@thank')->name('contact.thank');

    // Rotte risorse
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
});

// se non appartiene a nessuna delle rotte sovrastanti deve gestire questa pagina

Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*');
