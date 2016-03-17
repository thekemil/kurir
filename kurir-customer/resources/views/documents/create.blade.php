@extends('layouts.app')

@section('content')
<div class="row">
 <h3 class="page-header">Tambah Dokumen
  <small>data dokumen</small>
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
</div>
<hr/>
<div class="row">
  <div class="col-md-4">

    <div class="form-group">
      {!! Form::label('no_doc', 'Nomor Dokumen:') !!}
      {!! Form::text('no_doc',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('doc_name', 'Nama Dokumen:') !!}
      {!! Form::text('doc_name',null,['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
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
</div>
<script>
  $(document).ready(function() {
    autocomplete_branch();
  });

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
@endsection
