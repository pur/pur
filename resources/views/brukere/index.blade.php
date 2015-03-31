@extends('pur')

@section('content')
    <div class="container">
        <h1>Brukere</h1>

        <div class="list-group panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-1">
                        <b>ID:</b>
                    </div>
                    <div class="col-sm-9">
                        <b>Navn:</b>
                    </div>
                    <div class="col-sm-2">

                    </div>
                </div>
            </div>
            @foreach($brukere as $bruker)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-1">
                            {{ $bruker->id }}
                        </div>
                        <div class="col-sm-9">
                            {{ $bruker->fornavn  }} {{$bruker->etternavn }}
                        </div>

                        <div class="col-sm-2">
                            <div class="btn-group pull-right">
                                <a href="{!! URL::route('brukere.show', $bruker->id) !!}" class="btn btn-default">
                                    <span class="fa fa-eye"></span></a>
                                <a href="{!! URL::route('brukere.show', $bruker->id . '/edit') !!}" class="btn btn-default"><span class="fa fa-edit"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection