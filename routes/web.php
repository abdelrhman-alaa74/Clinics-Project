<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\V1\AppointmentController;
use App\Http\Controllers\Web\V1\ContactController;
use App\Http\Controllers\Web\V1\HomeController;
use App\Http\Controllers\Web\V1\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Medinova Routes
Route::get('/medinova' , [HomeController::class , 'index'])->name('doctor.index');
Route::get('/medinova/about', function () {
    return view('medinova.about');
})->name('doctor.about');
Route::get('/medinova/service', function () {
    return view('medinova.service');
})->name('doctor.service');
Route::get('/medinova/pricing', function () {
    return view('medinova.pricing');
})->name('doctor.pricing');
Route::get('/medinova/contact', function () {
    return view('medinova.contact');
})->name('doctor.contact');

//Appointment Store
Route::post('/medinova', [AppointmentController::class, 'store'])->name('appointment.store');

//Contact
Route::post('/medinova/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    //Payment
    Route::post('/pay/{package}', [PaymentController::class, 'sendPayment'])->name('payment.send');
    Route::get('/payment-callback/{transaction}', [PaymentController::class, 'callback'])->name('payment.callback');
    Route::get('/payment-error', [PaymentController::class, 'handleError'])->name('payment.error');
});


require __DIR__.'/auth.php';