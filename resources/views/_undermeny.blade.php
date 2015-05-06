<div id="navbar-submenu-wrapper">
    <nav class="navbar navbar-default" id="navbar-submenu">
        <div class="container">
            <div class="collapse navbar-collapse" id="submenu">
                <ul class="nav navbar-nav">
                    @if(URL::previous() != URL::current())
                        <li>
                            <a id="submenuitem-tilbake" href="{{ URL::previous() }}" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Tilbake"><span class="fa fa-level-up fa-rotate-270"></span> Tilbake</a>
                        </li>
                    @endif
                    @yield('menuleft')
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><span id="ajax-success" class="text-info">Lagret</span></li>
                    @yield('menuright')
                </ul>
            </div>
        </div>
    </nav>
</div>
