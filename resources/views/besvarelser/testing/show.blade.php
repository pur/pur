@extends('pur')
@section('content')


    <h1>Besvarelse på '{{ $besvarelse->oppgavesett->beskrivelse }}'</h1>
    <p>Av: {{ $besvarelse->skaper->fulltnavn() }}</p>
    <p>Elevens kommentar: <i>{{ $besvarelse->kommentar }}</i></p>
    <ul>
        @foreach($besvarelse->bilag as $bilag)
            <li>Bilag {{$bilag->nr_i_oppgsett . ': ' . $bilag->bilagsmal->bilagstype }}</li>
        @endforeach
    </ul>
    {!! link_to_route('besvarelser.index', 'Alle besvarelser') !!}
@endsection
