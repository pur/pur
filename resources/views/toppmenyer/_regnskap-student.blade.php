
<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Mine oppgaver <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li>{!! link_to_route('besvarelser.show', 'Obligatoriske oppgavesett', null) !!}</li>
        <li>{!! link_to_route('besvarelser.show', 'Øvinger', null) !!}</li>
    </ul>
</li>