@extends('layouts.app')

@section('content')
<div class="row">
 <h3 class="page-header">Tambah Dokumen
  <small>data transaksi detail dokumen</small>
</h3>
<div class="col-md-4">
  {!! Form::open(['route' => 'admin.document.store']) !!}
  <div class="form-group">
    {!! Form::label('branch_id', 'Nama Cabang:') !!}
    {!! Form::text('branch',null,['id'=>'branch', 'class'=>'form-control','placeholder'=>'Input nama atau kode cabang']) !!}
    {!! Form::hidden('branch_id',null,['id'=>'branch_id', 'class'=>'form-control']) !!}
    {!! Form::hidden('doc_status','submited',['id'=>'doc_status', 'class'=>'form-control']) !!}
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    {!! Form::label('document_type_id', 'Tipe Dokumen:') !!}
    {!! Form::text('doctype',null,['id'=>'doctype', 'class'=>'form-control','placeholder'=>'Input nama tipe dokumen']) !!}
    {!! Form::hidden('document_type_id',null,['id'=>'document_type_id', 'class'=>'form-control']) !!}
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Nama Customer: <span class="label label-info">{{$document_by_customer->name}}</span></label><br/>
	<label>Tanggal: <span class="label label-info">{{$document_by_customer->date_input}}</span></label><br/>
	<label>Invoice Pengiriman: <span class="label label-info">{{$document_by_customer->invoice_delivery}}</span></label>
  </div>
</div>


</div>
<hr/>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('no_doc', 'Nomor Dokumen:') !!}
      {!! Form::text('no_doc',null,['class'=>'form-control']) !!}
	  
	  {!! Form::hidden('document_header_id',$id,['class'=>'form-control']) !!}
	  
    </div>
    <div class="form-group">
      {!! Form::label('doc_name', 'Nama Dokumen:') !!}
      {!! Form::text('doc_name',null,['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
        {!! Form::label('doc_name_received', 'Nama Penerima:') !!}
        {!! Form::text('doc_name_received',null,['class'=>'form-control']) !!}
      </div>
    <div class="form-group">
      {!! Form::label('doc_address', 'Alamat Penerima:') !!}
      {!! Form::textarea('doc_address',null,['class'=>'form-control','size'=>'2x3']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('doc_phone', 'Telp Penerima:') !!}
      {!! Form::text('doc_phone',null,['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
   <div class="form-group">
    {!! Form::label('doc_note', 'Catatan:') !!}
    {!! Form::textarea('doc_note',null,['class'=>'form-control','size'=>'2x3']) !!}
    </div>
</div>
</div>
<hr/>
<div class="row">
<div class="col-md-4 pull-right">
  <div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}
  </div>
</div>
{!! Form::close() !!}
    <table class="table table-striped table-bordered table-hover" id="docs-table">
      <thead>
        <tr class="bg-default">
          <th>No</th>
          <th>No Dokumen</th>
          <th>Nama Cabang</th>
          <th>Nama Dokumen</th>
          <th>Nama Penerima</th>
		  <th>Alamat Penerima</th>
          <th>Telp Penerima</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
</div>
@stop



@push('scripts')
<script>
$(document).ready(function() {
    $('#docs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/documentss/'+{{$id}},
        columns: [
            { data: 'rownum', name: 'rownum', searchable: false},
            { data: 'no_doc', name: 'no_doc' },
            { data: 'branch_name', name: 'branches.name' },
            { data: 'doc_name', name: 'doc_name' },
            { data: 'doc_name_received', name: 'doc_name_received' },
			{ data: 'doc_address', name: 'doc_address' },
            { data: 'doc_phone', name: 'doc_phone' },
            { data: 'doc_status', name: 'doc_status', searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

<script>
  $(document).ready(function() {
    autocomplete_branch();
    autocomplete_doc_type();
	
	
  });
  function autocomplete_doc_type(){
    var substringMatcher = function(strs) {
      return function findMatches(q, cb) {
        var matches, substringRegex;
        matches = [];
        substrRegex = new RegExp(q, 'i');
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });
        cb(matches);
      };
    };

    var arr1 = [];
    $("#doctype").typeahead({
      hint: false,
      highlight: true,
      minLength: 2

    },
    {
      limit: 50,
      async: true,
      templates: {notFound:"Data not found"},
      source: function (query, processSync, processAsync) {
        return $.ajax({
          url: '{!! route("admin.document_type.autocomplete") !!}',
          type: 'GET',
          data: {"term": query},
          dataType: 'json',
          success: function (json) {
            var _tmp_arr = [];
            json.map(function(item){
              _tmp_arr.push(item.name)
              arr1.push({id: item.id, st: item.name, st_a: item.code})
            })
            return processAsync(_tmp_arr);
          }
        });
      }
    })
    $("#doctype").on('typeahead:selected', function (e, code) {
      arr1.map(function(i){
        if (i.st == code){
          $("#document_type_id").val(i.id);
        }
      })

      if(e.keyCode==13){
        arr1.map(function(i){
          if (i.st == code){
            $("#document_type_id").val(i.id);
          }
        })
      }
    })
  }

  function autocomplete_branch(){
    var substringMatcher = function(strs) {
      return function findMatches(q, cb) {
        var matches, substringRegex;
        matches = [];
        substrRegex = new RegExp(q, 'i');
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });
        cb(matches);
      };
    };

    var arr1 = [];
    $("#branch").typeahead({
      hint: false,
      highlight: true,
      minLength: 2

    },
    {
      limit: 50,
      async: true,
      templates: {notFound:"Data not found"},
      source: function (query, processSync, processAsync) {
        return $.ajax({
          url: '{!! route("admin.document.autocomplete") !!}',
          type: 'GET',
          data: {"term": query},
          dataType: 'json',
          success: function (json) {
            var _tmp_arr = [];
            json.map(function(item){
              _tmp_arr.push(item.name)
              arr1.push({id: item.id, st: item.name, st_a: item.code})
            })
            return processAsync(_tmp_arr);
          }
        });
      }
    })
    $("#branch").on('typeahead:selected', function (e, code) {
      arr1.map(function(i){
        if (i.st == code){
          $("#branch_id").val(i.id);
        }
      })

      if(e.keyCode==13){
        arr1.map(function(i){
          if (i.st == code){
            $("#branch_id").val(i.id);
          }
        })
      }
    })
  }
</script>
  

  @endpush
  


