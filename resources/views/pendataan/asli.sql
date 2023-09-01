@extends('layout.template')
        <!-- START FORM -->
    @section('konten')
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href='{{ url('pendataan') }}' class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4"><h2><strong>CETAK DATA</strong></h2>
        </span>
        </a>

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title>DataTables example - DataTables date range filter</title>
        <link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
        <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=8f7cff5ee7757412879aedf3efbfaee01">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
        <style type="text/css" class="init">
        
        </style>
        <script type="text/javascript" src="/media/js/site.js?_=1d5abd169416a09a2b389885211721dd" data-domain="datatables.net" data-api="https://plausible.sprymedia.co.uk/api/event"></script>
        <script src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
        <script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fdatetime%2Fexamples%2Fintegration%2Fdatatables.html" async></script>
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
        <script type="text/javascript" language="javascript" src="../../../../examples/resources/demo.js"></script>
        <script type="text/javascript" class="init">
        


    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[4] );

            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#example').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>

 
    </head>

    
        
                
                            <div class="my-3 p-3 bg-body rounded shadow-sm">

                   
                                <div class="mb-3 row">
                                    <th><label for="media" class="col-sm-2 col-form-label"><strong>Jam Awal            :</strong></label></th>
                                    <div class="col-sm-10">
                                        <input type="text"  name='min' id="min">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <th><label for="media" class="col-sm-2 col-form-label"><strong>Jam Akhir            :</strong></label></th>
                                    <div class="col-sm-10">
                                        <input type="text"  name='max' id="max">
                                    </div>
                                </div>
           
                        </table>
                        <table id="example" class="display nowrap" style="width:100%">
                            <table class="table table-striped">

                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-1">Tanggal</th>
                                <th class="col-md-1">Jam Awal</th>
                                <th class="col-md-1">Jam Akhir</th>
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
                                <td>{{ $item->jam1}}</td>
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

     {{--       </div>
            <div class="fw-footer">
                <div class="skew"></div>
                <div class="skew-bg"></div>
                
            </div>
        </body>
        </html>
            @endsection 
            <!-- AKHIR DATA -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
                <!-- AKHIR DATA -->
    <script type="text/javascript" src="/media/js/site.js?_=1d5abd169416a09a2b389885211721dd" data-domain="datatables.net" data-api="https://plausible.sprymedia.co.uk/api/event"></script>
        <script src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
        <script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fdatetime%2Fexamples%2Fintegration%2Fdatatables.html" async></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" class="init">
        


        var minDate, maxDate;
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[4] );
        
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
        
        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });
        
            // DataTables initialisation
            var table = $('#example').DataTable();
        
            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        });
        </script>

        --}}
        
                            <tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Jam Awal</th>
								<th>Jam Akhir</th>
								<th>Media</th>
								<th>Untuk</th>
                                <th>Dari</th>
                                <th>Materi/Pesan</th>
                        </tr>
                        @extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url ('pendataan') }}' method='post'>
    @csrf
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
<a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
<span class="fs-4"><h2><strong>PENDATAAN PELAYANAN INFORMASI</strong></h2>
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
            <label for="materi" class="col-sm-2 col-form-label"><strong>Materi/Pesan            :</strong></label></th>
            <div class="col-sm-10">
                <textarea class="form-control" name='materi' id="materi">
                
                
                
                
                
                
                            </textarea>
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

        