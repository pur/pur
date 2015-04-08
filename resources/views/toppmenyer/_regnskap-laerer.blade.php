<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Oppgaver<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ URL::route('oppgaver.show', null) }}">
                <span class="fa fa-list"></span> Oppgaver
            </a>
        </li>
        <li>
            <a>
                <span class="fa fa-plus"></span> Legg til oppgave
            </a>
        </li>
    </ul>
</li>
<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Oppgavesett<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ URL::route('oppgavesett.listOppForLaerer') }}">
                <span class="fa fa-list"></span> Oppgavesett
            </a>
        </li>
        <li><a><span class="fa fa-plus"></span> Legg til oppgavesett</a></li>
    </ul>
</li>