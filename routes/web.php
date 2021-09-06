<?php

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

Route::prefix('/')->group( function () {
    Route::get('',\App\Http\Livewire\Guest\Home\View::class)->name('guest.home');
    Route::get('inventarisasi',\App\Http\Livewire\Guest\Inventarisasi\View::class)->name('guest.inventaris');
    Route::get('peraturan',\App\Http\Livewire\Guest\Peraturan\View::class)->name('guest.peraturan');
    Route::middleware(['is_publish'])->group(function (){
        Route::get('peraturan/view/{peraturan_id}',\App\Http\Livewire\Guest\Peraturan\Detail::class)->name('guest.peraturan.view');
    });
});




// super-admin
Route::prefix('super-admin')->middleware(['auth:sanctum', 'verified','role:super-admin'])->group(function () {
    Route::get('users', \App\Http\Livewire\SuperAdmin\Users::class )->name('user.list');
    Route::get('data-master',\App\Http\Livewire\SuperAdmin\DataMaster\View::class)->name('data-master');
    Route::get('peraturan',\App\Http\Livewire\SuperAdmin\Peraturan\View::class)->name('peraturan');
    Route::get('peraturan/add',\App\Http\Livewire\SuperAdmin\Peraturan\Add::class)->name('peraturan.add');
    Route::get('peraturan/edit/{peraturan_id}',\App\Http\Livewire\SuperAdmin\Peraturan\Add::class)->name('peraturan.edit');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
