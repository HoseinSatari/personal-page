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

Route::get('/', 'AdminController@index');

Route::prefix('InfoBasic')->namespace('InfoBasic')->group(function () {
    Route::get('/InfoBasic', 'InfoBasicController@show')->name('Basic_show');
    Route::get('/edit/{id}', 'InfoBasicController@edit');
    Route::put('/edit/{id}', 'InfoBasicController@put_edit');
});


Route::namespace('Education')->group(function () {
    Route::resource('education' , 'EducationController')->except('show');
});
Route::namespace('Work')->group(function () {
    Route::resource('Work' , 'WorkController')->except('show');
});

Route::namespace('Skill')->group(function () {
    Route::resource('skill' , 'SkillController')->except('show');
});
Route::namespace('SoftSkill')->group(function () {
    Route::resource('softskill' , 'SoftSkillController')->except('show');
});

Route::namespace('Job')->group(function () {
    Route::resource('job' , 'JobController')->except('show');
});
Route::namespace('article\category')->group(function () {
    Route::resource('category_post' , 'CategoryController')->except('show');
    Route::put('categorya/delete/{id}' , 'CategoryController@restor')->name('categorya.restor');
});

Route::get('/option' , 'OptionController@index')->name('option.index');
Route::post('/option' , 'OptionController@update');

Route::namespace('article')->group(function () {
    Route::resource('article' , 'ArticleController');
    Route::post('ckeditor/upload', 'ArticleController@upload')->name('ckeditor.upload');
});

Route::get('contact' , 'ContactController@index')->name('contact.index');
Route::delete('Contact/{id}/delete' , 'ContactController@delete')->name('contact.delete');
Route::post('contact/{id}' , 'ContactController@approved')->name('contact.approved');

Route::get('/comments' , 'CommentController@index')->name('comments');
Route::put('/comments/approved/{id}' , 'CommentController@approve')->name('comments.approve');
Route::post('/comments/send' , 'CommentController@send')->name('comments.send');
Route::delete('/comments/{id}/delete' , 'CommentController@delete')->name('comments.delete');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
