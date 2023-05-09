@extends('base.app')
@section('content')
    <div class="container">
        {!! Form::open(['url' => route('fish.store')]) !!}
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
                       {{Form::submit('Criar',['class' => 'btn btn-white'])}}
                    </div>
                </div>
            </div>
        </div>
    @include('fish.fields')
    {!! Form::close() !!}
@endsection
