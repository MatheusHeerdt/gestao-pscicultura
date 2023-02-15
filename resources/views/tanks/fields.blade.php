<div class="card">
    <div class="card-body">
        <div class="row col-md-12">
            <div class="col-md-4">
                {!! Form::Label('fish_id','Peixe',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::select('fish_id',$pisces ?? null, $tank->fish_id ?? null, ['class' => 'form-control']) !!}
                @if($errors->has('fish_id'))
                    @error('fish_id')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @endif
            </div>
            <div class="col-md-4">
                {!! Form::Label('name','Nome',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::text('name',$tank->name ?? null, $attributes =['class' => 'form-control', ]) !!}
                @if($errors->has('name'))
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @endif

            </div>
            <div class="col-md-4">
                {!! Form::Label('volume','Volume',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::number('volume',$tank->volume ?? null, $attributes =['class' => 'form-control']) !!}
                @if($errors->has('volume'))
                    @error('volume')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                @endif
            </div>
        </div>
    </div>
</div>
