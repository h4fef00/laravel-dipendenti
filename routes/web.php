<?php

use App\Http\Controllers\DipendenteController;
use App\Http\Controllers\FakeStoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


// Route::get('/', function () {
//     return view('layout');
// });

Route::get("/", [FakeStoreController::class, "getProducts"]);

Route::get("/dipendenti", [DipendenteController::class, "list"])->name("dipendente.list");

Route::get("/create", [DipendenteController::class, "create"])->name("dipendenti.create");

Route::post('/store', [DipendenteController::class, 'store'])->name("dipendente.store");

Route::get('/create/{id}', [DipendenteController::class, 'edit'])->name("dipendente.create");

Route::delete('/delete/{id}', [DipendenteController::class, 'delete'])->name("dipendente.delete");


Route::get(
    "/product/{id}",
    [FakeStoreController::class, "getSingle"]
);
