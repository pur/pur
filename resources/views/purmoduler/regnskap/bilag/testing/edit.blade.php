@extends('pur')


@section('content')

    <h1>Utfør postering
        <small>(test)</small>
    </h1>

    {{ $bilag->sekvensposisjon }}

@endsection


@section('scripts')

    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="/js/ajaxformsubmit.js"></script>

@endsection