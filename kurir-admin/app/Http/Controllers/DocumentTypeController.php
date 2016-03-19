<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\DocumentType;

use Yajra\Datatables\Datatables;

class DocumentTypeController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('document_types.index');
  }

  public function document_type_data()
  {
    \DB::statement(\DB::raw('set @rownum=0'));
    $document_types = DocumentType::select([
      \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
      'id',
      'name',
      'amount',
      'note'
    ]);
    return Datatables::of($document_types)
    ->addColumn('action', function ($document_type) {
      return
      '
      <div class="col-md-9">
      <a href="./document_type/edit/'.$document_type->id.'" class="inline btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
    return view('document_types.create');
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

    $document_type=$request->input();
    DocumentType::create($document_type);
    Session::flash('flash_message', 'Data tipe dokumen berhasil ditambahkan!');
    
    return redirect('admin/document_type');
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
    $document_type=DocumentType::find($id);
    return view('document_types.edit',compact('document_type'));
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
    $document_typeUpdate=$request->input();
    $document_type=DocumentType::find($id);
    $document_type->update($document_typeUpdate);

    Session::flash('flash_message', 'Data tipe dokumen berhasil diupdate!');

    return redirect('admin/document_type');
  }
  
  public function doctype_autocomplete(Request $request)
  {
    $term = $request->term;

    $results = array();

    $queries = \DB::table('document_types')
    ->where('name', 'LIKE', '%'.$term.'%')
    ->take(25)->get();

    foreach ($queries as $query)
    {
      $results[] = [ 'id' => $query->id, 'name' => $query->name ];
    }

    return response()->json($results);
  }

  public function delete_customer(Request $request, $id)
  {

    $transUser=$request->input();

    $trans = DocumentType::find($id);

    $trans->update($transUser);

    Session::flash('flash_message', 'Data customer berhasil dihapus!');

    return redirect('admin/document_type');
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
      'name' => 'required|unique:document_types'
    ]);
  }
}
