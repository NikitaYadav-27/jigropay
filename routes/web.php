<?php

use App\Http\Controllers\BbpsController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisputeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
});

Route::prefix('kyc')->name('kyc.')->group(function () {
    Route::get('/', [KycController::class, 'operations'])->name('operations');
    Route::get('/{merchant}', [KycController::class, 'show'])->name('show');
});

Route::prefix('wallet')->name('wallet.')->group(function () {
    Route::get('/', [WalletController::class, 'index'])->name('index');
    Route::get('/list', [WalletController::class, 'list'])->name('list');
    Route::get('/transfer', [WalletController::class, 'transfer'])->name('transfer');
    Route::get('/add-fund', [WalletController::class, 'addFund'])->name('add-fund');
});

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::get('/{id}', [TransactionController::class, 'show'])->name('show');
});
Route::prefix('commission')->name('commission.')->group(function () {
    Route::get('/', [CommissionController::class, 'index'])->name('index');
    Route::get('/slabs', [CommissionController::class, 'slabs'])->name('slabs');
});
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::prefix('bbps')->name('bbps.')->group(function () {
    Route::get('/', [BbpsController::class, 'index'])->name('index');
    Route::get('/{service}/confirm', [BbpsController::class, 'confirm'])->name('confirm');
    Route::get('/{service}', [BbpsController::class, 'service'])->name('service');
});

Route::prefix('notifications')->name('notifications.')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::get('/send', [NotificationController::class, 'send'])->name('send');
    Route::get('/history', [NotificationController::class, 'history'])->name('history');
});

Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::get('/commissions', [SettingsController::class, 'commissions'])->name('commissions');
});

Route::prefix('disputes')->name('disputes.')->group(function () {
    Route::get('/', [DisputeController::class, 'index'])->name('index');
    Route::get('/refunds', [DisputeController::class, 'refunds'])->name('refunds');
    Route::get('/{id}', [DisputeController::class, 'show'])->name('show');
});

Route::prefix('settlement')->name('settlement.')->group(function () {
    Route::get('/', [SettlementController::class, 'index'])->name('index');
    Route::get('/instant', [SettlementController::class, 'instant'])->name('instant');
    Route::get('/queue', [SettlementController::class, 'queue'])->name('queue');
});

Route::prefix('masters')->name('masters.')->group(function () {
    Route::get('/offers/create', [MasterController::class, 'offersCreate'])->name('offers.create');
    Route::get('/offers', [MasterController::class, 'offers'])->name('offers');
    Route::get('/commission/create', [MasterController::class, 'commissionCreate'])->name('commission.create');
    Route::get('/commission', [MasterController::class, 'commission'])->name('commission');
    Route::get('/audit-logs', [MasterController::class, 'auditLogs'])->name('audit');
});
});
