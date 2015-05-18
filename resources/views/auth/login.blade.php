@extends('pur')

@section('content')
    <div class="container">
        <h1>Logg inn</h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Logg inn med testbruker</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                <p>Logg inn som Lærer Lærd</p>
                                {!! Form::open(['url' => '/auth/login', 'method' => 'post']) !!}
                                {!! Form::input('text', 'email', 'laerer@laerd.no') !!}

                                {!! Form::input('password','password', '') !!}
                                {!! Form::submit('Logg inn', ['class' => 'btn btn-default']) !!}
                                {!! Form::close()  !!}
                            </div>
                            <div class="col-lg-6 text-center">
                                <p>Logg inn som Sture Student</p>
                                {!! Form::open(['url' => '/auth/login', 'method' => 'post']) !!}
                                {!! Form::input('text', 'email', 'sture@student.no') !!}
                                {!! Form::input('password','password', '') !!}
                                {!! Form::submit('Logg inn', ['class' => 'btn btn-default']) !!}
                                {!! Form::close()  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
