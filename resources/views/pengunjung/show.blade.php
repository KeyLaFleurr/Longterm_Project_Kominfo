@extends('pengunjung.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Tunjukkan Ruangan</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('pengunjung.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                {{ $pengunjung->Nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan :</strong>
                {{ $pengunjung->Jabatan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Instansi :</strong>
                {{ $pengunjung->Instansi }}
            </div>
        </div>
        div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP :</strong>
                {{ $pengunjung->NIP }}
            </div>
        </div>
        div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tujuan :</strong>
                {{ $pengunjung->Tujuan }}
            </div>
        </div>
        div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis kelamin :</strong>
                {{ $pengunjung->Jenis_kelamin }}
            </div>
        </div>
        div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No telephone :</strong>
                {{ $pengunjung->No_telephone }}
            </div>
        </div>
    </div>
@endsection