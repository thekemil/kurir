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

  Route::get('documentss/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'data.document.create',
      'uses' => 'DocumentController@document_data',
      'roles' => ['Admin', 'Owner']
  ]);
	  
  Route::get('document', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.header',
      'uses' => 'DocumentHeaderController@header',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('documents', [
      'middleware' => ['auth', 'roles'],
      'as' => 'data.document.header',
      'uses' => 'DocumentHeaderController@document_header_data',
      'roles' => ['Admin', 'Owner']
  ]);
		  
		  

  Route::get('document/create/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.create',
      'uses' => 'DocumentController@create',
      'roles' => ['Admin', 'Owner']
  ]);
	  
  Route::get('document/header/create', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.header.create',
      'uses' => 'DocumentHeaderController@create',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::post('document/store', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.store',
      'uses' => 'DocumentController@store',
      'roles' => ['Admin', 'Owner']
  ]);
	  Route::post('document/header/store', [
	      'middleware' => ['auth', 'roles'],
	      'as' => 'admin.document.header.store',
	      'uses' => 'DocumentHeaderController@store',
	      'roles' => ['Admin', 'Owner']
	  ]);

  Route::get('document/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.edit',
      'uses' => 'DocumentController@edit',
      'roles' => ['Admin', 'Owner']
  ]);
  
  Route::get('document/header/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.header.edit',
      'uses' => 'DocumentHeaderController@edit',
      'roles' => ['Admin', 'Owner']
  ]);
		  
  Route::get('document/create/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.detail.create',
      'uses' => 'DocumentController@create',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('document/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.update',
      'uses' => 'DocumentController@update',
      'roles' => ['Admin', 'Owner']
  ]);
	  
  Route::patch('document/header/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.document.header.update',
      'uses' => 'DocumentHeaderController@update',
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
	   
   Route::get('customer/autocomplete', [
        'middleware' => ['auth', 'roles'],
        'as' => 'admin.customer.autocomplete',
        'uses' => 'CustomerController@customer_autocomplete',
        'roles' => ['Admin', 'Owner']
    ]);
			
   Route::get('document_type/autocomplete', [
        'middleware' => ['auth', 'roles'],
        'as' => 'admin.document_type.autocomplete',
        'uses' => 'DocumentTypeController@doctype_autocomplete',
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
	  
  #end pengguna
  
  Route::get('customer', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.customer',
      'uses' => 'CustomerController@index',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('customers', [
      'middleware' => ['auth', 'roles'],
      'as' => 'data.customer',
      'uses' => 'CustomerController@customer_data',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('customer/create', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.customer.create',
      'uses' => 'CustomerController@create',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::post('customer/store', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.customer.store',
      'uses' => 'CustomerController@store',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::get('customer/edit/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.customer.edit',
      'uses' => 'CustomerController@edit',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('customer/update/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.customer.update',
      'uses' => 'CustomerController@update',
      'roles' => ['Admin', 'Owner']
  ]);

  Route::patch('customer/delete_customer/{id}', [
      'middleware' => ['auth', 'roles'],
      'as' => 'admin.customer.delete',
      'uses' => 'CustomerController@delete_customer',
      'roles' => ['Admin', 'Owner']
  ]);

// end customer


	Route::get('document_type', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'admin.document_type',
	    'uses' => 'DocumentTypeController@index',
	    'roles' => ['Admin', 'Owner']
	]);

	Route::get('document_types', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'data.document_type',
	    'uses' => 'DocumentTypeController@document_type_data',
	    'roles' => ['Admin', 'Owner']
	]);

	Route::get('document_type/create', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'admin.document_type.create',
	    'uses' => 'DocumentTypeController@create',
	    'roles' => ['Admin', 'Owner']
	]);

	Route::post('document_type/store', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'admin.document_type.store',
	    'uses' => 'DocumentTypeController@store',
	    'roles' => ['Admin', 'Owner']
	]);

	Route::get('document_type/edit/{id}', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'admin.document_type.edit',
	    'uses' => 'DocumentTypeController@edit',
	    'roles' => ['Admin', 'Owner']
	]);

	Route::patch('document_type/update/{id}', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'admin.document_type.update',
	    'uses' => 'DocumentTypeController@update',
	    'roles' => ['Admin', 'Owner']
	]);

	Route::patch('document_type/delete_customer/{id}', [
	    'middleware' => ['auth', 'roles'],
	    'as' => 'admin.document_type.delete',
	    'uses' => 'DocumentTypeController@delete_customer',
	    'roles' => ['Admin', 'Owner']
	]);
	
//end document type



});  
