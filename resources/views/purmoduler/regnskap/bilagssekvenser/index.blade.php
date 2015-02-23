    <h1>Bilagssekvenser</h1>

    @foreach($bilagssekvenser as $bilagssekvens)
        <p>
           <b>Sekvenstype:</b> {{ $bilagssekvens->sekvenstype }}<br />
           <b>Beskrivelse:</b> {{ $bilagssekvens->oppgave->beskrivelse }}<br />
           <b>Opprettet:</b>   {{ $bilagssekvens->oppgave->tid_opprettet }} <br />
           <b>Laget av:</b>    {{ $bilagssekvens->oppgave->skaper->etternavn }}<br />
        </p>
    @endforeach