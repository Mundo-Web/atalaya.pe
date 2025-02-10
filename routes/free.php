<?php

use App\Http\Controllers\RemainingHistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/remainings-history', [RemainingHistoryController::class, 'set']);
