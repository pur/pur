@extends('pur')
@section('content')
    @include('purmoduler.regnskap.kontoer._opplist-undermeny')
    <div class="container">
        <h1>Kontoer</h1>

        <section class="padding responsive-table">
            {{--<h2>Kontoer</h2>--}}

            <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel-heading hidden-xs">
                    <div class="row">
                        <div class="col-sm-2">
                            <b>Kontokode:</b>
                        </div>
                        <div class="col-sm-8">
                            <b>Kontonavn:</b>
                        </div>
                        <div class="col-sm-2 actions">
                            <b>Handlinger:</b>
                        </div>
                    </div>
                </div>

                @foreach($kontoer as $konto)
                    <div class="list-group-item {{ $konto->trashed() ? 'disabled' : ''}}">
                        <div class="row">

                            <div class="col-sm-2">
                                <span class="visible-xs-inline">Kontokode: </span>{{ $konto->kontokode }}
                            </div>
                            <div class="col-sm-8">
                                <span class="visible-xs-inline">Kontonavn: </span>{{ $konto->kontonavn }}
                            </div>

                            <div class="col-sm-2 actions">
                                <div class="pull-right">

                                    @if($konto->trashed())
                                        {!! Form::open(['route' => ['regnskap.kontoer.gjenopprett'],
                                                        'method' => 'PUT', 'class' => 'form-inline']) !!}
                                        {!! Form::hidden('kontokode', $konto->kontokode) !!}
                                        <button type="submit" class="btn btn-xs btn-default" data-toggle="tooltip"
                                                data-placement="top" data-container="body"
                                                title="Gjenopprett konto">
                                            <span class="fa fa-repeat"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    @else
                                        <a href="{{ URL::route('regnskap.kontoer.rediger', $konto) }}"
                                           class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top"
                                           data-container="body" title="Rediger konto">
                                            <span class="fa fa-edit"></span>
                                        </a>

                                        {!! Form::open(['route' => ['regnskap.kontoer.slett', $konto],
                                                        'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                        <button type="submit" class="btn btn-xs btn-default" data-toggle="tooltip"
                                                data-placement="top" data-container="body" title="Fjern konto">
                                            <span class="fa fa-remove"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
