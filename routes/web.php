<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('index');
});


Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/bukus', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');  // Mengarahkan ke halaman login setelah logout
})->name('logout');

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
