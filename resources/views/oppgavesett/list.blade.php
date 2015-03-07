@extends('pur')
@section('content')

    <h1>Alle oppgavesett</h1>
    <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel-heading">
            <div class=" row">
                <div class="col-sm-8">
                    <b>Beskrivelse:</b>
                </div>
            </div>
        </div>

        @foreach($alleoppgavesett as $oppgavesett)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-8">
                        {!! link_to_route('oppgavesett.show', $oppgavesett->beskrivelse, [$oppgavesett->id]) !!}
                    </div>
                </div>
            </div>

    @endforeach


@endsection
