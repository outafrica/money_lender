<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicants\LoanApplication;

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
    return view('welcome');
});

Route::get('/apply', function () {
    return view('apply');
});

Route::get('aa_application/apply', function () {
    return view('aa_prepaid');
});

Route::get('/answers', [LoanApplication::class, 'index']);
Route::post('/application/uploads', [LoanApplication::class, 'upload']);
Route::post('/application/send', [LoanApplication::class, 'store']);



