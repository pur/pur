@extends('app')
@section('content')
    <div class="container">
        {!! Form::open(['url' => 'bruker']) !!}
        @include('brukere.form')
        {!! Form::close() !!}
    </div>

@endsection