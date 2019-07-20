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


//owner
Route::get('/owners', 'OwnerController@list');
Route::get('/owners/{id}', 'OwnerController@show');
Route::post('/owners', 'OwnerController@create');
Route::put('/owners/{id}', 'OwnerController@update');
Route::delete('/owners/{id}', 'OwnerController@delete');
//fk owner animals
Route::get('/owners/{id}/animals', 'OwnerController@listAnimals');

