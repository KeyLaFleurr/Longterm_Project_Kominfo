@extends('ruangan.layoutt')

<!-- START DATA -->

@section('konten')

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"/>
        </svg>
        <span class="fs-4"><h2><strong>Sistem Informasi Pendataan JENTIK Nyamuk Jalan SURATMO</strong></h2></span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/sesi/logout" class="nav-link active" aria-current="page">Log out</a></li>
    </ul>
</header>

<head>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<style>
    .toggle.active {
        background: var(--close);
}

.toggle ion-icon {
    position: absolute;
    color: var(--white); 
    font-size: 34px;
    display: none;
}

.toggle ion-icon.open,
.toggle.active ion-icon.close {
    display: block;
}

.toggle ion-icon.close,
.toggle.active ion-icon.open {
    display: none;
}
    </style>
</head>

<div class="my-3 p-3 bg-body rounded shadow-sm" style="background-color: black;">

    <!-- Form Login -->

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"></div>
    @endif

    <!-- START DATA -->
    <!--Lmao Awokawokawok -->
    <!-- TOMBOL TAMBAH DATA -->

    <div class="pb-3">
        <a href='{{ url('pendataan/create') }}' class="btn btn-primary">+ Tambah Data</a>
        <a href='{{ url('cetak') }}' class="btn btn-danger">CETAK</a>
        <!--Akhir tombol -->

        <!--Fungsi style Utama-->
        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Tanggal</th>
                    <th class="col-md-1">Jam Mulai</th>
                    <th class="col-md-1">Jam Selesai</th>
                    <th class="col-md-2">Media</th>
                    <th class="col-md-2">Untuk</th>
                    <th class="col-md-2">Dari</th>
                    <th class="col-md-4">Materi/Pesan</th>
                    <th class="col-md-1">AKSI</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $item->waktu}}</td>
                    <td>{{ $item->jam1}}</td>
                    <td>{{ $item->jam}}</td>
                    <td>{{ $item->media}}</td>
                    <td>{{ $item->untuk}}</td>
                    <td>{{ $item->dari}}</td>
                    <td>{{ $item->materi}}</td>
                    <td>
                        <a href='{{ url('pendataan/'.$item->waktu.'/edit') }}' class="btn btn-warning btn-sm">EDIT</a>

                        <form onsubmit="return confirm('Yakin akan menghapus DATA anda')" class='d-inline'
                            action="{{ url('pendataan/'.$item->id) }}" method="post">

                            @csrf
                            @method('DELETE')
                    </td>
                    <td>
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">DELETE</button>
                        </ul>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>

        <script type="text/javascript" language="javascript"
            src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>

        {{ $data->withQueryString()->links() }}
    </div>
</div>
<!-- AKHIR DATA -->
