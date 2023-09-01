
@extends('layout.template')

@section('konten')
<div class="container py-5">

   <!-- START FORM -->
   <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4"><h2><strong>CETAK DATA SURAT MASUK</strong></h2>
    </span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/pendataan" class="nav-link active" aria-current="page">KEMBALI</a></li>
      </ul>


  </header>   
   


<head>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    


</head>
<div class="my-3 p-3 bg-body rounded shadow-sm">


<table border="0" cellspacing="5" cellpadding="5">
<tbody><tr>
    <label for="waktu" class="col-sm-2 col-form-label""><td>TANGGAL AWAL :</td>
    <td><input type="text" id="min" name="min" value="{{ Session::get('waktu') }}"></td>
</tr>
<tr>
    <label for="waktu" class="col-sm-2 col-form-label"><td>TANGGAL AKHIR  :</td>
    <td><input type="text" id="max" name="max" value="{{ Session::get('waktu') }}"></td>
</tr>
</tbody></table>

                            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">


						<thead>
							
                            <tr>
								<th>No</th>
                                <th class="col-2 text-center">TANGGAL SURAT MASUK</th>
								<th class="col-1 text-center">NOMOR BIDANG</th>
								<th>NOMOR SURAT</th>
								<th>ASAL SURAT</th>
								<th>PERIHAL</th>
                                <th>DISPOSISI KABID</th>
								<th>SEKSI</th>
                                <th>DOKUMEN</th>
                        
                                
                            
                        </tr>
                    </div>
						</thead>
                    <tbody>
                      @php $no = 1; @endphp
                        @foreach ($data3 as $item)
                        <tr>
                        <td>{{$no++ }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->nomor_bidang }}</td>
                        <td>{{ $item->nomor_surat }}</td>
                        <td>{{ $item->asal_surat }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>{{ $item->disposisi_kabid }}</td>
                        <td>{{ $item->seksi }}</td>
                        <td>{{ $item->dokumen }}</td>

                        </tr>
                        @endforeach
					</table>
                </div>
	</div>
</body>
<!-- Script awal DATE RANGE-->
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>
<!-- Mulai Pusing -->

   

    
<!-- Muncul Gejala Awal -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<!--Akhir Script -->

<!-- Kode Button -->
<script>
    $(document).ready(function() {
   $('#example').DataTable( {
       dom: 'Bfrtip',
       buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
       ]
   } );
} );
   </Script>

<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
    </script>



   
<!-- Button Cetak -->
<!--Wkwkwkwkwkwkwk-->
<script>
 
 var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
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
         format: 'YYYY/MM/DD'
     });
     maxDate = new DateTime($('#max'), {
         format: 'YYYY/MM/DD'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });
</script>
<!-- Pusing Euy -->

    <!-- Akhir Dari Keseimbangan dunia -->
</html>