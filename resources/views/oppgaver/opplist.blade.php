@extends('pur')
@section('content')
    @include('oppgaver._opplist-undermeny')
    <div class="container">
        <h1>Oppgaver</h1>
        <blockquote class="bq-info">
            <p>Info om oppgaver</p>
        </blockquote>
        <section>
            <h2>Mine oppgaver</h2>
            @include('oppgaver._liste')
        </section>
    </div>
@endsection
@section('scripts')



@endsection
