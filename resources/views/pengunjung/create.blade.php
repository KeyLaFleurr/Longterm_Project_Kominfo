@extends('pengunjung.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Tambah Daftar pengguna ruangan</h2>
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
   
<form action="{{ route('pengunjung.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                <input type="text" name="Nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan :</strong>
                <input class="form-control" name="Jabatan" placeholder="Jabatan"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Instansi :</strong>
            <input type="text" name="Instansi"  class="form-control" placeholder="Instansi"> </input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>NIP :</strong>
            <input type="text" name="NIP"  class="form-control" placeholder="NIP"> </input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tujuan :</strong>
            <input type="text" name="Tujuan"  class="form-control" placeholder="Tujuan"> </input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis kelamin :</strong>
            <input type="text" name="jenis_kelamin"  class="form-control" placeholder="jenis_kelamin"> </input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>No_telephone :</strong>
            <input type="text" name="No_telephone"  class="form-control" placeholder="No_telephone"> </input>
        </div>
    </div>
   
</form>
@endsection