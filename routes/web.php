<?php

use App\Http\Controllers\ClaimController;
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



Route::get('/', function () {
    return view('main');
})->name('main');


Route::middleware(['role:manager'])->group(function () {
    Route::get('/dashboard', [ClaimController::class, 'show'])->name('dashboard');

    Route::get('/claim_answered/{claimId}{page}', [ClaimController::class, 'update'])->name('claim_answered');
});

Route::middleware(['role:client'])->group(function () {

    Route::get('/claim_form', [ClaimController::class, 'create'])->name('claim_form');

    Route::post('/claim_post', [ClaimController::class, 'store'])->name('claim_post');
});
require __DIR__.'/auth.php';
