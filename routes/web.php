<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
Route::get('/', function () {
    return view('welcome');
});


Route::resource("/stockInventory", InventoryController::class);
