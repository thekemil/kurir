@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
   	   <div id="series_chart_div" style="width: 1080px; height: 500px;"></div>
	</div>
	<br/>
	<div class="col-md-12">
		<table class="table table-bordered"> <caption>Data Pengiriman Setiap Wilayah.</caption> <thead> <tr> <th>#</th> <th>Nama Cabang</th> <th>Nama Wilayah</th> <th>Jumlah</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Cabang02</td> <td>RancaBolang</td> <td>1000</td> </tr> <tr> <th scope="row">2</th> <td>Cabang03</td> <td>Buah Batu</td> <td>1400</td> </tr> <tr> <th scope="row">3</th> <td>Cabang01</td> <td>Ciwastra</td> <td>1200</td> </tr> </tbody> </table>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
        ['CAN',    80.66,              1.67,      'Ciwastra',  33739900],
        ['DEU',    79.84,              1.36,      'Buah Batu',         81902307],
        ['DNK',    78.6,               1.84,      'Buah Batu',         5523095],
        ['EGY',    72.73,              2.78,      'Middle East',    79716203],
        ['GBR',    80.05,              2,         'Ciwastra',         61801570],
        ['IRN',    72.49,              1.7,       'Ciganitri',    73137148],
        ['IRQ',    68.09,              4.77,      'Ciganitri',    31090763],
        ['ISR',    81.55,              2.96,      'Ciganitri',    7485600],
        ['RUS',    68.6,               1.54,      'Buah Batu',         141850000],
        ['USA',    78.09,              2.05,      'Ranca Bolang',  307007000]
      ]);

      var options = {
        title: 'Statistic Pengiriman Kurir setiap Wilayah ' +
               'Pada periode Januari - Desember (2016)',
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>

@endpush
