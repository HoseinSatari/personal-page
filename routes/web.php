<?php


use Illuminate\Support\Facades\Route;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


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


Route::get('/', \App\Http\Livewire\Index::class)->name('home');
Route::get('/blog', \App\Http\Livewire\Blog\Index::class)->name('blog');
Route::get('/blog/{slug}', \App\Http\Livewire\Blog\Single::class)->name('single');


Route::get('login' , \App\Http\Livewire\Auth\Login\Login::class)->name('login')->middleware('guest');
