@extends('layout/template')
@section('title')
    Gestion des utilisateurs
@endsection

@section('content')
    <main class="col-10 col-sm-7 offset-1">
            <div class="col-12 main-bar">
                <p class="fw-bold fs-5">Connecting the world</p>
            </div>
            <p class="col-2 offset-10">
                <a href="/service" class="col-12 text-primary">Liste des services</a>
            </p>
            <h2 class="text-center text-uppercase fw-bold fs-2 title col-12">Informations sur 
                @foreach ($service as $item)
                    {{ $item->service_name }}
                @endforeach
            </h2>
            <hr>
            @isset($success)
                <div class="alert alert-success col-12 text-center">{{ $success }}</div>
            @endisset
            <div class="col-10 offset-1">
                @foreach ($service as $item)
                    <div class="col-12">
                        @csrf
                        @method('DELETE')
                    
                        <div class="fs-4 col-10 offset-1 text-center"> 
                            <label for="nom" class="label col-5 text-end">Nom complet :  </label> 
                            <input type="text" disabled class="col-5 offset-1 border-0 title" value="{{ $item->service_name }}">
                        </div><br><br>
                        <div class="col-12 row">
                            <div class="fs-4 col-4 offset-1">
                                <a href="/service/{{ $item->service_id }}/edit"><button class="btn btn-primary input-login col-12 cursor fs-6">&Eacute;diter</button></a>
                            </div>
                            <form class="fs-4 col-4 offset-1" action="/service/{{ $item->service_id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger col-12">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
    </main>

@endsection

@extends('layout/header')
@extends('layout/menu')