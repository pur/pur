@extends('pur')
@section('content')
    @include('purmoduler.regnskap.bilagsmalsekvenser._listSubmenu')
    <div class="container">
        <h1>Bilagsmalsekvenser</h1>
        @include('oppgaver._listOppgaver')
    </div>
@endsection
@section('scripts')



@endsection
