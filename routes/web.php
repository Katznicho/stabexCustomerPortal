<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardRequestController;
use App\Http\Controllers\CardTopupController;
use App\Http\Controllers\CardTransferController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\GasController;
use App\Http\Controllers\LubricantController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatementController;

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

Route::redirect('/', 'login');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//login
Route::post("/loginUser", [AuthController::class, "login"])->name("login");
//login

Route::resource("stations", StationController::class);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//resources
Route::resource("users", UserController::class);
Route::resource("card-requests", CardRequestController::class);
Route::resource("card-topups", CardTopupController::class);
Route::resource("card-transfers", CardTransferController::class);
Route::resource("cards", CardController::class);
Route::resource("fuel", FuelController::class);
Route::resource("gas", GasController::class);
Route::resource("lubricants", LubricantController::class);
Route::resource('services', ServiceController::class);
Route::resource("card-balances", CardController::class);
Route::resource("consumption", ConsumptionController::class);
Route::resource("statements", CardController::class);
Route::resource("my-profile", ProfileController::class);
//resources


