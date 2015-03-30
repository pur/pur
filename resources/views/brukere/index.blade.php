@extends('pur')

@section('content')
    <div class="container">
        <h1>Brukere</h1>
        <div class="list-group">
            @foreach($brukere as $bruker)
                <div class="list-group-item">
                {!! link_to_route('brukere.show',  $bruker->fornavn . ' ' . $bruker->etternavn , [$bruker->id]) !!}
                </div>
            @endforeach
        </div>
    </div>
@endsection