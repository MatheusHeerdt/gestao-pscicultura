<div class="card">
    <div class="card-body">
        <div class="row col-md-12">
            <div class="col-md-6">
                {!! Form::Label('name','Nome',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::text('name',$fish->name ?? null ,['class' => 'form-control']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::Label('type','Tipo',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::select('type',$types ?? null, $fish->type ?? $types[\App\Models\FishTypes::TILAPIA] ,['class' => 'form-select']) !!}
            </div>
        </div>
        <div class="row col-md-12 mt-3">
            <div class="col-md-4">
                {!! Form::Label('quantity','Quantidade',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::number('quantity',$fish->quantity ?? null, $attributes =['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::Label('age','Idade',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::number('age',$fish->age ?? null, $attributes =['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::Label('size','Tamanho',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::number('size',$fish->size ?? null, $attributes =['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
