@extends('base.app')
@section('content')
    <div class="container">
        {!! Form::open(['route' => ['tanks.update', $tank->id], 'method'=> 'put']) !!}
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
    @include('tanks.fields')
    {!! Form::close() !!}
@endsection
