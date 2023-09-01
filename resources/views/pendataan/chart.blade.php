<!DOCTYPE html>
@extends('layout.template')

@section('konten')
<html>
  <head>
    

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <meta charset=utf-8/>
    <title>DataTables - JS Bin</title>
    <style>
        body {
  font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #fff;
}
</style>
  </head>
  <body>
    <div id="container" style="width:100%; height:400px;"></div>
        <div class="container py-5">

            <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
        </div>


            <thead>
                
                <tr>
                    <th>No</th>
                    <th>Jam Awal</th>
                    <th>Tanggal</th>
                    <th>Jam Akhir</th>
                    <th>Media</th>
                    <th>Untuk</th>
                    <th>Dari</th>
                    <th>Materi/Pesan</th>
                  </tr>
            </thead>
        <tbody>
          
            @php $no = 1; @endphp

            @foreach ($data59 as $item)
            <tr>
            <td>{{$no++ }}</td>
            <td>{{ $item->waktu }}</td> 
            <td>{{ $item->jam }}</td>
            <td>{{ $item->media }}</td>
            <td>{{ $item->untuk }}</td>
            <td>{{ $item->dari }}</td>
            <td>{{ $item->materi }}</td>
            <td>{{ $item->materi }}</td>
          

          </tr>
          @endforeach

     
       
      
    </div>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @php $no = 1; @endphp
    <script>
        
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Masuk Bulanan'
    },
    subtitle: {
        text: 'Average Jumlah Data'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    
    series: [{
        name: 'Jumlah Data',
        data: [ {{$item->id }}, ]
        //data: [54,54,34,67,24,25,45,23,87,65,34,65]

    }, {
        name: 'Data Maasuk',
        //data: [ {{$item->id }}, ]
        data: [ {{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id++ }},{{$item->id }} ]
        //data: [43,56,35,35,24,53,53,32,65,34,65,45]


    },{
        name: 'Data Keluar',
        data: [ {{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id++ }},{{$item->id }} ]
        //data: [ {{$item->id }}, ]


    },{
        name: 'Data',
        data: [ {{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id }},{{$item->id++ }},{{$item->id }} ]
        //data:[ {{$item->id }}, ]


    }]
});
    </script> 
  </body>
</table>
 
</html>
</tbody>