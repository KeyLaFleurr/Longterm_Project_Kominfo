@extends ('app')
  
@section('content')
<div class="container">
    <h1 class="page-header text-center">Laravel Query Between 2 Dates</h1>
    <div class="row">
  
        <div class="col-md-8 col-md-offset-2">
            <h2>Results
                <a href="/" class="btn btn-primary pull-right">Back</a>
            </h2>
            @if(count($pendataan)>0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Post Date</th>
                        <th>Post</th>
                    </thead>
                    <tbody>
                        @foreach($pendataan as $post)
                            <tr>
                                <td>{{ date('M d, Y h:i A', strtotime($pendataan->waktu)) }}</td>
                                <td>{{ $pendataan->post }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Post from Selected Range</h3>
            @endif
        </div>
    </div>
</div>
@endsection