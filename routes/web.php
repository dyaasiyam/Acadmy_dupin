<?php

use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('');
// });
Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('teacher', [FrontController::class, 'teacher'])->name('teacher');
Route::get('teachers_single/{id}', [FrontController::class, 'teachers_single'])->name('teachers_single');
Route::get('course', [FrontController::class, 'course'])->name('course');
Route::get('courses_single/{id}', [FrontController::class, 'courses_single'])->name('courses_single');
Route::get('courses_single/{id}/enroll', [FrontController::class, 'enroll'])->name('enroll')->middleware('auth');
Route::get('courses_single/{id}/payment', [FrontController::class, 'payment'])->name('payment')->middleware('auth');
Route::get('search', [FrontController::class, 'search'])->name('search');


Route::get('/dashboard', function () {

    // dd(Auth::guard('admin')->check());

    if(Auth::guard('admin')->check()){
        return redirect()->route('admin.home');

    }
    if(Auth::guard('teacher')->check()){
        return redirect()->route('teacher.home');

    }
    if(Auth::guard('web')->check()){

        return redirect()->route('student.home');
    }
    // return view('dashboard');
})->middleware(['auth:web,teacher,admin', 'verified'])->name('dashboard');//بلغلي الداشبورد
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
