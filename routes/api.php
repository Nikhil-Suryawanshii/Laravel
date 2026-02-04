<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCommonController\ApiPeopleController;
use App\Http\Controllers\PeopleController;

// Route::get('api/people', [ApiPeopleController::class, 'index']);      // READ
// Route::post('api/people', [ApiPeopleController::class, 'store']);     // CREATE
// Route::get('api/people/{id}', [ApiPeopleController::class, 'show']);  // READ single
// Route::put('api/people/{id}', [ApiPeopleController::class, 'update']); // UPDATE
// Route::delete('api/people/{id}', [ApiPeopleController::class, 'destroy']); // DELETE


Route::get('people', [PeopleController::class, 'index'])->name('people.index');
Route::get('people/create', [PeopleController::class, 'create'])->name('people.create');
Route::post('people/store', [PeopleController::class, 'store'])->name('people.store');
Route::get('people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::post('people/update/{id}', [PeopleController::class, 'update'])->name('people.update');
Route::delete('people/delete/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');
Route::get('get-states/{countryId}', [PeopleController::class, 'getStates']);
Route::get('get-cities/{stateId}', [PeopleController::class, 'getCities']);
