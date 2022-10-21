<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyPageController;
use App\Http\Controllers\PropertyPartController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PropertyPageController::class, 'index']);
Route::get('/persons', [PersonController::class, 'persons']);
Route::get('/persons-without-properties', [PersonController::class, 'personsWithoutProperties']);
Route::post('/add-person', [PersonController::class, 'storePerson']);
Route::post('/edit-person/{id}', [PersonController::class, 'editPerson']);
Route::post('/delete-person/{id}', [PersonController::class, 'destroyPerson']);
Route::get('/properties', [PropertyController::class, 'properties']);
Route::get('/properties-without-land', [PropertyController::class, 'propertiesWithoutLand']);
Route::get('/properties/{id}', [PropertyController::class, 'showPropertiesToOnePerson']);
Route::get('/property/{id}', [PropertyController::class, 'showProperty']);
Route::post('/add-property', [PropertyController::class, 'storeProperty']);
Route::post('/edit-property/{id}', [PropertyController::class, 'editProperty']);
Route::post('/delete-property/{id}', [PropertyController::class, 'destroyProperty']);
Route::post('/add-land', [PropertyPartController::class, 'storePropertyPart']);
Route::post('/edit-land/{id}', [PropertyPartController::class, 'editPropertyPart']);
Route::post('/delete-land/{id}', [PropertyPartController::class, 'destroyPropertyPart']);
Route::post('/add-type', [PropertyPageController::class, 'storeType']);
