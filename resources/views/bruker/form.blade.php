<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">Legg til bruker</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-sm-6">
                {!!Form::label('fornavn', 'Fornavn:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!!Form::label('etternavn', 'Etteravn:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('epost', 'E-post:') !!}
            {!! Form::email('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('passord', 'Passord:') !!}
            {!! Form::password('title', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('rolle', 'Rolle:') !!}
            {!!Form::select('rolle', array('S' => 'Student', 'F' => 'Faglærer'), 'S') !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Opprett bruker', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>