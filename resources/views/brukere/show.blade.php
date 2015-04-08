@extends('pur')
@section('content')
    <div class="container">
            <h1>{{$bruker->fulltNavn()}}</h1>
        <p>Rolle: {{$bruker->rolle}}</p>
        <p>ID: {{$bruker->id}}</p>
        Besvarelser: {{$bruker->besvarelser->count()}}
        {!! Form::model($bruker, ['route' => ['brukere.update', $bruker->id], 'method' => 'PATCH']) !!}

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group col-sm-8">


                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon">Fornavn</div>
                            {!! Form::text('beskrivelse', $bruker->fornavn, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon">Etternavn</div>
                            {!! Form::text('beskrivelse', $bruker->etternavn, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection