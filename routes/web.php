<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactProfileController;


Route::get('/', [ContactProfileController::class, 'index'])->name('contact-profiles.index');
Route::post('/contact-profiles', [ContactProfileController::class, 'store'])->name('contact-profiles.store');
Route::get('/contact-profiles/{id}/edit', [ContactProfileController::class, 'edit'])->name('contact-profiles.edit');
Route::put('/contact-profiles/{id}', [ContactProfileController::class, 'update'])->name('contact-profiles.update');
Route::delete('/contact-profiles/{id}', [ContactProfileController::class, 'destroy'])->name('contact-profiles.destroy');
