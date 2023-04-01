<!-- Surface Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surface', 'Surface:') !!}
    {!! Form::text('surface', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>

<!-- Floodlights Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('floodlights', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('floodlights', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('floodlights', 'Floodlights', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Indoor Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('indoor', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('indoor', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('indoor', 'Indoor', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::number('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lng', 'Lng:') !!}
    {!! Form::number('lng', null, ['class' => 'form-control']) !!}
</div>