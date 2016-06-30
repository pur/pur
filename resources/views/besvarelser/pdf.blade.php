<h3>pur:Regnskap</h3>

<h1>Besvarelse</h1>

<p><b>Oppgavesett:</b> {{ $besvarelse->oppgavesett->tittel }}, av {{ $besvarelse->oppgavesett->skaper->navn }}</p>

<p><b>Besvarelse av:</b> {{ $besvarelse->skaper->navn }}, levert {{ $tidLevert }}</p>

<hr/>

<h2>Oppgavesettet er <b>{{ $besvarelse->prosentKorrekt() }}%</b> korrekt besvart</h2>

<hr/>

<br />

<small>URL for besvarelse: <a href="{{ route('besvarelser.vis', $besvarelse) }}">{{ route('besvarelser.vis', $besvarelse) }}</a></small>
