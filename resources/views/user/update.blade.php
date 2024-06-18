@extends('layout/template')

@section('title')
    Confirmatio de la mise à jour
@endsection

@section('content')

<main class="col-7 offset-1">
    <div class="card col-8 offset-2">
        <div class="card-header col-12">
        Mise à jour
        </div>
            <div class="card-body">
            <h5 class="card-title text-success">Mise à jour Effectué</h5>
            <p class="card-text">L'utilisateur a été mis à jour avec succès.</p>
            <a href="/users" class="btn btn-success col-12">Retour</a>
        </div>
    </div>

</main>
      
@endsection

@extends('layout/menu')
@extends('layout/header')