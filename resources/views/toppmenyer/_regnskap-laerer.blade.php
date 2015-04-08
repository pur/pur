<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Utforsk<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li>{!! link_to_route('brukere.show', 'Brukere', null) !!}</li>
        <li>{!! link_to_route('oppgavesett.show', 'Oppgavesett', null) !!}</li>
        <li>{!! link_to_route('oppgaver.show', 'Oppgaver (Bilagsmalsekvenser)', null) !!}</li>
    </ul>
</li>
<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mine
        oppgaver <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li>{!! link_to_route('besvarelser.show', 'Mine oppgavesett', null) !!}</li>
    </ul>
</li>