@extends('layout/template')

@section('title')
    Liste des utilisateurs
@endsection

@section('content')
<main class="col-10 col-sm-7 offset-1">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <p class="col-2 offset-10">
        <a href="users/create" class="col-12 text-primary">Ajouter un utilisateur</a>
    </p>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des utilisateurs</h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <table class="border table">
        <thead>
            <tr>
                <th>Nom complet</th>
                <th>Addresse email</th>
                <th>Type de compte</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($user as $item)
            @if ($item->user_type == "SuperAdmin" && $user_log->user_type != "SuperAdmin")
                
            @else
                <tr>
                <td> {{ $item->name }} </td>
                <td> {{ $item->email }} </td>
                <td> {{ $item->user_type }}</td>
                <td><a href="users/{{$item->id}}" class="text-primary"> Gérer </a></td>
                </tr>
            @endif
          @endforeach
        </tbody>
    </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')