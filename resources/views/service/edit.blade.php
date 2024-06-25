@extends('layout/template')
@section('title')
    Gestion des services
@endsection

@section('content')
    
    <main class="col-10 col-sm-7 offset-1">
        <div class="col-12 main-bar">
            <p class="fw-bold fs-5">Connecting the world</p>
        </div>
        <p class="col-2 offset-10">
            <a href="/service" class="col-12 text-primary">Liste des services</a>
        </p>
        <h2 class="text-center  text-uppercase fw-bold fs-1 title col-12">Création d'un service</h2>
        <hr>
        <!-- 
            |
            | Formulaire de création de ticket 
            |
        -->
        @foreach ($service as $item)
            <form action="/service/{{ $item->service_id }}" class="col-12" method="POST">
                @csrf <!-- Clé de contrôle du formulaire -->
                @method('PUT')
                <input type="text" name="service-id" value={{ $item->service_id }} id="service-id" hidden>
                <input type="text" name="user-id" value="{{ Auth::user()->user_id }}" id="user-id" hidden>
                <div class="col-6 offset-3">
                    <!-- Zone de texte du prénom -->
                    <div class="input-group mb-3 col-12 ">
                        <span class="input-group-text col-4 text-white text-center input-login" id="">Nom du service</span>
                        <input type="text" class="form-control input-login" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            placeholder="Entrer le nom du service" name="service-name" value="{{ $item->service_name}}">
                    </div>
                    <div class="input-group mb-3 col-12 ">
                        <span class="input-group-text col-4 text-white text-center input-login" id="">Email de service</span>
                        <input type="text" class="form-control input-login" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            placeholder="Entrer le nom du service" name="service-email" value="{{ $item->service_email}}">
                    </div>
                    @error('service-name')
                        <div class="input-group col-12 mb-3 alert alert-danger"> {{ $message }} </div>
                    @enderror
                
                    <div class="input-group mb-3">
                        <input type="submit" class="btn-login col-8 offset-2" value="Enregistrer">
                    </div>

                </div>
            </form>
        @endforeach
    </main>

@endsection

@extends('layout/header')
@extends('layout/menu')