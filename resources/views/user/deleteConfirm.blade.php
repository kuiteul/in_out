@extends('layout/template')

@section('title')
    Confirmatio de la suppression
@endsection

@section('content')

<main class="col-7 offset-1">
    <div class="card col-8 offset-2">
        <div class="card-header col-12">
        Suppression
        </div>
            <div class="card-body">
            <h5 class="card-title text-success">Suppression Effectué</h5>
            <p class="card-text">L'utilisateur a été supprimer avec succès.</p>
            <a href="/users" class="btn btn-success col-12">Retour</a>
        </div>
    </div>

</main>
      
@endsection

@extends('layout/menu')
@extends('layout/header')