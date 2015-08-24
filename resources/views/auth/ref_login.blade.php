@extends('pur')

@section('content')
    <div class="container innlogging">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <section>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Logg inn</div>
                        <div class="panel-body">
                            <div class="row">
                                {!! Form::open(['url' => '/auth/login', 'method' => 'post']) !!}

                                <div class="form-group col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">Brukernavn:</div>
                                        {!! Form::input('text', 'email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">Passord:</div>
                                        {!! Form::input('password','password', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 pull-right">
                                    {!! Form::submit('Logg inn', ['class' => 'btn btn-default pull-right']) !!}
                                </div>
                            </div>
                            {!! Form::close()  !!}
                        </div>
                    </div>
                    </section>
                </div>
            </div>

    </div>


@endsection
