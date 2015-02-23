@extends('app')


@section('content')

    <h1>Vis bilagssekvens
        <small>(test)</small>
    </h1>

    <p><b>Sekvenstype:</b> {{ $bilagssekvens->sekvenstype }}</p>

    {!! link_to_route('bilagssekvens.edit', 'Rediger', [$bilagssekvens->id]) !!}
@endsection