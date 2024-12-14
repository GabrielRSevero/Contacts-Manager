<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [AuthController::class, "showLoginForm"])->name("login")->middleware("guest");

Route::post("/login", [AuthController::class, "login"])->name("login.submit")->middleware("guest");

Route::post("/logout", [AuthController::class, "logout"])->name("logout")->middleware("auth");

Route::get("/", [ContactController::class, "index"])->name("contacts.index");

Route::prefix("contacts")->middleware("auth")->group(function() {

    Route::get("/create", [ContactController::class, "create"])->name("contacts.create");

    Route::get("/show/{contact}", [ContactController::class, "show"])->name("contacts.show");

    Route::post("/store", [ContactController::class, "store"])->name("contacts.store");

    Route::get("/edit/{contact}", [ContactController::class, "edit"])->name("contacts.edit");

    Route::put("/update/{contact}", [ContactController::class, "update"])->name("contacts.update");

    Route::delete("/delete/{contact}", [ContactController::class, "destroy"])->name("contacts.destroy");
});
