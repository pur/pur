@extends('pur')

@section('content')
    <div class="container">
        <h1>Logg inn</h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Logg inn med testbruker</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                {!! Form::open(['url' => '/auth/login', 'method' => 'post']) !!}
                                {!! Form::hidden('email', 'laerer@laerd.no') !!}
                                {!! Form::hidden('password', 'passord') !!}
                                {!! Form::hidden('password', 'passord') !!}
                                {!! Form::submit('Logg inn som Lærer Lærd', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close()  !!}
                            </div>
                            <div class="col-lg-6 text-center">
                                {!! Form::open(['url' => '/auth/login', 'method' => 'post']) !!}
                                {!! Form::hidden('email', 'sture@student.no') !!}
                                {!! Form::hidden('password', 'passord') !!}
                                {!! Form::submit('Logg inn som Sture Student', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close()  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
