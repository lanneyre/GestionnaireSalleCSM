<div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
                <h4 class="text-white">Gestionnaire de salle</h4>
                <p class="text-muted">Ce site permet de gérer les salles de toutes les promos</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
                <h4 class="text-white">Menu</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('salle.index') }}" class="text-white">Gestion des Salles</a></li>
                    <li><a href="{{ route('groupe.index') }}" class="text-white">Gestion des Groupes</a></li>
                    <li><a href="#" class="text-white">Gestion des Utilisateurs</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="storage/Logo.png" alt="Campus Sud Des Métiers" class="logo">
            <strong>Gestionnaire de Salle</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
            aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</div>
