<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{asset('/')}}">Personas un īpašumi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="persons" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Personas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="persons">
                        <li><a class="dropdown-item" href="{{asset('/persons')}}">Visas personas</a></li>
                        <li><a class="dropdown-item" href="{{asset('/persons-without-properties')}}">Personas bez
                                īpašumiem</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="properties" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Īpašumi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="properties">
                        <li><a class="dropdown-item" href="{{asset('/properties')}}">Visi īpašumi</a></li>
                        <li><a class="dropdown-item" href="{{asset('/properties-without-land')}}">Īpašumi bez
                                zemesgabaliem</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
