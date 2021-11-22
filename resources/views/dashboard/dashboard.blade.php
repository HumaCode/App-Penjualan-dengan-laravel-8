{{-- @dd($label); --}}
{{-- panggil layoutnya --}}
@extends('layouts.main')

{{-- buat section nya --}}
@section('container')
    <h4>Dashboard</h4>

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="header">
                    <span class="title">Selamat Datang User</span>
                </div>
                <hr>
                <div class="content">
                
                    <div id="container" style="width: 100%"> 
                        <canvas id="canvas"></canvas> 
                    </div> 


                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript"> 
        var ctx = document.getElementById('canvas').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: {!! $label !!},
                    datasets: [{
                        label: 'Data Kategori',
                        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                        borderColor: ['rgb(255, 99, 132)'],
                        data: {!! $value !!}
                    }]
                },

                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        
    </script>


@endsection