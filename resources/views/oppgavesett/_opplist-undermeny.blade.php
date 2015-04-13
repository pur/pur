<div id="navbar-submenu-wrapper">
    <nav class="navbar navbar-default" id="navbar-submenu">
        <div class="container">
            <div class="collapse navbar-collapse" id="submenu">
                <ul class="nav navbar-nav">
                    @if(URL::previous() != URL::current())
                        <li>
                            <a id="submenuitem1" href="{{ URL::previous() }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Tilbake"><span class="fa fa-level-up fa-rotate-270"></span> Tilbake</a>
                        </li>
                    @endif
                    <li>
                        <a id="submenuitem2" href="{{ URL::route('oppgavesett.opprett') }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Legg til oppgavesett"><span class="fa fa-plus"></span> Legg til oppgavesett</a>
                    </li>
                    <li>
                        <a id="submenuitem3" href="/" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Slett valgte oppgavesett"><span class="fa fa-trash"></span> Slett valgte oppgavesett</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><span class="successelement text-success">Lagret</span></li>
                </ul>
            </div>
        </div>
    </nav>
</div>