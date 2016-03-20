<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Branch;
use App\Models\DocumentType;
use App\Models\DocumentHeader;

use Auth;
use Yajra\Datatables\Datatables;

class DocumentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function index()
  {
    return view('documents.index');
  }
  
  public function header()
  {	
	  $result = '';
      return view('documents.header', compact('result'));
  }
  
  public function find_header(Request $request)
  {
	  $name = $request->input('term');
	  
      $data_inv = DocumentHeader::where('document_headers.invoice_delivery','=', $name)
		  ->where('document_headers.status_inv_delivery','=','pending')
      ->select('document_headers.*')
      ->first();
	  
	  if (Count($data_inv) == 0) {
		  $result = '<span class="label label-danger">Uppsss... Nomor Invoice pengiriman tidak ditemukan</span>';
		  
	  } else {
		  $request->merge(array('status_inv_delivery'=>'received','date_inv_delivery'=>date("Y-m-d H:i:s")));
		 
	      $documentUpdate=$request->input();
		 
	      $document=DocumentHeader::find($data_inv->id);
	      $document->update($documentUpdate);
		  
		  $result = '<span class="label label-success">Terima kasih, Nomor Invoice pengiriman berhasil di approve</span>';
	  }
	  

      return view('documents.header', compact('result'));
	  
  }

  public function document_data()
  {
    \DB::statement(\DB::raw('set @rownum=0'));
   
      $documents = \DB::table('documents')
    ->join('branches', 'documents.branch_id', '=', 'branches.id')
    ->select([\DB::raw('@rownum  := @rownum  + 1 AS rownum'),
      'documents.id as doc_id',
      'no_doc',
      'branches.name as branch_id',
      'doc_name as doc_name',
      'doc_name_received as doc_name_received',
      'doc_address as doc_address',
      'doc_phone as doc_phone',
	  'doc_status as doc_status'
    ])
    ->where('documents.branch_id','=',Auth::user()->branch_id);
    return Datatables::of($documents)
    ->addColumn('doc_status', function ($document) {
     
		  if ($document->doc_status == 'on_packing') {
		  return '
		  <span class="label label-danger">Packing</span>
		  ';
		  } else if ($document->doc_status == 'on_kurir') {
		    return   '
		      <span class="label label-danger">Sending</span>
		      ';
		  } else if ($document->doc_status == 'on_customer') {
		    return   '
		      <span class="label label-success">Received</span>
		      ';
		  }else if ($document->doc_status == 'failed') {
		    return   '
		      <span class="label label-danger">Gagal dikirim</span>
		      ';
		  } else {
		    return   '
		      <span class="label label-warning">Submited</span>
		      ';
		  }
    })
    ->addColumn('action', function ($document) {
      return
      '
      <div class="col-md-9">
      <a href="/branch/document/edit/'.$document->doc_id.'" class="inline btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Change</a>
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
    return view('documents.create');
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

    $document=$request->input();
    Document::create($document);
    Session::flash('flash_message', 'Data dokumen berhasil ditambahkan!');
    
    return redirect('admin/document');
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
    $document = Document::find($id);
    $branch = Branch::where('id', '=', $document->branch_id)->first();
	$doctype = DocumentType::where('id', '=', $document->document_type_id)->first();
	
	return view('documents.edit',compact(['document','branch','doctype']));
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
    $documentUpdate=$request->input();
    $document=Document::find($id);
    $document->update($documentUpdate);

    Session::flash('flash_message', 'Data dokumen berhasil diupdate!');

    return redirect('branch/document');
  }

  public function delete_document(Request $request, $id)
  {

    $transUser=$request->input();

    $trans = Document::find($id);

    $trans->update($transUser);

    Session::flash('flash_message', 'Data dokument berhasil dihapus!');

    return redirect('admin/document');
  }

  public function branch_autocomplete(Request $request)
  {
    $term = $request->term;

    $results = array();

    $queries = \DB::table('branches')
    ->where('name', 'LIKE', '%'.$term.'%')
    ->orWhere('code', 'LIKE', '%'.$term.'%')
    ->take(25)->get();

    foreach ($queries as $query)
    {
      $results[] = [ 'id' => $query->id, 'name' => $query->name.' - '.$query->address, 'code' => $query->code, 'address' => $query->address ];
    }

    return response()->json($results);
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
    
  }
}
