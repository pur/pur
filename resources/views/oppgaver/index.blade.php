@extends('pur')
@section('content')
    @include('oppgaver._listSubmenu')
    <div class="container">
        <h1>Oppgaver</h1>
        @include('oppgaver._listOppgaver')
    </div>
@endsection
@section('scripts')



@endsection
