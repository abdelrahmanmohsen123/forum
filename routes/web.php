<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/threads/create',[App\Http\Controllers\ThreadController::class, 'create']);

Route::get('/threads',[App\Http\Controllers\ThreadController::class, 'index'])->name('threads.all');

Route::get('/threads/{channel}',[App\Http\Controllers\ThreadController::class, 'index'])->name('threads.filter');


Route::post('/threads',[App\Http\Controllers\ThreadController::class, 'store']);



Route::get('/threads/{channel}/{thread}',[App\Http\Controllers\ThreadController::class, 'show']);
 Route::post('/threads/{channel}/{thread}/replies',[App\Http\Controllers\ReplyController::class, 'store'])->name('add_reply_to_thread');

Route::resource('threads',ThreadController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');