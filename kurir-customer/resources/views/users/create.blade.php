@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'admin.user.store']) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<h3 class="page-header">Tambah Data Pengguna Cabang
</h3>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('branch_id', 'Nama Cabang:') !!}
      {!! Form::text('branch',null,['id'=>'branch', 'class'=>'form-control','placeholder'=>'Input nama atau kode cabang']) !!}
      {!! Form::hidden('branch_id',null,['id'=>'branch_id', 'class'=>'form-control']) !!}
      {!! Form::hidden('doc_status','submited',['id'=>'doc_status', 'class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('password', 'Password:') !!}
      <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
      {!! Form::label('password_confirmation', 'Password Konfirmasi:') !!}
      <input type="password" class="form-control" name="password_confirmation">
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('name', 'Nama:') !!}
      {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('address', 'Alamat:') !!}
      {!! Form::textarea('address',null,['class'=>'form-control','size'=>'2x2']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('phone', 'Telepon:') !!}
      {!! Form::text('phone',null,['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-4 pull-right">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
  </div>
</div>


{!! Form::close() !!}
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
