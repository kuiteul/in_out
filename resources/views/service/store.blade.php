@extends('layout/template')

@section('title')
    Confirmatio de création
@endsection

@section('content')

<main class="col-7 offset-1">
    <div class="card col-8 offset-2">
        <div class="card-header col-12">
        Création
        </div>
            <div class="card-body">
            <h5 class="card-title text-success">Création du service</h5>
            <p class="card-text">Le service a été créé avec succès.</p>
            <a href="/service" class="btn btn-success col-12">Retour</a>
        </div>
    </div>

</main>
      
@endsection

@extends('layout/menu')
@extends('layout/header')