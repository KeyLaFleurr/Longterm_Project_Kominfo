@extends('pengunjung.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit Ruangan</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('pengunjung.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('pengunjung.update',$pengunjung->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama :</strong>
                    <input type="text" name="Nama" value="{{ $pengunjung->Name }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan :</strong>
                    <input class="form-control" name="Jabatan" placeholder="Jabatan" value="{{ $pengunjung->Jabatan }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Instansi :</strong>
                <input type="text" name="Instansi" placeholder="Instansi" value="{{ $pengunjung->Instansi }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP :</strong>
                <input type="text" name="NIP" placeholder="NIP" value="{{ $pengunjung->NIP }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tujuan :</strong>
                <input type="text" name="Tujuan" placeholder="Tujuan" value="{{ $pengunjung->Tujuan }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis_kelamin :</strong>
                <input type="text" name="Jenis_kelamin" placeholder="Jenis_kelamin" value="{{ $pengunjung->Jenis_kelamin }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No_telephone :</strong>
                <input type="text" name="No_telephone" placeholder="No_telephone" value="{{ $pengunjung->No_telephone }}">
            </div>
        </div>
    </form>
@endsection