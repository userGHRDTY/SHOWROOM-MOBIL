<?php

use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

Route::apiResource('mobil', MobilController::class);