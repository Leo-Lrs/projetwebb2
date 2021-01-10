<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/admin') }}">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-clipboard menu-icon"></i>
                <span class="menu-title">Création</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ URL::to('/ajoutercategorie') }}">Ajouter
                            plateforme</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ URL::to('/ajouterproduit') }}">Ajouter jeu</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="ti-layout menu-icon"></i>
                <span class="menu-title">Affichages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/categories') }}">Plateformes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/produits') }}">Jeux</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/commandes') }}">Commandes</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>