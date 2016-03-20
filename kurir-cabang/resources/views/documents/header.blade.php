@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Approve Invoice Pengiriman
      <small>Cari invoice pengiriman</small>
    </h3>
    {!! Form::open(['route' => 'branch.document.find_header']) !!}
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          {!! Form::label('term', 'No Invoice Pengiriman:') !!}
          {!! Form::text('term',null,['id'=>'date-start','class'=>'form-control','required'=>'true']) !!}
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label>&nbsp;</label>
          {!! Form::submit('Cari', ['class' => 'btn btn-success form-control']) !!}
        </div>
      </div>
    {!! Form::close() !!}
  </div>
<h4>{!! $result !!}</h3>  
</div>

@stop
