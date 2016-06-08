@extends('pur')
@section('content')
    <div class="container">
        <h1>Oppgaver</h1>
        <section class="padding responsive-table">
            @if($oppgaver->count() > 0)
                <div class="list-group panel panel-primary" role="tablist" aria-multiselectable="true">
                    @foreach($oppgaver as $oppgave)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-10">
                                    <span class="visible-xs-inline">Beskrivelse: </span>
                                    <b>Oppgave {{ $oppgave->id }} </b><i>(Beskrivelse...)</i>
                                </div>
                                <div class="col-sm-2 actions">
                                    <div class="pull-right">
                                        {!! Form::open(['route' => ['koi-analyse.instanser.generer'], 'method' => 'POST', 'class' => 'form-inline']) !!}
                                        {!! Form::hidden('oppgave-id', $oppgave->id) !!}
                                        {!! Form::button('<span class="fa fa-play"></span>',
                                            ['type' => 'submit',
                                             'class' => 'btn btn-default',
                                             'data-toggle' => 'tooltip',
                                             'data-placement' => 'top',
                                             'data-container' => 'body',
                                             'title' => 'Velg oppgave' ]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
@endsection
