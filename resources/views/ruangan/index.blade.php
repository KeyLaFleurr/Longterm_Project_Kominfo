
@extends  ('ruangan.layoutt')
<!-- START DATA -->
<!--<center><h2><strong>DAFTAR PENGGUNA RUANGAN RAPAT</strong></h2></center> -->


@section('konten') 
   <!-- START FORM -->
   <div class="container py-5">

   <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4"><h2><strong>Sistem Informasi Pendataan Jenis Nyamuk</strong></h2>
        
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/sesi" class="nav-link active" aria-current="page">Log out</a></li>
      </ul>
    </span>
    </a>

    


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
<tbody>@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    </div>
@endif
  <!-- START DATA -->
  <!--Lmao Awokawokawok -->
  <!-- TOMBOL TAMBAH DATA -->            
                                                                     
         <div class="pb-3">
            <a href='{{ url('ruangan/create') }}' class="btn btn-primary">+ Tambah Data</a>
            <a href='{{ url('cetak5') }}' class="btn btn-danger">CETAK</a>
</tbody></table>
                            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">


						<thead>
							
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jabatan</th>
                                <th>Instansi</th>
                                <th>NIP</th>
                                <th>Tujuan</th>
                                <th>Jenis kelamin</th>
                                <th>No telephone</th>
                                <th>Aksi</th>
                                
    
    
    
                            </tr>
                    </div>
						</thead>
                    <tbody>
                      @php $no = 1; @endphp
                        @foreach ($data as $item)
                        <tr>
                        <td>{{$no++ }}</td>
                        <td>{{ $item->Nama }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->Jabatan }}</td>
                        <td>{{ $item->Instansi }}</td>
                        <td>{{ $item->NIP }}</td>
                        <td>{{ $item->Tujuan }}</td>
                        <td>{{ $item->Jenis_kelamin }}</td>
                        <td>{{ $item->No_Telephone }}</td>
                        <td>
                          <a href='{{ url('ruangan/'.$item->id . '/edit') }}' class="btn btn-warning btn-sm">EDIT</a>
                          <form onsubmit="return confirm('Yakin akan menghapus DATA anda')"
                          class='d-inline' action="{{ url('ruangan/'. $item->id ) }}"
                           method="post">

                           <button type="submit" name="submit" class="btn btn-danger btn-sm">DELETE</button>
                           @csrf
                           @method('DELETE')

                            
                        </td>
                    

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
    $(document).ready( function () {
    $('#example').DataTable();
} );
    </script>



   
<!-- Button Cetak -->
<!--Wkwkwkwkwkwkwk-->

<!-- Pusing Euy -->

    <!-- Akhir Dari Keseimbangan dunia -->
</html>