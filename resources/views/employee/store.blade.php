@extends('layout/template')

@section('title')
    Confirmation de création
@endsection

@section('content')

<main class="col-7 offset-1">
        <div class="card col-8 offset-2">
            <div class="card-header col-12">
            Création Réussie !
            </div>
                <div class="card-body">
                <h5 class="card-title text-success">Création de l'employé</h5>
                <p class="card-text">L'employé a été créé avec succès.</p>
                <a href="/employee" class="btn btn-success col-12">Retour</a>
            </div>
        </div>

    @if(isset($result) && $result == "failed")
        <div class="card col-8 offset-2">
            <div class="card-header col-12 text-warning">
            ECHEC DE CREATION
            </div>
                <div class="card-body">
                <h5 class="card-title text-danger">Problème de doublon avec l'addresse email</h5>
                <p class="card-text">L'addresse email utilisé pour la création de cette employé est déjà utilisée</p>
                <p class="card-text">&Ccedil;a voudrait dire que l'utilisateur existe déjà ou vous devez renseigner une autre addresse</p>
                <a href="/employee" class="btn btn-warning col-12">Retour</a>
            </div>
        </div>
    @endisset
    

</main>
      
@endsection


@extends('layout/header')
@extends('layout/menu')