<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingInquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TravelController::class, 'home'])->name('home');
Route::get('/tours', [TravelController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour:slug}', [TravelController::class, 'show'])->name('tours.show');
Route::view('/about', 'pages.about')->name('about');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/account', [BookingInquiryController::class, 'index'])->name('account');
    Route::post('/tours/{tour:slug}/inquiries', [BookingInquiryController::class, 'store'])->name('inquiries.store');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tours', [AdminController::class, 'tours'])->name('tours.index');
    Route::get('/tours/create', [AdminController::class, 'createTour'])->name('tours.create');
    Route::post('/tours', [AdminController::class, 'storeTour'])->name('tours.store');
    Route::get('/tours/{tour}/edit', [AdminController::class, 'editTour'])->name('tours.edit');
    Route::put('/tours/{tour}', [AdminController::class, 'updateTour'])->name('tours.update');
    Route::delete('/tours/{tour}', [AdminController::class, 'deleteTour'])->name('tours.destroy');
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries.index');
    Route::patch('/inquiries/{inquiry}', [AdminController::class, 'updateInquiry'])->name('inquiries.update');
});
