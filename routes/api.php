<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BbpsApiController;
use App\Http\Controllers\Api\AuthApiController;

Route::prefix('auth')->name('api.auth.')->group(function () {
    Route::post('/send-otp', [AuthApiController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthApiController::class, 'verifyOtp']);
});

Route::prefix('bbps')->name('api.bbps.')->group(function () {
    Route::get('/auth/token', [BbpsApiController::class, 'getToken']);
    Route::get('/ledger/balance', [BbpsApiController::class, 'checkBalance']);
    
    Route::get('/billers/categories', [BbpsApiController::class, 'getCategories']);
    Route::get('/billers/category/{category}', [BbpsApiController::class, 'getBillersByCategory']);
    Route::get('/billers/regions', [BbpsApiController::class, 'getRegions']);
    Route::get('/billers/region/{regionCode}', [BbpsApiController::class, 'getBillersByRegion']);
    Route::get('/billers/all', [BbpsApiController::class, 'getAllBillers']);
    Route::get('/biller/{billerId}', [BbpsApiController::class, 'getBillerById']);
    
    Route::post('/plans', [BbpsApiController::class, 'fetchPlans']);
    
    Route::post('/bill/fetch/{channel}', [BbpsApiController::class, 'fetchBill'])->where('channel', 'int|mob|agt');
    Route::post('/bill/validate', [BbpsApiController::class, 'validateBill']);
    
    Route::post('/bill/payment/{channel}', [BbpsApiController::class, 'payBill'])->where('channel', 'int|mob|agt');
    
    Route::get('/complaint/disposition', [BbpsApiController::class, 'getComplaintDispositions']);
    Route::post('/complaint/raise', [BbpsApiController::class, 'raiseComplaint']);
    Route::post('/complaint/status', [BbpsApiController::class, 'checkComplaintStatus']);
    Route::post('/complaint/transaction-status', [BbpsApiController::class, 'checkTransactionStatus']);
});
