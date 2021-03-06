@extends('pur')
@section('content')

    @include('purmoduler.regnskap.kontoer._opprett-undermeny')

    <div class="container">

        <h1>Ny konto</h1>

        @include('_feilmeldinger')

        {!! Form::open(['route' => 'regnskap.kontoer.lagre']) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <div class="input-group">
                            <div class="input-group-addon">* Kontokode:</div>
                            {!! Form::input('number', 'kontokode', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon">* Kontonavn:</div>
                            {!! Form::text('kontonavn', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            {!! Form::submit('Lagre', ['class' => 'btn btn-primary']) !!}
            {!! link_to_route('regnskap.kontoer.opplist', 'Avbryt', null, ['class' => 'btn btn-warning']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
