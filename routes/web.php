<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PeopleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/delete/{id}', [StudentController::class, 'delete'])->name('students.destroy');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/get-states/{countryId}', [CustomerController::class, 'getStates']);
Route::get('/get-cities/{stateId}', [CustomerController::class, 'getCities']);

Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
Route::post('/countries/store', [CountryController::class, 'store'])->name('countries.store');
Route::get('/countries/edit/{id}', [CountryController::class, 'edit'])->name('countries.edit');
Route::post('/countries/update/{id}', [CountryController::class, 'update'])->name('countries.update');
Route::get('/countries/delete/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

Route::get('/states', [StateController::class, 'index'])->name('states.index');
Route::get('/states/create', [StateController::class, 'create'])->name('states.create');
Route::post('/states/store', [StateController::class, 'store'])->name('states.store');
Route::get('/states/edit/{id}', [StateController::class, 'edit'])->name('states.edit');
Route::post('/states/update/{id}', [StateController::class, 'update'])->name('states.update');
Route::get('/states/delete/{id}', [StateController::class, 'destroy'])->name('states.destroy');

Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities/store', [CityController::class, 'store'])->name('cities.store');
Route::get('/cities/edit/{id}', [CityController::class, 'edit'])->name('cities.edit');
Route::post('/cities/update/{id}', [CityController::class, 'update'])->name('cities.update');
Route::get('/cities/delete/{id}', [CityController::class, 'destroy'])->name('cities.destroy');

Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
Route::get('/people/create', [PeopleController::class, 'create'])->name('people.create');
Route::post('/people/store', [PeopleController::class, 'store'])->name('people.store');
Route::get('/people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::post('/people/update/{id}', [PeopleController::class, 'update'])->name('people.update');
Route::delete('/people/delete/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');
Route::get('/get-states/{countryId}', [PeopleController::class, 'getStates']);
Route::get('/get-cities/{stateId}', [PeopleController::class, 'getCities']);
