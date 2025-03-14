<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

route::get("/",[ProductController::class, 'index']);

route::get("/index",[ProductController::class, 'index']);

route::get("products/create",[ProductController::class, 'create']);
route::post("products/store",[ProductController::class, 'store']);

route::get("products/show/{id}",[ProductController::class, 'show']);

route::get("products/edit/{id}",[ProductController::class, 'edit']);
route::put("products/update/{id}",[ProductController::class, 'update']);

route::put("products/update/{id}",[ProductController::class, 'update']);

route::get("products/delete/{id}",[ProductController::class, 'delete']);