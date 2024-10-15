<?php

use App\Http\Controllers\api\CandidateController;
use App\Http\Controllers\api\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource("news" , NewsController::class);
Route::resource('candidates' ,  CandidateController::class);

