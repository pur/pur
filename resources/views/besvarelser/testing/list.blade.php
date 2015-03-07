@extends('pur')
@section('content')


    <h1>Alle besvarelser</h1>
    <ul>
        @foreach($besvarelser as $besvarelse)
            <li>{{ $besvarelse->skaper->fulltnavn() . ' sin besvarelse på ' . $besvarelse->oppgavesett->beskrivelse }}
                {!! link_to_route('besvarelser.show', 'Se besvarelse', [$besvarelse->id]) !!}</li>
        @endforeach
    </ul>

@endsection
