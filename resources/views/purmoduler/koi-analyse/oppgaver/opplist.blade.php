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
                                    <i>(Beskrivelsen av oppg. {{ $oppgave->id }})</i>
                                </div>
                                <div class="col-sm-2 actions">
                                    <div class="pull-right">
                                        <a href="instans/1/rediger" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Velg oppgave">
                                            <span class="fa fa-play"></span>
                                        </a>
                                        {{--{!! Form::open(['route' => ['koi-analyse.instanser.generer', $oppgave], 'method' => 'POST', 'class' => 'form-inline']) !!}
                                        <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Velg oppgave">
                                            <span class="fa fa-play"></span>
                                        </button>
                                        {!! Form::close() !!}--}}
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
