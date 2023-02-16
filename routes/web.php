<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get("/", [TodoListController::class, "index"]);

Route::post("/saveItemRoute", [TodoListController::class, "saveItem"])->name("saveItem");
Route::post("/markCompleteRoute/{id}", [TodoListController::class, "markComplete"])->name("markComplete");
Route::post("/deleteItemRoute/{id}", [TodoListController::class, "deleteItem"])->name("deleteItem");
Route::get("/edit/{id}", [ToDoListController::class, "editItem"])->name("editItem");
Route::post("/update/{id}", [ToDoListController::class, "updateItem"])->name("updateItem");