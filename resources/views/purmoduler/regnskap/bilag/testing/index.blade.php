@extends('pur')


@section('content')

    <h1>Alle bilag
        <small>(test)</small>
    </h1>
    @foreach($bilagsett as $bilag)
        <p>
            <b>bilagsmal_id:</b>   {{ $bilag->bilagsmal_id }} <br/>
            <b>sekvensposisjon:</b> {{ $bilag->sekvensposisjon }}<br/>
            <b>besvarelse_id:</b> {{ $bilag->besvarelse_id}}<br/>
        </p>
    @endforeach

@endsection
