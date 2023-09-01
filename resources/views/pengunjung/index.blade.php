{{-- @extends('pengunjung.layout')
 
@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Ruangan</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('pengunjung.create') }}"> Pemakaian ruangan</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Instansi</th>
            <th>NIP</th>
            <th>Tujuan</th>
            <th>Jenis kelamin</th>
            <th>No telephone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pengunjung as $pengunjung)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengunjung->Nama }}</td>
            <td>{{ $pengunjung->Jabatan }}</td>
            <td>{{ $pengunjung->Instansi }}</td>
            <td>{{ $pengunjung->NIP }}</td>
            <td>{{ $pengunjung->Tujuan }}</td>
            <td>{{ $pengunjung->Jenis_kelamin }}</td>
            <td>{{ $pengunjung->No_telephone }}</td>


            <td>
                <form action="{{ route('pengunjung.destroy',$pengunjung->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pengunjung.show',$pengunjung->id) }}">Tunjukkan</a>
    
                    <a class="btn btn-primary" href="{{ route('pengunjung.edit',$pengunjung->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
        {!! $pengunjung->links() !!}
    </div>
      
@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>