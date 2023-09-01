@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url ('pendataan') }}' method='post'>
    @csrf
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
<a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
<span class="fs-4"><h2><strong>Sistem Informasi Pendataan Jenis Nyamuk</strong></h2>
<a href='{{ url('pendataan') }}' class="btn btn-secondary">< KEMBALI</a>

</span>
</a>


</header> 
 @csrf
  
        </div>


    </div>
</input>
</input>
</input>
        <div class="my-3 p-3 bg-body rounded shadow-sm">


            <div class="mb-3 row">
                <label for="waktu" class="col-sm-2 col-form-label""><strong>Tanggal              :</strong></label></th>
                <div class="col-sm-10">   
               <input type="date" id="waktu" name="waktu" class="form-control" data-date-format="YYYY-MM-DD"> 
              </div>
          </div>
            <div class="mb-3 row">
              <label for="jam1" class="col-sm-2 col-form-label""><strong>Jam Mulai            :</strong></label></th>
              <div class="col-sm-10">   
             <input type="time" id="jam1" name="jam1" class="form-control"> 
            </div>
        </div>
             <div class="mb-3 row">
             <label for="jam" class="col-sm-2 col-form-label"><strong>Jam Akhir            :</strong></label></th>
             <div class="col-sm-10">
            <input type="time" id="jam" name="jam" class="form-control">
        </div>
    </div>
        <div class="mb-3 row">
            <label for="media" class="col-sm-2 col-form-label""><strong>Media            :</strong></label></th>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ Session::get('media') }}" name='media' id="media">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="untuk" class="col-sm-2 col-form-label""><strong>Untuk            :</strong></label></th>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ Session::get('Jabatan') }}" name='untuk' id="untuk">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="dari" class="col-sm-2 col-form-label""><strong>Dari            :</strong></label></th>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ Session::get('Jabatan') }}" name='dari' id="dari">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="materi" class="col-sm-2 col-form-label""><strong>Materi/Pesan            :</strong></label></th>
            <div class="col-sm-10">
                <input type="textfield" class="form-control" name='materi' id="materi">
            </div>
        </div>
        <div class="mb-3 row">
           {{-- <label for="jurusan" class="col-sm-2 col-form-label"></label> --}}
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>

        </div>
      </form>
    </div>

    <!-- AKHIR FORM -->
    @endsection
