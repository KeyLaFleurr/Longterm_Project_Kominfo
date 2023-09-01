@extends('layout.template')
       <!-- START FORM -->
@section('konten')


	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>DataTables example - DataTables date range filter</title>
	<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=8f7cff5ee7757412879aedf3efbfaee01">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=1d5abd169416a09a2b389885211721dd" data-domain="datatables.net" data-api="https://plausible.sprymedia.co.uk/api/event"></script>
	<script src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fdatetime%2Fexamples%2Fintegration%2Fdatatables.html" async></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
	<script type="text/javascript" language="javascript" src="../../../../examples/resources/demo.js"></script>
     <script type="text/javascript" class="init">
	


    var minDate, maxDate;
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[4] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
    
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
    
        // DataTables initialisation
        var table = $('#example').DataTable();
    
        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
    </script>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href='{{ url('pendataan') }}' class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4"><h2><strong>CETAK DATA</strong></h2>
        </span>
        </a>
    </head>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="row mt-4">
                <div class="col">
                    <!--FIELD TANGGAL-->
                        <form method="post" class="form-inline">
                            <strong><H8>AWAL</h8></strong>
                            <input type="text" name="tgl_mulai" id="min" class="form-control">
                            <br>
                            <h8><strong>AKHIR</h8></strong>
                            <input type="text" name="tgl_selesai" id="max" class="form-control ml-3">
                        </br>
                            <button type="submit" name="filter_tgl" id="example" class="btn btn-info ml-3">FILTER</button>
                           <!-- <a href='{{ url('pendataan/data') }}' class="btn btn-danger">Rukkhadevata</a> -->
                            <a href="pendataan/cetak1">
                                <button onClick="window.print();" class="btn btn-danger">PRINT</button>
                                <button id="btnExport" class="btn btn-danger">
                                    Export to PDF
                                  </button>
                                </a></code>
            </div>         
</div>
	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">

<form action='{{ url('pendataan/cetak1')}}' method='put'>
 @csrf

   
   <!-- <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="#" aria-current="">pendataan permohonan informasi</a></li>
      </ul> -->
   <!-- <ul class="nav nav-pills">
        <a href='{{ url('pendataan') }}' class="btn btn-success">Kembali</a>
   -->

   
    </ul>


  </header> 
  
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="row mt-4">
        <div class="col">                
                       

                      
  <!-- START DATA -->

        <!-- FORM PENCARIAN -->
          
    

                <!--<button type="button" class="btn btn-primary" data-toggle="model" data-target="#mymodel">
                </button>-->   

                    
                </tbody>
                <table id="example" class="display nowrap" style="width:100%">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Tanggal</th>
                            <th class="col-md-1">Jam Awal</th>
                            <th class="col-md-1">Jam Akhir</th>
                            <th class="col-md-2">Media</th>
                            <th class="col-md-2">Untuk</th>
                            <th class="col-md-2">Dari</th>
                            <th class="col-md-4">Materi/Pesan</th>  




                        </tr>
                    </thead>
                    
                    @php $no = 1; @endphp
                    @foreach ($data as $item)
                        
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{ $item->waktu}}</td>
                        <td>{{ $item->jam1}}</td>
                        <td>{{ $item->jam}}</td>
                        <td>{{ $item->media}}</td>
                        <td>{{ $item->untuk}}</td>
                        <td>{{ $item->dari}}</td>
                        <td>{{ $item->materi}}</td>
                       @endforeach
                    </tr>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{ $item->waktu}}</td>
                            <td>{{ $item->jam1}}</td>
                            <td>{{ $item->jam}}</td>
                            <td>{{ $item->media}}</td>
                            <td>{{ $item->untuk}}</td>
                            <td>{{ $item->dari}}</td>
                            <td>{{ $item->materi}}</td>
                            <td>
                                
                           </td>
                       </tr>
                       <?php $i++ ?>
                       @endforeach
                                        
                                           </tbody>
                                       </table>
                                       {{ $data->withQueryString()->links() }}
                                       {{--     <a href='{{ route('create') }}' class="btn btn-primary">+ Tambah Data</a> --}}

          </div>
          @endsection 
          <!-- AKHIR DATA -->
          <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  
            <!-- AKHIR DATA -->
           