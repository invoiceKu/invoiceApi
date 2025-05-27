<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return inertia('Home');
});


// Route::post('api/{device}/register', [AuthController::class, 'submitRegistrasi'])->name('api.register');

Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])->name('registrasi.tampil');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/data-registrasi', [AuthController::class, 'dataRegistrasi'])->name('registrasi.data');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/santri', [SantriController::class, 'tampil'])->name(('santri.tampil'));
Route::get('/santri/tambah', [SantriController::class, 'tambah'])->name(('santri.tambah'));
Route::post('/santri/submit', [SantriController::class, 'submit'])->name(('santri.submit'));
Route::get('santri/edit/{id}', [SantriController::class, 'edit'])->name(('santri.edit'));
Route::post('santri/update/{id}', [SantriController::class, 'update'])->name(('santri.update'));
Route::post('santri/delete/{id}', [SantriController::class, 'delete'])->name(('santri.delete'));
