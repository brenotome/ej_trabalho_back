<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//animal
Route::get('/animals', 'AnimalController@list');
Route::get('/animals/{id}', 'AnimalController@show');
Route::post('/animals', 'AnimalController@create');
Route::put('/animals/{id}', 'AnimalController@update');
Route::delete('/animals/{id}', 'AnimalController@delete');
//animal fk owner
Route::post('/animals/{id}/owner', 'AnimalController@updateOwner');
Route::delete('/animals/{id}/owner', 'AnimalController@deleteOwner');
//animal fk specie
Route::post('/animals/{id}/specie', 'AnimalController@updateSpecie');
Route::delete('/animals/{id}/specie', 'AnimalController@deleteSpecie');
//animal vet
Route::get('/animals/{id}/vets', 'AnimalController@listVets');
Route::post('/animals/{id}/vet', 'AnimalController@addVet');
Route::delete('/animals/{id}/vet', 'AnimalController@deleteVet');


//vet
Route::get('/vets', 'VetController@list');
Route::get('/vets/{id}', 'VetController@show');
Route::post('/vets', 'VetController@create');
Route::put('/vets/{id}', 'VetController@update');
Route::delete('/vets/{id}', 'VetController@delete');
//vet animal
Route::get('/vets/{id}/animals', 'VetController@listAnimals');
Route::post('/vets/{id}/animal', 'VetController@addAnimal');
Route::delete('/vets/{id}/animal', 'VetController@deleteAnimal');
//vet speciality
Route::get('/vets/{id}/specialities', 'VetController@listSpecialities');
Route::post('/vets/{id}/speciality', 'VetController@addSpeciality');
Route::delete('/vets/{id}/speciality', 'VetController@deleteSpeciality');



//owner
Route::get('/owners', 'OwnerController@list');
Route::get('/owners/{id}', 'OwnerController@show');
Route::post('/owners', 'OwnerController@create');
Route::put('/owners/{id}', 'OwnerController@update');
Route::delete('/owners/{id}', 'OwnerController@delete');
//fk owner animals
Route::get('/owners/{id}/animals', 'OwnerController@listAnimals');


//speciality
Route::get('/specialities', 'SpecialityController@list');
Route::get('/specialities/{id}', 'SpecialityController@show');
Route::post('/specialities', 'SpecialityController@create');
Route::put('/specialities/{id}', 'SpecialityController@update');
Route::delete('/specialities/{id}', 'SpecialityController@delete');
//speciality vets
Route::get('/specialities/{id}/vets', 'SpecialityController@listSpecialities');
Route::post('/specialities/{id}/vet', 'SpecialityController@addVet');
Route::delete('/specialities/{id}/vet', 'SpecialityController@deleteVet');


//specie
Route::get('/species', 'SpecieController@list');
Route::get('/species/{id}', 'SpecieController@show');
Route::post('/species', 'SpecieController@create');
Route::put('/species/{id}', 'SpecieController@update');
Route::delete('/species/{id}', 'SpecieController@delete');
//specie animals
Route::get('/species/{id}/animals', 'SpecieController@listAnimals');
