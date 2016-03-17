<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Branch;
use App\Models\User;


use Yajra\Datatables\Datatables;

class DashboardController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function index()
  {
    return view('dashboard.index');
  }

}
