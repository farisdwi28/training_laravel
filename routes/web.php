<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;

Route::resource('units', UnitController::class);

