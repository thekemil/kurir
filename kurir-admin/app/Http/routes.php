<?php

use App\User;
use Illuminate\Support\Facades\Auth;
    
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/',[
  'middleware' => ['auth', 'roles'],
  'as' => 'admin.branch',
  'uses' => 'BranchController@index',
  'roles' => ['Admin', 'Owner']
]);


Route::group(array('prefix' => 'admin'),function() {
	
   Route::get('dashboard', [
        'middleware' => ['auth', 'roles'],
        'as' => 'admin.dashboard',
        'uses' => 'DashboardController@index',
        'roles' => ['Admin', 'Owner']
   ]);
		
  Route::get('branch', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.branch',
      'uses' => 'BranchController@index',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('branches', [
      'middleware' => ['auth', 'roles'],
      'as' => 'data.branch',
      'uses' => 'BranchController@branch_data',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('branch/create', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.branch.create',
      'uses' => 'BranchController@create',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::post('branch/store', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.branch.store',
      'uses' => 'BranchController@store',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('branch/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.branch.edit',
      'uses' => 'BranchController@edit',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('branch/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.branch.update',
      'uses' => 'BranchController@update',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('branch/delete_customer/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.branch.delete',
      'uses' => 'BranchController@delete_customer',
      'roles' => ['Admin', 'Owner']
  ]);

// end branch

  Route::get('document', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document',
      'uses' => 'DocumentController@index',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('documents', [
      'middleware' => ['auth', 'roles'],
      'as' => 'data.document',
      'uses' => 'DocumentController@document_data',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('document/create', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.create',
      'uses' => 'DocumentController@create',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::post('document/store', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.store',
      'uses' => 'DocumentController@store',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('document/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.edit',
      'uses' => 'DocumentController@edit',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('document/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.update',
      'uses' => 'DocumentController@update',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('document/delete_customer/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.delete',
      'uses' => 'DocumentController@delete_customer',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('document/autocomplete', [
       'middleware' => ['auth', 'roles'],
       'as' => 'admin.document.autocomplete',
       'uses' => 'DocumentController@branch_autocomplete',
       'roles' => ['Admin', 'Owner']
   ]);

  //end document

  Route::get('users', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.user',
      'uses' => 'UserController@index',
      'roles' => ['Admin','Owner']
  ]);

  Route::get('user_data', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.get_user',
      'uses' => 'UserController@user_data',
      'roles' => ['Admin','Owner']
  ]);

  Route::get('user/create', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.user.create',
      'uses' => 'UserController@create',
      'roles' => ['Admin','Owner']
  ]);

  Route::post('user/store', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.user.store',
      'uses' => 'UserController@store',
      'roles' => ['Admin','Owner']
  ]);

  Route::get('user/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.user.edit',
      'uses' => 'UserController@edit',
      'roles' => ['Admin','Owner']
  ]);

  Route::patch('user/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.user.update',
      'uses' => 'UserController@update',
      'roles' => ['Admin','Owner']
  ]);

  Route::delete('user/destroy/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.user.destroy',
      'uses' => 'UserController@destroy',
      'roles' => ['Admin','Owner']
  ]);



});  
