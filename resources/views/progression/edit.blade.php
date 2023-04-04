@extends('base.app')
@section('content')
    <div class="container">
        {!! Form::open(['route' => ['progression.update', $progression->id], 'method'=> 'put']) !!}
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Meus Tanques
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div>
                   <span class="d-none d-sm-inline">
                       {{Form::submit('Salvar',['class' => 'btn btn-white'])}}
                  </span>
                    </div>
                </div>
            </div>
        </div>
    @include('progression.fields')
    {!! Form::close() !!}

        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Peixe</th>
                            <th class="d-none d-xl-table-cell">refeições</th>
                            <th class="d-none d-xl-table-cell">por refeição</th>
                            <th class="d-none d-xl-table-cell">por dia</th>
                            <th class="d-none d-xl-table-cell">Temperatura da água</th>
                            <th class="d-none d-xl-table-cell">Data</th>
                            <th class="d-none d-xl-table-cell"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="d-none d-xl-table-cell">{{$progression->fish->name}}</td>
                                <td class="d-none d-xl-table-cell">{{$progression->daily_meals}}</td>
                                <td class="d-none d-xl-table-cell">{{$progression->meal_total}} kg</td>
                                <td class="d-none d-xl-table-cell">{{$progression->daily_total}} kg</td>
                                <td class="d-none d-xl-table-cell">{{$progression->water_temperature}}ºC</td>
                                <td class="d-none d-xl-table-cell">{{$progression->created_at->format('d-m-Y')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
