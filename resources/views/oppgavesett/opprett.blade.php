@extends('pur')
@section('content')

    @include('oppgavesett._rediger-undermeny')

    <div class="container">

        <h1>Nytt oppgavesett</h1>

        @include('_feilmeldinger')

        {!! Form::open(['route' => 'oppgavesett.lagre']) !!}

        @include('oppgavesett._skjema')

        {!! Form::close() !!}
{{--
        <section class="padding">
            <h2>Oppgaver</h2>
            @include('oppgaver._liste', ['oppgaver' => $oppgavesett->oppgaver, 'kanOpprette' => true])
        </section>
--}}
    </div>

@endsection
