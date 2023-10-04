<?php

use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\TeacherTimesController;
use Illuminate\Support\Facades\Route;

Route::prefix('/teacher')->name('teacher.')->middleware('auth:teacher')->group(function() {
    Route::get('/home', [TeacherController::class, 'index'])->name('home');
    Route::get('/courses', [TeacherController::class, 'courses'])->name('courses');
    Route::get('/courses/{id}', [TeacherController::class, 'showCourse'])->name('courses.show');
    Route::resource('times', TeacherTimesController::class);

    Route::get('/appointment', [TeacherController::class, 'appointment'])->name('appointment');
    Route::get('/time/{id}/{status}', [TeacherController::class, 'time_status'])->name('time_status');

    // Route::get('/activity/accept/{id}', [TeacherController::class, 'acceptActivity'])->name('time.accept');
    // Route::get('/activity/reject/{id}', [TeacherController::class, 'rejectActivity'])->name('time.reject');


});
