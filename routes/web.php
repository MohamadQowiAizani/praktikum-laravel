<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return view('welcome');
});

//route dasar
// Route::get('/Surat-Masuk', function () {
//     return 'Halaman Surat Masuk';
// })->name('surat-masuk.index');

//route dengan parameter
Route::get('/Surat-Masuk/{id}', function ($id) {
    return 'Detail Surat Masuk dengan id:' .$id;
})->name('surat-masuk.show');

//route controller
Route::get('/Surat-Masuk', [SuratMasukController::class,'index']) 
->name('surat-masuk.show');

Route::get('/Surat-Masuk/{$id}', [SuratMasukController::class,'show']) 
->name('surat-masuk.show');

