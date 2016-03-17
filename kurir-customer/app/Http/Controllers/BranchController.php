<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Branch;

use Yajra\Datatables\Datatables;

class BranchController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function index()
  {
    return view('branches.index');
  }

  public function branch_data()
  {
    \DB::statement(\DB::raw('set @rownum=0'));
    $branches = Branch::select([
      \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
      'id',
      'code',
      'name',
      'address',
      'phone',
      'status'
    ]);
    return Datatables::of($branches)
    ->addColumn('action', function ($branch) {
      return
      '
      <div class="col-md-9">
      <a href="./branch/edit/'.$branch->id.'" class="inline btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
      </div>
      ';
    })

    ->make(true);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('branches.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validation_rules($request);

    $branch=$request->input();
    Branch::create($branch);
    Session::flash('flash_message', 'Data cabang berhasil ditambahkan!');
    
    return redirect('admin/branch');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $branch=Branch::find($id);
    return view('branches.edit',compact('branch'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $branchUpdate=$request->input();
    $branch=Branch::find($id);
    $branch->update($branchUpdate);

    Session::flash('flash_message', 'Data cabang berhasil diupdate!');

    return redirect('admin/branch');
  }

  public function delete_branch(Request $request, $id)
  {

    $transUser=$request->input();

    $trans = Branch::find($id);

    $trans->update($transUser);

    Session::flash('flash_message', 'Data cabang berhasil dihapus!');

    return redirect('admin/branch');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }

  private function validation_rules($request)
  {
    $this->validate($request, [
      'code' => 'required|unique:branches',
      'name' => 'required|unique:branches',
      'address' => 'required',
      'phone' => 'required'
    ]);
  }
}
