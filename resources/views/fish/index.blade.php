@extends('base.app')
@section('content')

    <div class="container">
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
                    <a href="{{route('fish.create')}}" class="btn btn-white">
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
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th class="d-none d-xl-table-cell">idade</th>
                        <th class="d-none d-xl-table-cell">tamanho</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pisces as $fish)
                        <tr>
                            <td>{{$fish->type}}</td>
                            <td class="d-none d-xl-table-cell">{{$fish->quantity}}</td>
                            <td class="d-none d-xl-table-cell">{{$fish->age}}</td>
                            <td class="d-none d-xl-table-cell">{{$fish->size}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                    {!! $pisces->render('vendor.pagination.bootstrap-5') !!}
            </div>
        </div>

    </div>
@endsection
