@extends('base.app')
@section('content')

    <div class="container">
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
                        <a href="{{route('tanks.create')}}" class="btn btn-white">
                          Criar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Volume</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tanks as $tank)
                        <tr>
                            <td>{{$tank->name}}</td>
                            <td>{{$tank->volume}}</td>
                            <td>
                                <a href="{{route('tanks.edit',['id'=> $tank->id])}}" class="d-inline-block btn btn-secondary">editar</a>
                                {!! Form::open(['route' => ['tanks.delete',$tank->id], 'method' => 'delete','class' => 'd-inline-block form-group m-0 p-0 col-md-6', 'id' => 'form-delete']) !!}
                                    {{Form::submit('excluir', ['class'=>'btn btn-danger', 'id'=>'form-submit-button'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                    {!! $tanks->render('vendor.pagination.bootstrap-5') !!}
            </div>
        </div>

    </div>
@endsection
