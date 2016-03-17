<?php

use App\User;
use Illuminate\Support\Facades\Auth;
    

Route::get('/',[
  'as' => 'home.customer',
  'uses' => 'CustomerController@index'
]);
  

  Route::post('/tracking',[
    'as' => 'customer.tracking',
    'uses' => 'CustomerController@tracking'
  ]);
