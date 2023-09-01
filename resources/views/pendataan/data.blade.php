@extends('layout.template')
       <!-- START FORM -->
@section('konten')


<form action='{{ url('pendataan/cetak1')}}' method='put'>
    @csrf
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4"><h3><strong><CENTER>DATA</CENTER></strong></h3>
        <span class="fs-4"><h1><CENTER>Sistem Informasi Pendataan Jenis Nyamuk</CENTER></h1>

    </span>
    </a>

   <!-- <ul class="nav nav-pills">
        <a href='{{ url('pendataan') }}' class="btn btn-success">Kembali</a>
   -->
    </ul>


  </header> 


    <!-- Form Login -->

    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    </div>
@endif
  <!-- START DATA -->

        <!-- FORM PENCARIAN -->
          
    

                <!--<button type="button" class="btn btn-primary" data-toggle="model" data-target="#mymodel">
                </button>-->   


                    <?php
          if(isset($_POST['filter_tgl'])){
            $mulai = $_POST['tgl_mulai'];
            $selesai = $_POST['tgl_selesai'];
          }
          
          ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Tanggal</th>
                            <th class="col-md-1">Pukul</th>
                            <th class="col-md-2">Media</th>
                            <th class="col-md-2">Untuk</th>
                            <th class="col-md-2">Dari</th>
                            <th class="col-md-4">Materi/Pesan</th>  




                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{ $item->waktu}}</td>
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
                {{ $data->links() }}
           {{--     <a href='{{ route('create') }}' class="btn btn-primary">+ Tambah Data</a> --}}

          </div>
          @endsection 
          <!-- AKHIR DATA -->
    