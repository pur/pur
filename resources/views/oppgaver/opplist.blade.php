@extends('pur')
@section('content')
    @include('oppgaver._opplist-undermeny')
    <div class="container">
        <h1>Oppgaver</h1>
        @include('oppgaver._liste')
    </div>
@endsection
@section('scripts')



@endsection
