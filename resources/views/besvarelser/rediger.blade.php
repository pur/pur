@extends('pur')
@section('content')
    @include('purmoduler.regnskap.besvarelser._editSubmenu')

    <div class="container">
        <h1>Besvarelse på {{ $besvarelse->oppgavesett->beskrivelse }}</h1>

        <p>Opprettet: {{$besvarelse->tidOpprettet()}}</p>

        <div class="input-group">
            <div class="input-group-addon"><span class="fa fa-comment"></span> Kommentar</div>
            {!! Form::input('text', 'kommentar',  $besvarelse->kommentar, ['class' => 'form-control variabel', 'id' => 'kommentar']) !!}
        </div>

            <h2>Oppgaver</h2>

            @include('purmoduler.regnskap.besvarelser._rediger')


        <section>
            <h2>Saldoballanse</h2>
            @include('purmoduler.regnskap.besvarelser._besvarelseSaldobalanse')
        </section>

    </div>
@endsection
