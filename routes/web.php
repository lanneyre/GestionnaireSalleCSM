<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\GroupeController;
use App\Models\User;

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

Route::middleware(['setAffichage'])->group(function () {
    Route::resource('salle', SalleController::class);
    Route::resource('groupe', GroupeController::class);

    Route::get("savePlanning", [Controller::class, 'savePlanning']);
    Route::post("printPdf", [Controller::class, 'printPdf'])->name("printPdf");
    Route::get("setAffichage", [Controller::class, 'setAffichage'])->name("setAffichage");
    Route::get("setTri", [Controller::class, 'setTri'])->name("setTri");
    Route::get('/', [Controller::class, 'welcome']);
});
