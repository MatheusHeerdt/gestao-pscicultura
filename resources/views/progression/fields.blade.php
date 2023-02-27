<div class="card">
    <div class="card-body">
        <div class="row col-md-12 d-flex align-items-end justify-content-between">
            <div class="col-md-5">
                {!! Form::Label('tank_id','Tanque',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::select('tank_id',$tanks ?? null, $progression->tank_id ?? null, ['class' => 'form-control']) !!}
                @if($errors->has('tank_id'))
                    @error('tank_id')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @endif
            </div>
            <div class="col-md-5">
                {!! Form::Label('water_temperature','Temperatura da água ºc', $attributes = ['class'=> 'mb-2'])!!}
                {!! Form::text('water_temperature',$progression->water_temperature ?? null, $attributes =['class' => 'form-control']) !!}
                @if($errors->has('water_temperature'))
                    @error('water_temperature')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @endif
            </div>
            <div class="col-md-2">
            <span class="d-none d-sm-inline">
                       {{Form::submit('calcular',['class' => 'btn btn-success'])}}
                  </span>
            </div>
        </div>
    </div>
</div>
