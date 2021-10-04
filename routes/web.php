<?php

use Illuminate\Support\Facades\Route;

//  Controllers
use \App\Http\Controllers\ArticlesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lidem', function() {
    $users = [
        'hugo',
        'adrien',
        'anthonny',
        'axel',
        'ludo',
        'kader',
    ];

   return view('lidem', compact('users'));
});

Route::prefix('users')->name('users.')->group(function() {
    Route::get('/', function(){
        return 'page users';
    })->name('index');

    Route::get('/{name}', function($name) {
        return route('users.show', 'alex');
    })->whereAlpha('name')->name('show'); //->where('name', '[a-z]+');
});

Route::prefix('articles')->name('articles.')->group(function() {
    Route::get('/', [ArticlesController::class, 'index'])->name('index');
    Route::get('/{id}', [ArticlesController::class, 'show'])->name('show')->whereNumber('id');
});