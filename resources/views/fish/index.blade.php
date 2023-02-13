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
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th class="d-none d-xl-table-cell">idade</th>
                        <th class="d-none d-xl-table-cell">tamanho</th>
                        <th class="d-none d-xl-table-cell"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pisces as $fish)
                        <tr>
                            <td class="d-none d-xl-table-cell">{{$fish->name}}</td>
                            <td>{{\App\Models\FishTypes::getLabel($fish->type)}}</td>
                            <td class="d-none d-xl-table-cell">{{$fish->quantity}}</td>
                            <td class="d-none d-xl-table-cell">{{$fish->age}} meses</td>
                            <td class="d-none d-xl-table-cell">{{$fish->size}}g</td>
                            <td class="row p-0 my-1 mx-0 justify-content-end">
                                <div class="col-md-4">
                                    <a href="{{route('fish.edit',['id'=> $fish->id])}}" class="btn btn-secondary">editar</a>
                                </div>
                                <div class="col-md-4">
                                    {!! Form::open(['route' => ['fish.delete',$fish->id], 'method' => 'delete','class form-group' => 'm-0 p-0 col-md-6', 'id' => 'form-delete']) !!}
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
                    {!! $pisces->render('vendor.pagination.bootstrap-5') !!}
            </div>
        </div>

    </div>


    <script>
            $('#form-submit-button').on('click', function(){
                $('#form-delete').submit();
            });
    </script>
@endsection
