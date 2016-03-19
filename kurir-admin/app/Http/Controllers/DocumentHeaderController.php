<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Models\DocumentHeader;
use App\Models\Customer;

use Yajra\Datatables\Datatables;

class DocumentHeaderController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function header()
  {
    return view('documents.header');
  }

  public function document_header_data()
  {
      \DB::statement(\DB::raw('set @rownum=0'));
   
        $documents = \DB::table('document_headers')
      ->join('customers', 'customers.id', '=', 'document_headers.customer_id')
      ->select([\DB::raw('@rownum  := @rownum  + 1 AS rownum'),
        'document_headers.id as doc_head_id',
		'customers.id as cust_id',
        'customers.name as cust_name',
        'document_headers.date_input as date_input',
		'document_headers.invoice_delivery as invoice_delivery',
		'document_headers.status_inv_delivery as status_inv_delivery',
		'document_headers.date_inv_delivery as date_inv_delivery'	
      ]);
      return Datatables::of($documents)
      ->addColumn('status_inv_delivery', function ($document) {
   
  	  if ($document->status_inv_delivery == 'pending') {
  	  return '
  	  <span class="label label-danger">Pending</span>
  	  ';
  	  } else {
  	    return   '
  	      <span class="label label-success">Diterima</span>
  	      ';
  	  }
      })
      ->addColumn('action', function ($document) {
        return
        '
        <div class="col-md-3">
        <a href="./document/header/edit/'.$document->doc_head_id.'" class="inline btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        </div>
        <div class="col-md-3">
        <a href="./document/create/'.$document->doc_head_id.'" class="inline btn btn-xs btn-success"><i class="glyphicon glyphicon-list"></i> Input Dokumen</a>
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
    return view('documents.create_header');
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
		
    $date_input = $this->saved_date_format($request->input('date_input'));
	$date_invoice = $this->saved_date_format($request->input('date_inv_delivery'));
    $request->merge(array('date_input'=>$date_input, 'date_inv_delivery'=>$date_invoice));
	
    $document_header=$request->input();
    DocumentHeader::create($document_header);
    Session::flash('flash_message', 'Data transaksi customer dokumen berhasil ditambahkan!');
    
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
    $document_header=DocumentHeader::find($id);
    $customer = Customer::where('id', '=', $document_header->customer_id)->first();	
	return view('documents.edit_header',compact(['document_header','customer']));
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
    $date_input = $this->saved_date_format($request->input('date_input'));
	$date_invoice = $this->saved_date_format($request->input('date_inv_delivery'));
    $request->merge(array('date_input'=>$date_input, 'date_inv_delivery'=>$date_invoice));
	
    
    $document_headerUpdate=$request->input();
    $document_header=DocumentHeader::find($id);
    $document_header->update($document_headerUpdate);

    Session::flash('flash_message', 'Data transaksi customer dokumen berhasil diupdate!');

    return redirect('admin/document');
  }

  public function delete_customer(Request $request, $id)
  {

    $transUser=$request->input();

    $trans = DocumentHeader::find($id);

    $trans->update($transUser);

    Session::flash('flash_message', 'Data customer berhasil dihapus!');

    return redirect('admin/document_header');
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
      'customer_id' => 'required',
	  'date_input' => 'required'
    ]);
  }
  
  private function saved_date_format($date)
  {
    $date_split = explode('/',$date);

    $year = $date_split[2];
    $month = $date_split[1];
    $day = $date_split[0];

    $format = $year.'-'.$month.'-'.$day;

    return $format;
  }
}
