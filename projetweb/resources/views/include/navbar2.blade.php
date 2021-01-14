<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/admin') }}">
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <span class="menu-title">Création</span>
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
                <span class="menu-title">Affichages</span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/categories') }}">Plateformes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/produits') }}">Jeux</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/commandes') }}">Commandes</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>