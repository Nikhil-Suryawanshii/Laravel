<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCommonController\ApiPeopleController;
use App\Http\Controllers\PeopleController;

// Route::get('api/people', [ApiPeopleController::class, 'index']);      // READ
// Route::post('api/people', [ApiPeopleController::class, 'store']);     // CREATE
// Route::get('api/people/{id}', [ApiPeopleController::class, 'show']);  // READ single
// Route::put('api/people/{id}', [ApiPeopleController::class, 'update']); // UPDATE
// Route::delete('api/people/{id}', [ApiPeopleController::class, 'destroy']); // DELETE


Route::get('api/people', [PeopleController::class, 'index'])->name('people.index');
Route::get('api/people/create', [PeopleController::class, 'create'])->name('people.create');
Route::post('api/people/store', [PeopleController::class, 'store'])->name('people.store');
Route::get('api/people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::post('api/people/update/{id}', [PeopleController::class, 'update'])->name('people.update');
Route::delete('api/people/delete/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');
Route::get('api/get-states/{countryId}', [PeopleController::class, 'getStates']);
Route::get('api/get-cities/{stateId}', [PeopleController::class, 'getCities']);
