@extends('pur')
@section('content')
    @include('purmoduler.regnskap.besvarelser._editSubmenu')

    <div class="container">
        <h1>Besvarelse på '{{ $besvarelse->oppgavesett->beskrivelse }}'</h1>

        <p>Av: {{ $besvarelse->skaper->fulltnavn() }}</p>

        <p>Opprettet: {{$besvarelse->tidOpprettet()}}</p>

        <div class="input-group">
            <div class="input-group-addon"><span class="fa fa-comment"></span> Kommentar</div>
            {!! Form::input('text', 'kommentar',  $besvarelse->kommentar, ['class' => 'form-control variabel', 'id' => 'kommentar']) !!}
        </div>

        @include('purmoduler.regnskap.besvarelser._rediger')

        <hr/>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Saldoballanse</p>
                @include('purmoduler.regnskap.besvarelser._besvarelseSaldobalanse')
            </div>
        </div>

    </div>
@endsection
