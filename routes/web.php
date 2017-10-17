<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Route::post('searchtracker','GalleryController@search');
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();


Route::resource ('/spanel', 'SettingController');
Route::resource ('/contacts', 'ContactController'); 
Route::resource ('/abouts', 'AboutController'); 
Route::resource ('/rooms', 'RoomController'); 
Route::resource ('/functionrooms','FunctionroomController');
Route::resource ('/galleries', 'GalleryController'); 
Route::resource ('/events', 'EventController'); 
Route::resource ('/offers', 'EventflController'); 
Route::resource ('/menus', 'MenuController'); 
Route::resource ('/homes', 'HomeController'); 
Route::resource ('/gallerypages', 'GalleryPageController'); 


Route::post('upload/{id}', 'GalleryController@storeGallery');
Route::post('abouts/update/{id}', 'AboutController@update');
Route::post('rooms/update/{id}', 'RoomController@update');
Route::post('rooms/updateroom/{id}', 'RoomController@updateRoom');
Route::post('functionrooms/update/{id}', 'FunctionroomController@update');
Route::post('menus/update/{id}', 'MenuController@update');
Route::post('menus/updatemenu/{id}', 'MenuController@updateMenu');
Route::post('events/update/{id}', 'EventController@update');
Route::post('events/updateevent/{id}', 'EventController@updateEvent');
Route::post('contacts/update/{id}', 'ContactController@update');
Route::post('contacts/updatecontact/{id}', 'ContactController@updateContact');
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'GalleryController@deleteUpload']);




