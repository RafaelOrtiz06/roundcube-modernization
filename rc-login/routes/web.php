<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IMAPController;

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

Route::prefix('imap')->group(function () {
    Route::post('/login', [IMAPController::class, 'login']);
});


Route::get('/', function () {
    return view('welcome');
});


require __DIR__ . '/auth.php';
