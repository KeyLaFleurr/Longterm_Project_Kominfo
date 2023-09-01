@extends('layout.template')
@section('konten')

<form action='{{ url('pendataan/' . $data->id)}}' method='post'>

@csrf
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    <span class="fs-4"><h2><strong>EDIT PENDATAAN NYAMUK</strong></h2>
    <a href='{{ url('pendataan') }}' class="btn btn-secondary">< KEMBALI</a>
    
    </span>
    </a>
    
    
    </header> 

@method('PUT')

    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    </select>

        

 <div class="mb-3 row">
    <label for="waktu" class="col-sm-2 col-form-label"><strong>Tanggal          :</strong></th></label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name='waktu' value="{{ $data->waktu }}" id="waktu">
    </div>
</div>
<div class="mb-3 row">
    <label for="jam1" class="col-sm-2 col-form-label"><strong>Waktu Mulai          :</strong></th></label>
    <div class="col-sm-10">
        <input type="time" class="form-control" name='jam1' value="{{ $data->jam1 }}" id="jam1">
    </div>
</div> 
<div class="mb-3 row">
    <label for="jam" class="col-sm-2 col-form-label"><strong>Waktu Akhir          :</strong></th></label>
    <div class="col-sm-10">
        <input type="time" class="form-control" name='jam' value="{{ $data->jam }}" id="jam">
    </div>
</div>
<div class="mb-3 row">
    <th><label for="media" class="col-sm-2 col-form-label"><strong>Media            :</strong></label></th>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='media' value="{{ $data->media }}" id="media">
    </div>
</div>
<div class="mb-3 row">
    <label for="untuk" class="col-sm-2 col-form-label"><strong>Untuk          :</strong></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='untuk' value="{{ $data->untuk }}" id="untuk">
    </div>
</div>
<div class="mb-3 row">
    <label for="dari" class="col-sm-2 col-form-label"><strong>Dari          :</strong></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='dari' value="{{ $data->dari }}" id="dari">
    </div>
</div>
<div class="mb-3 row">
    <label for="materi" class="col-sm-2 col-form-label"><strong>Materi/pesan          :</strong></label>
    <div class="col-sm-10">
        <textarea class="form-control" name='materi' value="{{ $data->materi }}" id="materi">
        </textarea>
    </div>
</div>
        <div class="mb-3 row">
            <div class="col-sm-10">
               <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>           

    </div>
</form>
@endsection