<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Forebear\AddChildController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForebearsController;
use App\Http\Controllers\Teacher\AddReviewController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
//Route::get('/', [UserController::class, 'index'])->name('users.index');


Route::resource('users', UserController::class);
Route::resource('children', ChildController::class);
Route::resource('forebears', ForebearsController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('advertisements', AdvertisementController::class);


Route::get('/Forebear',function()
{
    return view('Dashboard.Forebear.dashboard');
});//->middleware(['auth', 'role:forebear']);

Route::resource('forebear_child',AddChildController::class);


Route::get('/teacher',function()
{
    return view('Dashboard.Teacher.dashboard');
});//->middleware(['auth', 'role:teacher']);

Route::get('/admin_dashboard',function()
{
    return view('Admin.admin_dashboard');
});//->middleware(['auth', 'role:admin']);

Route::resource('teacher_review',AddReviewController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
