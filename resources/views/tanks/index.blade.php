@extends('base.app')
@section('content')

    <div class="container">
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">

                    <h2 class="page-title">
                        Combo layout
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div>
                   <span class="d-none d-sm-inline">
                    <a href="{{route('tanks.create')}}" class="btn btn-white">
                      Criar
                    </a>
                  </span>
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
                        <th class="d-none d-xl-table-cell">Volume</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tanks as $tank)
                        <tr>
                            <td>{{$tank->name}}</td>
                            <td class="d-none d-xl-table-cell">{{$tank->volume}}</td>
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
