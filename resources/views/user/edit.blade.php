@extends('layout/template')
@section('title')
    Création d'un utilisateur
@endsection

@section('content')
    
<main class="col-10 col-sm-7 offset-1">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <p class="col-2 offset-10">
        <a href="/users" class="col-12 text-primary">Liste des utilisateurs</a>
    </p>
    <h2 class="text-center  text-uppercase fw-bold fs-1 title col-12">Modification de l'utilisateur</h2>
    <hr>
    <!-- 
        |
        | Formulaire de création de ticket 
        |
    -->
    @foreach ($user as $item)
    
    <form action="/users/{{ $item->id }}" class="col-12" method="POST">
        @csrf <!-- Clé de contrôle du formulaire -->
        @method('PUT')
        @isset($error)
            <div class="col-12 alert alert-danger text-center">{{ $error }}</div>
        @endisset
        <div class="col-6 offset-3">
                <!-- Zone de texte du prénom -->
                <div>
                    <input type="text" name="user_id" id="user_id" value={{ $item->id }} hidden>
                </div>
                <div class="input-group mb-3 col-12 ">
                    <span class="input-group-text col-4 text-white text-center input-login" id="">Nom complet</span>
                    <input type="text" class="form-control input-login" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="Entrer le nom complet" name="name" value="{{ $item->name }}">
                </div>
                @error('name')
                    <div class="input-group col-12 mb-3 alert alert-danger"> {{ $message }} </div>
                @enderror
                <!-- Zone de texte de l'adresse email -->
                <div class="input-group mb-3 col-12 ">
                    <span class="input-group-text col-4 text-white text-center input-login" id="">Email </span>
                    <input type="email" class="form-control input-login" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="Entrer une adresse email" name="email" value="{{ $item->email }}">
                </div>
                @error('email')
                    <div class="input-group col-12 mb-3 alert alert-danger"> {{ $message }} </div>
                @enderror
                <div class="input-group mb-3 col-12 ">
                    <span class="input-group-text text-white col-4 input-login">Mot de passe</span>
                    <input type="password" class="form-control input-login" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="Entrer le mot de passe" name="password">
                </div>
                @error('password')
                    <div class="input-group col-12 mb-3 alert alert-danger"> {{ $message }} </div>
                @enderror
                <div class="input-group mb-3 col-12 ">
                    <select name="user_type" id="user_type" class="form-control">
                        <option value="" selected disabled>{{ $item->user_type }}</option>
                        <option value="User">utilisateur</option>
                        <option value="Admin">Administrateur</option>
                        <option value="Supervisor">Superviseur</option>
                        @if ($user_log->user_type === "SuperAdmin")
                            <option value="SuperAdmin">Super Administrateur</option>
                        @endif
                        
                    </select>
                </div>
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