@extends('pur')
@section('content')
    @include('brukere._opplist-undermeny')
    <div class="container">
        <h1>Brukere</h1>

        <div class="list-group panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-1">
                                {!! Form::checkbox('', '') !!}
                            </div>
                            <div class="col-sm-3">
                                <b>ID:</b>
                            </div>
                            <div class="col-sm-8">
                                <b>Navn:</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($brukere as $bruker)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-1">
                                    {!! Form::checkbox('', '') !!}
                                </div>
                                <div class="col-sm-3">
                                    {{ $bruker->id }}
                                </div>
                                <div class="col-sm-8">
                                    {{ $bruker->fornavn  }} {{$bruker->etternavn }}
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-2 pull-right">
                            <div class="btn-group pull-right">
                                <a href="{{ URL::route('brukere.vis', $bruker) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis info om {{ $bruker->fornavn  }} {{$bruker->etternavn }}">
                                    <span class="fa fa-eye"></span></a>
                                <a href="{{ URL::route('brukere.rediger', $bruker) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger {{ $bruker->fornavn  }} {{$bruker->etternavn }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection