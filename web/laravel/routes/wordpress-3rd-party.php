<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Wordpress\RestApiController;

//Route::middleware(['auth:sanctum', 'wordpress'])->group( function () {
//    $wordpressRestApiControllerExecute = [RestApiController::class, 'execute'];
//    Route::get('/menus/v1/menus', $wordpressRestApiControllerExecute)->name('getAllWpMenus');
//});
Route::middleware('wordpress')->group(function () {
    $wordpressRestApiControllerExecute = [RestApiController::class, 'execute'];
    Route::get('/menus/v1/menus', $wordpressRestApiControllerExecute)->name('getAllWpMenus');
    Route::get('/menus/v1/menus/{id}', $wordpressRestApiControllerExecute)->name('getWpMenu');
    Route::get('/menus/v1/locations', $wordpressRestApiControllerExecute)->name('getAllWpMenuLocations');
    Route::get('/menus/v1/locations/{id}', $wordpressRestApiControllerExecute)->name('getWpLocation');
});
