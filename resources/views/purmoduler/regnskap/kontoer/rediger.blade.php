@extends('pur')
@section('content')

    @include('purmoduler.regnskap.kontoer._opprett-undermeny')

    <div class="container">

        <h1>Rediger konto</h1>

        @include('_feilmeldinger')

        {!! Form::model($konto, ['route' => ['regnskap.kontoer.oppdater', $konto], 'method' => 'PATCH']) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <div class="input-group">
                            <div class="input-group-addon">Kontokode:</div>
                            <b>{{ $konto->kontokode  }}</b>
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
