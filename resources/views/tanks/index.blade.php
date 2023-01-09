@extends('base.app')
@section('content')
        <div class="container-fluid p-0">
            <div class="row">

                    <div class="card flex-fill">
                        <div class="card-header row ">
                            <h5 class="card-title mb-0 col-10">Meus tanques</h5>
                            <div class="col-2 mr-3 position-relative">
                                <button class="btn btn-primary position-absolute end-0">Criar</button>
                            </div>
                        </div>
                        <table class="table table-hover my-0">
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
            </div>
        </div>
@endsection
