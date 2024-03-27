<?php

use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('shipments');
});

Route::post('shipments', DeliveryController::class);
