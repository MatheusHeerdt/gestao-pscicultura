@extends('base.app')
@section('content')
<div class="container">
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards mb-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Tanques</div>
                                </div>
                                <div class="h1">{{$tanksTotal}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Peixes</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{$piscesTotal}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Idade Média Dos Peixes (meses)</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{$piscesAgeAverage}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Tamanho Médio Dos Peixes(g)</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">{{$piscesGrowthAverage}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Crescimento Médio</h3>
                                    <div id="chart-mentions" class="chart-lg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="pisces-growth" data-pisces-growth="{{ json_encode($piscesGrowth) }}"></div>
<div id="creations" data-creations="{{ json_encode($creations) }}"></div>
<div id="creation-months" data-creation-months="{{ json_encode($creationMonths) }}"></div>
@endsection

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        let piscesGrowth = JSON.parse(document.getElementById('pisces-growth').getAttribute('data-pisces-growth'));
        let creations = JSON.parse(document.getElementById('creations').getAttribute('data-creations'));
        let creationMonths = JSON.parse(document.getElementById('creation-months').getAttribute('data-creation-months'));
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
                stacked: true,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Tamanho",
                data: piscesGrowth
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                format: 'dd/mm/yyyy',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: creations,
            colors: ["#206bc4", "#79a6dc", "#bfe399"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
