@extends('pur')
@section('content')
    <div class="container">
        <h1>{{ $bruker->navn() }}</h1>
        <p>Rolle: {{ $bruker->rolle }}</p>
        {!! Form::model($bruker, ['route' => ['brukere.oppdater.innlogget'], 'method' => 'PATCH']) !!}
        {{--Besvarelser: {{$bruker->besvarelser->count()}}--}}

        <div class="row">
            <div class="form-group col-sm-6">
                <div class="input-group">
                    <div class="input-group-addon">Visningsnavn <i>(valgfritt)</i>:</div>
                    {!! Form::text('navn', $bruker->navn, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="input-group">
                    {!! Form::submit('Oppdater', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection