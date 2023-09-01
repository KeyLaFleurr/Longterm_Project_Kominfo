
@extends('layout.template')
<!-- START FORM -->
<div class="d-flex justify-content-evenly">


  </div>
@section('konten')
<div class="container py-5">

<form action='{{ url ('pendataan') }}' method='post'>
    @csrf

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
<a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
<img src="{{ asset('k.png') }}" alt="Wawan" width="85" height="85" style="margin-right:25px;">
<span class="fs-4"><h2><strong>Pendataan Surat Masuk</strong></h2>
</span>
<a href='{{ url('pendataan') }}' class="#"></a>

</header> 
</div>
 @csrf
  
        </div>


    </div>



<head>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    


</head>

							
                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                            
                                        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">


                                            <thead>
                            
                                        <div class="mb-3 row">
                                            <label for="tanggal" class="col-sm-2 col-form-label text-center"><strong>TANGGAL SURAT MASUK              :</strong></label></th>
                                            <div class="col-sm-10">   
                                           <input type="date" id="tanggal" name="tanggal" class="form-control" data-date-format="YYYY-MM-DD"> 
                                        </div>
                                    </div>
                                        <div class="mb-3 row">
                                          <label for="nomor_bidang" class="col-sm-2 col-form-label text-center"><strong>NOMOR BIDANG            :</strong></label></th>
                                          <div class="col-sm-10">   
                                         <input type="number" id="nomor_bidang" name="nomor_bidang" class="form-control"> 
                                        </div>
                                    </div>
                                         <div class="mb-3 row">
                                         <label for="nomor_surat" class="col-sm-2 col-form-label text-center"><strong>NOMOR SURAT            :</strong></label></th>
                                         <div class="col-sm-10">
                                        <input type="text" id="nomor_surat" name="nomor_surat" class="form-control">
                                    </div>
                                </div>
                                    <div class="mb-3 row">
                                        <label for="asal_surat" class="col-sm-2 col-form-label text-center"><strong>ASAL SURAT            :</strong></label></th>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ Session::get('asal_surat') }}" name='asal_surat' id="asal_surat">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="perihal" class="col-sm-2 col-form-label text-center"><strong>PERIHAL            :</strong></label></th>
                                        <div class="col-sm-10">
                                            <input type="perihal" class="form-control"  name='perihal' id="perihal">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="disposisi_kabid" class="col-sm-2 col-form-label text-center"><strong>DISPOSISI KABID            :</strong></label></th>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ Session::get('disposisi_kabid') }}" name='disposisi_kabid' id="disposisi_kabid">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="seksi" class="col-sm-2 col-form-label text-center"><strong>SEKSI            :</strong></label></th>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ Session::get('seksi') }}" name='seksi' id="seksi">
                                            </div>
                                    </div>
                                        <div class="mb-3 row">
                                            <label for="dokumen" class="col-sm-2 col-form-label text-center"><strong>DOKUMEN            :</strong></label></th>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name='dokumen' id="dokumen">
                                            </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <div class="col-sm-6"> <!-- Setengah lebar div untuk tombol KEMBALI -->
                                            <a href='{{ url('pendataan') }}' class="btn btn-danger">KEMBALI</a>
                                        </div>
                                        <div class="col-sm-6"> <!-- Setengah lebar div untuk tombol SIMPAN -->
                                            <button type="submit" class="btn btn-primary float-right" name="submit">SIMPAN</button>
                                        </div>
                                    </div>
                                    
                                </thead>
                         
                                  </form>
                                </div>
                            
                                <!-- AKHIR FORM -->
                                @endsection
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