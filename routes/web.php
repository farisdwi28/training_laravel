<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;

Route::resource('units', UnitController::class);
Route::resource('employees', EmployeeController::class);

