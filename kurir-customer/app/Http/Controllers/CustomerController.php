<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use DB;

class CustomerController extends Controller
{

  public function index()
  {
    return view('customers.index');
  }
  
  public function tracking(Request $request)
  {
      $number = $request->input('term');
	  
	  $results = DB::table('documents')
		  			  ->join('branches', 'documents.branch_id', '=', 'branches.id')
	                  ->where('no_doc', '=', $number)
	                  ->get();
     
     
      return view('customers.tracking', compact('results'));
  }

}
