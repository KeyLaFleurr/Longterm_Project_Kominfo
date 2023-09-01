@extends('layout.template')
@section('konten')

<form action='{{ url('ruangan/' . $data->id)}}' method='post'>

@csrf
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    <span class="fs-4"><h2><strong>EDIT PENGGUNA RUANGAN</strong></h2>
    
    </span>
    </a>
    
    
    </header> 

@method('PUT')

    
    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    </select>
        <a href='{{ url('ruangan') }}' class="btn btn-secondary">KEMBALI</a>

               <div class="mb-3 row">
    <label for="Nama" class="col-sm-2 col-form-label"><strong>Nama          :</strong></th></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Nama' value="{{ $data->Nama }}" id="Nama">
    </div>
</div>
<div class="mb-3 row">
    <th><label for="Jabatan" class="col-sm-2 col-form-label"><strong>Jabatan            :</strong></label></th>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Jabatan' value="{{ $data->Jabatan }}" id="Jabatan">
    </div>
</div>
<div class="mb-3 row">
    <label for="Instansi" class="col-sm-2 col-form-label"><strong>Instansi          :</strong></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Instansi' value="{{ $data->Instansi }}" id="Instansi">
    </div>
</div>
<div class="mb-3 row">
    <label for="NIP" class="col-sm-2 col-form-label"><strong>NIP            :</strong></label> 
    <div class="col-sm-10">
{{ $data->NIP }}
    </div>
</div>
<div class="mb-3 row">
    <label for="Tujuan" class="col-sm-2 col-form-label"><strong>Tujuan          :</strong></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Tujuan' value="{{ $data->Tujuan }}" id="Tujuan">
    </div>
</div>
<div class="mb-3 row">
    <label for="Jenis_kelamin" class="col-sm-2 col-form-label"><strong>Jenis kelamin            :</strong></label>
    <div class="col-sm-10">
        <select class="form-control" name='Jenis_kelamin' id="Jenis_kelamin">            
            <option value="">-Pilih-</option>
            <option value="Laki-Laki" {{ $data->Jenis_kelamin=='Laki-Laki'?'selected':''}}>Laki-Laki</option>
            <option value="Perempuan" {{ $data->Jenis_kelamin=='Perempuan'?'selected':''}}>Perempuan</option>
        </select>
        {{--
             <input type="text" class="form-control" name='Jenis_kelamin' value="{{ Session::get('Jenis_kelamin') }}"id="Jenis_kelamin"> --}}
    </div>
</div>  
        <div class="mb-3 row">
            <label for="No_telephone" class="col-sm-2 col-form-label"><strong>No telephone          :</strong></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='No_telephone' value="{{ $data->No_Telephone }}" id="No_telephone">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
               <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
