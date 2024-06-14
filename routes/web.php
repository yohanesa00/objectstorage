<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', [UploadController::class, 'showUploadForm'])->name('showUploadForm');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload');