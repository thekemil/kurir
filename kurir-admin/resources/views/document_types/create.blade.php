@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
  <div class="col-md-6">
    <h3 class="page-header">Tambah Tipe Dokumen
      <small>data tipe dokumen</small>
    </h3>
        {!! Form::open(['route' => 'admin.document_type.store']) !!}
        <div class="form-group">
            {!! Form::label('Nama', 'Nama:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Amount', 'Price:') !!}
            {!! Form::text('amount',null,['class'=>'form-control']) !!}
        </div>
       
        <div class="form-group">
            {!! Form::label('Note', 'Note:') !!}
            {!! Form::textarea('note',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
  </div>
</div>
@endsection
