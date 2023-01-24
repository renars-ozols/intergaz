<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportsController;
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
Route::get('/', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/reports/order-types', [ReportsController::class, 'differentOrderTypes'])->name('reports.order-types');
Route::get('/reports/last-deliveries', [ReportsController::class, 'lastDeliveries'])->name('reports.last-deliveries');
Route::get('/reports/inactive-clients', [ReportsController::class, 'inactiveClients'])->name('reports.inactive-clients');

require __DIR__.'/auth.php';
