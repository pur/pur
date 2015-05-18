@extends('pur')
@section('content')
    @include('oppgaver._opplist-undermeny')
    <div class="container">
        <h1>Oppgaver</h1>
        <section class="padding">
            <h2>Alle oppgaver</h2>
            @include('oppgaver._liste')
        </section>
    </div>
@endsection
@section('scripts')



@endsection
