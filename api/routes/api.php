<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get("/items", [TodoListController::class, "getItems"])->name("getItems");
Route::post("/createItem", [TodoListController::class, "createItem"])->name("createItem");
Route::post("/markComplete/{id}", [TodoListController::class, "markComplete"])->name("markComplete");
Route::post("/deleteItem/{id}", [TodoListController::class, "deleteItem"])->name("deleteItem");
Route::post("/updateItem/{id}", [TodoListController::class, "updateItem"])->name("updateItem");
