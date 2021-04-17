<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/directory', 'DirectoryController@index')->name('directory.index');

    Route::name('profile.')->prefix('profile')->group(function() {
        Route::get('edit', 'ProfileController@edit')->name('edit');
        Route::post('update', 'ProfileController@update')->name('update');
    });

    // Modération
    Route::get('moderation', 'ModerationController@index')->name('moderation.index')->middleware('can:moderation');

    Route::get('moderation/{user_id}/approve', 'ModerationController@approve')->name('moderation.approve');
    Route::get('moderation/{user_id}/deny', 'ModerationController@deny')->name('moderation.deny');

    // Demande d'aide
    Route::name('help.')->prefix('help')->group(function() {
        Route::get('/', 'HelpController@index')->name('index')->middleware('can:help');

        Route::get('{help_request}', 'HelpController@show')->name('show')->where('help_request', '[0-9]+')->middleware('can:show-help-request,help_request');

        Route::get('{help_request}/file/{id}', 'HelpController@downloadFile')
            ->name('file')
            ->where('help_request', '[0-9]+')
            ->middleware('can:show-help-request,help_request');
        
        Route::middleware('can:create-help-request')->group(function () {
            Route::get('create', 'HelpController@create')->name('create');

            Route::post('store', 'HelpController@store')->name('store');
        });
        
        // Réponse
        Route::post('{help_request}/answer/store', 'HelpController@storeAnswer')->name('answer.store')->middleware('can:show-help-request,help_request');
    });

    // Cours
    Route::middleware('can:help')->name('course.')->prefix('course')->group(function() {
        Route::get('/', 'CourseController@index')->name('index');
        Route::get('{course}/show', 'CourseController@show')->name('show')->middleware('can:show-course,course');

        Route::middleware('can:course-create')->group(function() {
            Route::get('create', 'CourseController@create')->name('create');
            Route::post('store', 'CourseController@store')->name('store');
        });

        // Leçons
        Route::name('lesson.')->prefix('{id}/lesson')->group(function() {

            Route::middleware('can:lesson-create')->group(function() {
                Route::get('create', 'LessonController@create')->name('create');
                Route::post('store', 'LessonController@store')->name('store');
            });

            Route::middleware('can:show-lesson,lesson')->group(function() {
                Route::get('{lesson}/show', 'LessonController@show')->name('show');
                Route::get('{lesson}/file/{file_id}', 'LessonController@downloadFile')->name('file')->where('lesson', '[0-9]+');
            });

        });

    });

    
    
});