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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/test', function () {
    $article = \App\Models\Category::where('id' , 2)->first();
    dd($article->articles()->get());
});


Route::get('login' , \App\Http\Livewire\Auth\Login\Login::class)->name('login')->middleware('guest');
