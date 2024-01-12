<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
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
Route::get('/', [GeneralController::class, 'index'])->name('index');
Route::post('/form1', [GeneralController::class, 'scrappApi'])->name('scrapper');
Route::post('/form2', [GeneralController::class, 'exportExcel'])->name('excel');
