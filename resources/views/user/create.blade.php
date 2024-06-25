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
        <h2 class="text-center  text-uppercase fw-bold fs-1 title col-12">Création d'utilisateur</h2>
        <hr>
        <!-- 
            |
            | Formulaire de création de ticket 
            |
        -->
        <form action="/users" class="col-12" method="POST">
            @csrf <!-- Clé de contrôle du formulaire -->

            <input type="test" name="user-id" value="{{ Auth::user()->user_id }}" hidden >
            <div class="col-6 offset-3">
                    <!-- Zone de texte du prénom -->
                    <div class="input-group mb-3 col-12 ">
                        <select name="employee-id" id="employee-id" class="form-control">
                            <option value="" selected disabled>Sélectionner l'utilisateur</option>
                            @foreach ($employee as $item)
                                @if ($item->employee_id == Auth::user()->employee_id)
                                    <option disabled value="{{ $item->employee_id }}">{{ $item->f_name }} {{ $item->l_name }} <i class="bi bi-check-lg"></i></option>
                                    
                                @else
                                    <option value="{{ $item->employee_id }}">{{ $item->f_name }} {{ $item->l_name }}</option>
                                @endif
                                    
                            @endforeach
                        </select>
                        @error('employee-id')
                            <div class="input-group col-12 mb-3 alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3 col-12 ">
                        <span class="input-group-text text-white col-4 input-login">Mot de passe</span>
                        <input type="password" class="form-control input-login" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            placeholder="Entrer le mot de passe" name="password">
                    </div>
                    @error('password')
                        <div class="input-group col-12 mb-3 alert alert-danger"> {{ $message }} </div>
                    @enderror
                    <div class="input-group mb-3 col-12 ">
                       <select name="role" id="role" class="form-control">
                            <option value="" selected disabled>Sélectionner le rôle</option>
                            <option value="User">utilisateur</option>
                            <option value="Admin">Administrateur</option>
                            @if ( Auth::user()->role == "SuperAdmin")
                                <option value="SuperAdmin">Super Administrateur</option>
                            @endif
                            <option value="Supervisor">Superviseur</option>
                            
                            
                       </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" class="btn-login col-8 offset-2" value="Enregistrer">
                    </div>

            </div>
        </form>
    </main>

@endsection

@extends('layout/header')
@extends('layout/menu')