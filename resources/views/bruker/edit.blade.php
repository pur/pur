@extends('app')
@section('content')
    <div class="container">
        {!! Form::open(['url' => 'bruker']) !!}
        @include('bruker.form')
        {!! Form::close() !!}
    </div>

@endsection