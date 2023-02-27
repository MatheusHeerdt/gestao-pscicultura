@extends('base.app')
@section('content')
    <div class="container">
        {!! Form::open(['url' => route('progression.store')]) !!}

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

                    </div>
                </div>
            </div>
        </div>
    @include('progression.fields')
    {!! Form::close() !!}
@endsection
