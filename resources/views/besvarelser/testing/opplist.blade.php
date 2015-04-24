@extends('pur')
@section('content')
    @include('besvarelser.testing._opplist-undermeny')
    <div class="container">
        <h1>Besvarelser</h1>

        @include('besvarelser._liste', $besvarelser)
    </div>
@endsection
