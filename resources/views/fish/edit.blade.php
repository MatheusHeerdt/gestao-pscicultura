@extends('base.app')
@section('content')
    <div class="container">
        {!! Form::open(['route' => ['fish.update', $fish->id], 'method'=> 'put']) !!}
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Meus Peixes
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div>
                   <span class="d-none d-sm-inline">
                       {{Form::submit('salvar',['class' => 'btn btn-white'])}}
                  </span>
                    </div>
                </div>
            </div>
        </div>
    @include('fish.fields')
    {!! Form::close() !!}
@endsection
