@extends('layout.template')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div id="example"></div>
            </div>
        </div>
    </div>
</div>
<div>
    <script src="https://code.highcharts.com/highchart.js"></script>
    <script type="text/javascript">
        var pendataan = <?php echo json_encode($waktu) ?>;
        var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('example', {
        title : {
            text : 'Grafik bulanan'
        },
        xAxis : {
           categories : bulan
        },
        yAxis : {
            title : {
                text : 'Grafik Bulanan'
            }
        },
        plotOption: {
            series: {
                allowPointSelect: true
            }
        },
        series: [
            {
                name: bulanan
                data: pendataan
            }
        ]
    });
@endsection