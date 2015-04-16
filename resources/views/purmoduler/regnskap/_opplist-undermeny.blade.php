@extends('_undermeny')
@section('menuleft')
    @if(URL::previous() != URL::current())
        <li>

        </li>
    @endif
@endsection
@section('menuright')
@endsection