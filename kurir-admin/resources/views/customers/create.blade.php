@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
  <div class="col-md-6">
    <h3 class="page-header">Tambah Customer
      <small>data customer</small>
    </h3>
        {!! Form::open(['route' => 'admin.customer.store']) !!}
        <div class="form-group">
            {!! Form::label('code', 'Kode:') !!}
            {!! Form::text('code',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Nama', 'Nama:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Alamat', 'Alamat:') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('PIC Name', 'PIC Name:') !!}
            {!! Form::text('pic_name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('PIC Telp', 'PIC Telp:') !!}
            {!! Form::text('pic_phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
  </div>
</div>
@endsection
