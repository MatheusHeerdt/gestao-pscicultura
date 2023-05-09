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
                   <span class="d-none d-sm-inline">
                    <a href="{{route('progression.create')}}" class="btn btn-white">
                      Calcular
                    </a>
                  </span>
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
                        @foreach($calculations as $calculation)
                            <tr>
                                <td class="d-none d-xl-table-cell">{{$calculation->fish->name}}</td>
                                <td class="d-none d-xl-table-cell">{{$calculation->daily_meals}}</td>
                                <td class="d-none d-xl-table-cell">{{number_format($calculation->meal_total/100,2,',','' )}} kg</td>
                                <td class="d-none d-xl-table-cell">{{number_format($calculation->daily_total/100,2,',','' )}} kg</td>
                                <td class="d-none d-xl-table-cell">{{$calculation->water_temperature}}ºC</td>
                                <td class="d-none d-xl-table-cell">{{$calculation->created_at->format('d-m-Y')}}</td>
                                <td class="row p-0 my-1 mx-0 justify-content-center">
                                    <div class="col-md-4">
                                        <a href="{{route('progression.edit',['id'=> $calculation->id])}}" class="btn btn-secondary">editar</a>
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::open(['route' => ['progression.delete',$calculation->id], 'method' => 'delete','class form-group' => 'm-0 p-0 col-md-6', 'id' => 'form-delete']) !!}
                                        {{Form::submit('excluir', ['class'=>'btn btn-danger', 'id'=>'form-submit-button'])}}
                                    </div>
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
