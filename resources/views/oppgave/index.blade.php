    <h1>Oppgaver</h1>

    @foreach($oppgaver as $oppgave)

        <p>{{ $oppgave->beskrivelse }}<br />Laget av {{ $oppgave->skaper->fornavn  }}</p>

    @endforeach