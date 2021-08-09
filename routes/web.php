<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;

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

Auth::routes();


Route::group(['middleware'=>'auth'], function(){
    /* Dashboard Action */
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /* Vote Action */
    Route::group(['prefix'=>'vote-list'], function(){
        Route::get('/', [VoteController::class, 'index'])->name('vote-list.index');
        Route::get('/create', [VoteController::class, 'create'])->name('vote-list.create');
        Route::post('/store', [VoteController::class, 'store'])->name('vote-list.store');
        Route::get('/detail/{vote}', [VoteController::class, 'detail'])->name('vote-list.detail');
    });

});
