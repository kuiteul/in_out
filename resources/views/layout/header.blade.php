@section('header')
    
    <header class="col-12 col-sm-10 offset-sm-1 ">
        <div class="row col-12">
            <section class="col-sm-2 ">
                <img src="{{asset('images/amt-logo.png')}}" class="col-9 offset-1" alt="">
            </section>

            <section class="col-sm-4 offset-sm-2 fs-1 fw-bold  title text-center">
                <p class="title-header"> ENTREES / SORTIES</p>
            </section>

            <form class="col-sm-2 offset-sm-2" action="{{ url('/logout')}}" method="POST">
                @csrf
                <button type="submit" class=" btn search-btn text-underline">Se déconnecter</button>
            </form>
        </div>

        <div class="sub-header row col-12">
            <section class="col-4">
                Welcome, 
                @foreach ($user_log as $item)
                    {{ $item->f_name }} {{ $item->l_name }}
                
            </section>

            <section class="col-4 offset-4 text-end">
                Connecté en tant que
                @switch($item->role)
                    @case("Admin")
                        "Administrateur"
                        @break
                    @case("User")
                        "Utilisateur"
                        @break
                    @case("SuperAdmin")
                        "Super administrateur"
                        @break
                    @case("Supervisor")
                        "Superviseur"
                        @break
                    @default
                        
                @endswitch
            </section>
            @endforeach
        </div>

    </header>

@endsection
