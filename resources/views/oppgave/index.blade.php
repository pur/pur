    <h1>Oppgaver</h1>

    @foreach($oppgaver as $oppgave)

        <p>{{ $oppgave->beskrivelse }}<br />Laget av {{ $oppgave->brukere_id  }}, {{ $oppgave->created_at }}</p>

    @endforeach