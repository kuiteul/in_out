@section('menu')

    <!-- Début de la page html-->
        <!-- Block renfermant tous les autres blocks réduit à une largeur col-sm-6 -->
    <div class="col-sm-2 offset-sm-1 menu-column">
        <!-- Deuxième étage de la page login -->
        <div class="col-12 flex-column">
            <div class="col-12 text-white panel-bar">
                <span id="enterprise-name">Panel</span>
            </div>
            <nav class="col-12 menu nav-link">
                @foreach ($user_log as $item)
                    <ul class="fw-bold col-12">
                        @if ($item->role == "User")
                            <li><a href="/presence">&Eacute;tat</a></li>
                        @endif
                        @if ($item->role == "Admin" || $item->role == "SuperAdmin" || $item->role == "Supervisor")
                            <li><a href="/status">&Eacute;tat du jour</a></li>
                        @endif
                        @if ($item->role == "User")
                            <li><a href="/entry">Arrivée</a></li>
                        @endif
                        @if ($item->role == "Admin" || $item->role == "SuperAdmin" || $item->role == "Supervisor")
                            <li><a href="/late">Retardataire</a></li>
                        @endif
                        @if ($item->role == "SuperAdmin")
                            <li><a href="/users">Gestion des Utilisateurs</a></li>
                        @endif
                        @if ($item->role == "Admin" || $item->role == "SuperAdmin")
                            <li><a href="/employee">Gestion des employés</a></li>
                        @endif
                        @if ($item->role == "Admin" || $item->role == "SuperAdmin")
                            <li><a href="/service">Gestion des services</a></li>
                        @endif
                        @if ($item->role == "Admin" || $item->role == "SuperAdmin" || $item->role == "Supervisor")
                            <li><a href="/search">Rechercher</a></li>
                        @endif
                        
                    </ul>
                @endforeach
            </nav>
        </div>
    </div>
    
@endsection