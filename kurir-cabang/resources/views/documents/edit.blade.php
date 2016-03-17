@extends('layouts.app')

@section('content')
<div class="row">
 <h3 class="page-header">Edit Dokumen
  <small>data dokumen</small>
</h3>
<div class="col-md-4">
  {!! Form::model($document,['method' => 'PATCH','route'=>['branch.document.update',$document->id]]) !!}
  <div class="form-group">
    {!! Form::label('branch_id', 'Nama Cabang:') !!}
    {!! Form::text('branch',$branch->name.' - '.$branch->address,['id'=>'branch', 'class'=>'form-control','placeholder'=>'Input nama atau kode cabang','readonly'=>'true']) !!}
    {!! Form::hidden('branch_id',$branch->id,['id'=>'branch_id', 'class'=>'form-control','readonly'=>'true']) !!}
  </div>
</div>
</div>
<hr/>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('no_doc', 'Nomor Dokumen:') !!}
      {!! Form::text('no_doc',null,['class'=>'form-control','readonly'=>'true']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('doc_name', 'Nama Dokumen:') !!}
      {!! Form::text('doc_name',null,['class'=>'form-control','readonly'=>'true']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
        {!! Form::label('doc_name_received', 'Name Penerima:') !!}
        {!! Form::text('doc_name_received',null,['class'=>'form-control','readonly'=>'true']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('doc_address', 'Alamat Penerima:') !!}
      {!! Form::textarea('doc_address',null,['class'=>'form-control','size'=>'2x3','readonly'=>'true']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('doc_phone', 'Telp Penerima:') !!}
      {!! Form::text('doc_phone',null,['class'=>'form-control','readonly'=>'true']) !!}
    </div>
  </div>
  <div class="col-md-4">
   <div class="form-group">
    {!! Form::label('doc_note', 'Catatan:') !!}
    {!! Form::textarea('doc_note',null,['class'=>'form-control','size'=>'2x3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('doc_status', 'Status Pengiriman:') !!}
        {!! Form::select('doc_status', [
				'on_packing' => 'Packing',
				'on_kurir' => 'Sending',
       		 	'on_customer' => 'Received by Customer',
				'failed' => 'Gagal Dikirim'],
         null, ['class'=>'form-control']
				) !!}
    </div>
	</div>
</div>
<hr/>
<div class="row">
<div class="col-md-4 pull-right">
  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-danger form-control']) !!}
  </div>
</div>
{!! Form::close() !!}
</div>

@endsection
