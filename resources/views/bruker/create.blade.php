@extends('app')
@section('content')

    $table->string('fornavn');
    $table->string('etternavn');
    $table->string('epost')->unique();
    $table->string('passord', 60);
    $table->string('rolle');

@endsection