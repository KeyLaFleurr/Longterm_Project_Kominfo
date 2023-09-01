
@extends  ('ruangan.layoutt')
<!-- START DATA -->
<!--<center><h2><strong>DAFTAR PENGGUNA RUANGAN RAPAT</strong></h2></center> -->


@section('konten')  
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4"><h2><strong>Daftar pengguna ruangan rapat</strong></h2>
    </span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/sesi/logout" class="nav-link active" aria-current="page">Log out</a></li>
      </ul>


  </header>   

        <div class="my-3 p-3 bg-body rounded shadow-sm">


            <!-- Form Login -->

            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            </div>
        @endif
        
    
                <!-- FORM PENCARIAN -->

                <div class="pb-3">
                  <form class="d-flex" action="{{ url('ruangan') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
               <div class="pb-3">
                  <a href='{{ url('ruangan/create') }}' class="btn btn-primary">+ TAMBAH DATA</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-0">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-1">Jabatan</th>
                            <th class="col-md-1">Instansi</th>
                            <th class="col-md-1">NIP</th>
                            <th class="col-md-1">Tujuan</th>
                            <th class="col-md-1">Jenis kelamin</th>
                            <th class="col-md-1">No telephone</th>
                            



                        </tr>
                    </thead>
                    <tbody>

    <?php $i = $data->firstItem() ?>

@foreach ($data as $item)

    
<tr>
    <td>{{ $i }}</td>
    <td>{{ $item->Nama }}</td>
    <td>{{ $item->Jabatan }}</td>
    <td>{{ $item->Instansi }}</td>
    <td>{{ $item->NIP }}</td>
    <td>{{ $item->Tujuan }}</td>
    <td>{{ $item->Jenis_kelamin }}</td>
    <td>{{ $item->No_Telephone }}</td>

    <td>
         <a href='{{ url('ruangan/'.$item->NIP.'/edit') }}' class="btn btn-warning btn-sm">EDIT</a>

         <form onsubmit="return confirm('Yakin akan menghapus DATA anda')"
          class='d-inline' action="{{ url('ruangan/'.$item->NIP) }}"
          method="post">

            @csrf
            @method('DELETE')
            <button type="submit" name="submit" class="btn btn-danger btn-sm">DELETE</button>
        </ul>
            
        </form>
         
    </td>
</tr>
<?php $i++ ?>
@endforeach
                 
                    </tbody>
                </table>
                
                {{ $data->withQueryString()->links() }}
            </div>
             <!-- AKHIR DATA --> 
               
          @endsection

          @extends('ruangan.layoutt')

 @section('konten')
 

@if ($errors->any())

          {{--  @foreach ($errors->all() as $item)
             <li>{{ $item }}</li>
            @endforeach --}}
        </ul>
    </div>
</div>
@endif

<form action='{{ url('ruangan')}}' method='post'>
@csrf
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4"><h2><strong>Pengguna ruangan rapat</strong></h2>
        <a href='{{ url('ruangan') }}' class="btn btn-secondary">< KEMBALI</a>

    </span>
    </a>


  </header> 
<!-- <center><H3><strrong>TAMBAH DATA</strrong></H3></Center> -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- <a href='{{ url('ruangan') }}' class="btn btn-secondary">< KEMBALI</a> -->

        <div class="mb-3 row">
            
    <label for="Nama" class="col-sm-2 col-form-label"><strong>Nama          :</strong></th></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Nama' value="{{ Session::get('Nama') }}"  id="Nama">
    </div>
</div>
<div class="mb-3 row">
    <th><label for="Jabatan" class="col-sm-2 col-form-label"><strong> Jabatan            :</strong></label></th>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Jabatan' value="{{ Session::get('Jabatan') }}" id="Jabatan">
    </div>
</div>
<div class="mb-3 row">
    <label for="Instansi" class="col-sm-2 col-form-label"><strong> Instansi          :</strong></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Instansi' value="{{ Session::get('Instansi') }}" id="Instansi">
    </div>
</div>
<div class="mb-3 row">
    <label for="NIP" class="col-sm-2 col-form-label"><strong>NIP            :</strong></label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name='NIP' value="{{ Session::get('NIP') }}" id="NIP">
    </div>
</div>
<div class="mb-3 row">
    <label for="Tujuan" class="col-sm-2 col-form-label"><strong>Tujuan          :</strong></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Tujuan' value="{{ Session::get('Tujuan') }}" id="Tujuan">
    </div>
</div>
<div class="mb-3 row">
    <label for="Jenis_kelamin" class="col-sm-2 col-form-label"><strong>Jenis kelamin            :</strong></label>
    <div class="col-sm-10">
        <select class="form-control" name="Jenis_kelamin" value="{{ Session::get('Jenis_kelamin') }} id="Jenis_kelamin">
            <option value="">-Pilih-</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        {{-- <input type="text" class="form-control" name='Jenis_kelamin' value="{{ Session::get('Jenis_kelamin') }}"id="Jenis_kelamin"> --}}
    </div>
</div>  
        <div class="mb-3 row">
            <label for="No_telephone" class="col-sm-2 col-form-label"><strong>No.telephone          :</strong></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='No_telephone' value="{{ Session::get('No_telephone') }}" id="No_telephone">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection

        
