<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get("/savePlanning", [Controller::class, 'savePlanning']);
Route::get('/', [Controller::class, 'welcome']);


Route::get("/groupe/{groupe}", [Controller::class, 'demo']);
