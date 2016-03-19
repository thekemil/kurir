@extends('layouts.app')

@section('content')
<div class="row">
 <h3 class="page-header">Edit Transaksi Customer Dokumen
  <small>data transaksi customer dokumen</small>
</h3>
<div class="col-md-4">
   {!! Form::model($document_header,['method' => 'PATCH','route'=>['admin.document.header.update',$document_header->id]]) !!}
  <div class="form-group">
    {!! Form::label('customer_id', 'Nama Customer:') !!}
    {!! Form::text('customer',$customer->name,['id'=>'customer', 'class'=>'form-control','placeholder'=>'Input nama atau kode customer','required'=>'true']) !!}
    {!! Form::hidden('customer_id',$customer->id,['id'=>'customer_id', 'class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('date_input', 'Tanggal:') !!}
    {!! Form::text('date_input',null,['class'=>'form-control','id'=>'date-input','required'=>'true']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('invoice_delivery', 'Invoice Pengiriman:') !!}
    {!! Form::text('invoice_delivery',null,['class'=>'form-control','required'=>'true']) !!}
  </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        {!! Form::label('status_inv_delivery', 'Status Invoice Pengiriman:') !!}
        {!! Form::select('status_inv_delivery', [
				'pending' => 'Pending',
				'received' => 'Diterima'],
         null, ['class'=>'form-control']
				) !!}
    </div>
    <div class="form-group">
      {!! Form::label('date_inv_delivery', 'Tanggal Diterima Invoice Pengiriman:') !!}
      {!! Form::text('date_inv_delivery',null,['class'=>'form-control','id'=>'date-r-inv','required'=>'true']) !!}
    </div>
</div>
</div>
<div class="row">
<div class="col-md-4 pull-right">
  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-success form-control']) !!}
  </div>
</div>
{!! Form::close() !!}
</div>
<script>
  $(document).ready(function() {
	 
	  
	  date_order = '{{ $document_header->date_input}}'
	  split_order = date_order.split('-');
	  date = split_order[2];
	  month = split_order[1];
	  year = split_order[0];
	  $('#date-input').val(date+'/'+month+'/'+year);
	  
	  date_order1 = '{{ $document_header->date_inv_delivery}}'
	  split_order1 = date_order1.split('-');
	  date = split_order1[2];
	  month = split_order1[1];
	  year = split_order1[0];
	  $('#date-r-inv').val(date+'/'+month+'/'+year);
	  
	  
	  $('#date-input').datepicker({
	    format: "dd/mm/yyyy",
		orientation: "bottom right",
	    language: "id"
	  });
	  
	  $('#date-r-inv').datepicker({
	    format: "dd/mm/yyyy",
		orientation: "bottom right",
	    language: "id"
	  });
	  
    autocomplete_customer();
  });

  function autocomplete_customer(){
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
    $("#customer").typeahead({
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
          url: '{!! route("admin.customer.autocomplete") !!}',
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
    $("#customer").on('typeahead:selected', function (e, code) {
      arr1.map(function(i){
        if (i.st == code){
          $("#customer_id").val(i.id);
        }
      })

      if(e.keyCode==13){
        arr1.map(function(i){
          if (i.st == code){
            $("#customer_id").val(i.id);
          }
        })
      }
    })
  }

</script>
@endsection
