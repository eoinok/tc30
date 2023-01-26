<!-- Firstname Field -->
<div class="col-sm-12">
    {!! Form::label('firstname', 'Firstname:') !!}
    <p>{{ $member->firstname }}</p>
</div>

<!-- Surname Field -->
<div class="col-sm-12">
    {!! Form::label('surname', 'Surname:') !!}
    <p>{{ $member->surname }}</p>
</div>

<!-- Membertype Field -->
<div class="col-sm-12">
    {!! Form::label('membertype', 'Membertype:') !!}
    <p>{{ $member->membertype }}</p>
</div>

<!-- Dateofbirth Field -->
<div class="col-sm-12">
    {!! Form::label('dateofbirth', 'Dateofbirth:') !!}
    <p>{{ $member->dateofbirth }}</p>
</div>

