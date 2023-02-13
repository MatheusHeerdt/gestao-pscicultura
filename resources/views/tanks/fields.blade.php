<div class="card">
    <div class="card-body">
        <div class="row col-md-12">
            <div class="col-md-4">
                {!! Form::Label('fish_id','Peixe',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::select('fish_id',$pisces ?? null, $tank->fish_id ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::Label('name','Nome',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::text('name',$tank->name ?? null, $attributes =['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::Label('volume','Volume',$attributes = ['class'=> 'mb-2'])!!}
                {!! Form::number('volume',$tank->volume ?? null, $attributes =['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
