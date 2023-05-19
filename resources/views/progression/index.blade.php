@extends('base.app')
@section('content')

    <div class="container">
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                       Progresso
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div>
                        <a href="{{route('progression.create')}}" class="btn btn-white">
                          Calcular
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th>Peixe</th>
                            <th>refeições</th>
                            <th>por refeição</th>
                            <th>por dia</th>
                            <th>Temperatura da água</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calculations as $calculation)
                            <tr>
                                <td>{{$calculation->fish->name}}</td>
                                <td>{{$calculation->daily_meals}}</td>
                                <td>{{ number_format($calculation->meal_total / 100, 2, ',', '.') }} kg</td>
                                <td>{{ number_format($calculation->daily_total / 100, 2, ',', '.') }} kg</td>
                                <td>{{$calculation->water_temperature}}ºC</td>
                                <td>{{$calculation->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('progression.edit',['id'=> $calculation->id])}}" class="d-inline-block btn btn-secondary">editar</a>
                                    {!! Form::open(['route' => ['progression.delete',$calculation->id], 'method' => 'delete','class' => 'd-inline-block form-group m-0 p-0 col-md-6', 'id' => 'form-delete']) !!}
                                        {{Form::submit('excluir', ['class'=>'btn btn-danger', 'id'=>'form-submit-button'])}}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                        {!! $calculations->render('vendor.pagination.bootstrap-5') !!}
                </div>
            </div>
        </div>

    </div>
@endsection
