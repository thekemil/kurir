@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
  <div class="col-md-6">
    <h3 class="page-header">Tambah Cabang
      <small>data cabang</small>
    </h3>
        {!! Form::open(['route' => 'admin.branch.store']) !!}
        <div class="form-group">
            {!! Form::label('code', 'Kode Cabang:') !!}
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
            {!! Form::label('Telp', 'Telp:') !!}
            {!! Form::text('phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('note', 'Note:') !!}
            {!! Form::textarea('note',null,['class'=>'form-control','size'=>'2x2']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('status', 'Status:') !!}
          {!! Form::select('status', [
  				'active' => 'Active',
  				'non_active' => 'Non Active'], null, ['class'=>'form-control']
  				) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
  </div>
</div>
@endsection
