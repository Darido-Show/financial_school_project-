<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 /*
    |--------------------------------------------------------------------------
    | Lessons routes
    |--------------------------------------------------------------------------
 */

    
    Route::get('/lesson/show_deleted', [App\Http\Controllers\LessonController::class, 'show_deleted'])->name('lessons.show_deleted');
    Route::put('/lessons/restore/{lesson}', [App\Http\Controllers\LessonController::class, 'restore'])->name('lessons.restore')->withTrashed();
    Route::resource('/lessons', App\Http\Controllers\LessonController::class);
  /*   
    |--------------------------------------------------------------------------
    | Exercise routes
    |--------------------------------------------------------------------------
    */ 

    Route::get('/exercise/show_deleted', [App\Http\Controllers\ExerciseController::class, 'show_deleted'])->name('exercises.show_deleted');
    Route::put('/exercises/restore/{exercise}', [App\Http\Controllers\ExerciseController::class, 'restore'])->name('exercises.restore')->withTrashed();
    Route::resource('/exercises', App\Http\Controllers\ExerciseController::class);