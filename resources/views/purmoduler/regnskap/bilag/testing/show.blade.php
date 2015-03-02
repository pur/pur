@extends('pur')


@section('content')

    <h1>Bilag {{ $bilag->bilagsmal_id }}
        <small>(test)</small>
    </h1>

        <p>
            <b>bilagsmal_id:</b>   {{ $bilag->bilagsmal_id }} <br/>
            <b>sekvensposisjon:</b> {{ $bilag->sekvensposisjon }}<br/>
            <b>besvarelse_id:</b> {{ $bilag->besvarelse_id}}<br/>
        </p>


@endsection
