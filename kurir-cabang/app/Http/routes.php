<?php

use App\User;
use Illuminate\Support\Facades\Auth;
    
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/',[
  'middleware' => ['auth', 'roles'],
  'as' => 'branch.document',
  'uses' => 'DocumentController@index',
  'roles' => ['spv', 'branch']
]);


Route::group(array('prefix' => 'branch'),function() {

  Route::get('document', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document',
      'uses' => 'DocumentController@index',
      'roles' => ['spv', 'branch']
  ]);
	  
  Route::get('document/header', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.header',
      'uses' => 'DocumentController@header',
      'roles' => ['spv', 'branch']
  ]);
	  
  Route::post('document/find_header', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.find_header',
      'uses' => 'DocumentController@find_header',
      'roles' => ['spv', 'branch']
  ]);

  Route::get('documents', [
      'middleware' => ['auth', 'roles'],
      'as' => 'data.document',
      'uses' => 'DocumentController@document_data',
      'roles' => ['spv', 'branch']
  ]);

  Route::get('document/create', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.create',
      'uses' => 'DocumentController@create',
      'roles' => ['spv', 'branch']
  ]);

  Route::post('document/store', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.store',
      'uses' => 'DocumentController@store',
      'roles' => ['spv', 'branch']
  ]);

  Route::get('document/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.edit',
      'uses' => 'DocumentController@edit',
      'roles' => ['spv', 'branch']
  ]);

  Route::patch('document/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.update',
      'uses' => 'DocumentController@update',
      'roles' => ['spv', 'branch']
  ]);

  Route::patch('document/delete_customer/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'branch.document.delete',
      'uses' => 'DocumentController@delete_customer',
      'roles' => ['spv', 'Owner']
  ]);

  Route::get('document/autocomplete', [
       'middleware' => ['auth', 'roles'],
       'as' => 'branch.document.autocomplete',
       'uses' => 'DocumentController@branch_autocomplete',
       'roles' => ['spv', 'Owner']
   ]);

  //end document
});  
