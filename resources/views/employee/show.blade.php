@extends('layout/template')
@section('title')
    Gestion des employés
@endsection

@section('content')
    <main class="col-10 col-sm-7 offset-1">
            <div class="col-12 main-bar">
                <p class="fw-bold fs-5">Connecting the world</p>
            </div>
            <p class="col-2 offset-10">
                <a href="/employee" class="col-12 text-primary">Liste des employés</a>
            </p>
            <h2 class="text-center text-uppercase fw-bold fs-2 title col-12">Informations sur 
                @foreach ($employee as $item)
                    {{ $item->full_name }}
                @endforeach
            </h2>
            <hr>
            @isset($success)
                <div class="alert alert-success col-12 text-center">{{ $success }}</div>
            @endisset
            <div class="col-10 offset-1">
                @foreach ($employee as $item)
                <div>
                    @csrf
                
                    <div class="fs-4 col-10 offset-1 text-center"> 
                        <label for="nom" class="label col-5 text-end">Nom complet :  </label> 
                        <input type="text" disabled class="col-5 offset-1 border-0 title" value="{{ $item->f_name }} {{ $item->l_name }}">
                    </div>
                    <div class="fs-4 col-10 offset-1 text-center"> 
                        <label for="nom" class="label col-5 text-end">Email :  </label> 
                        <input type="text" disabled class="col-5 offset-1 border-0 title" value="{{ $item->email }}">
                    </div>
                    <div class="fs-4 col-10 offset-1 text-center"> 
                        <label for="nom" class="label col-5 text-end">Telephone :  </label> 
                        <input type="text" disabled class="col-5 offset-1 border-0 title" value="{{ $item->telephone }}">
                    </div>
                    <div class="fs-4 col-10 offset-1 text-center"> 
                        <label for="nom" class="label col-5 text-end">Service affecté :  </label> 
                        <input type="text" disabled class="col-5 offset-1 border-0 title" value="{{ $item->service_name }}">
                    </div>
                    <div class="fs-4 col-10 offset-1 text-center"> 
                        <label for="nom" class="label col-5 text-end">Date de création :  </label> 
                        <input type="text" disabled class="col-5 offset-1 border-0 title" value="{{ $item->created_at }}">
                    </div>
                    <hr >
                    <div class="col-12 row">
                        <div class="fs-4 col-4 offset-2"> 
                            <a href="/employee/{{ $item->employee_id }}/edit"><button class="btn input-login col-12 cursor fs-6">&Eacute;diter</button></a>
                        </div>
                        <div class="fs-4 col-4"> 
                            <button type="submit" class="btn btn-danger col-12">Supprimer</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </main>

@endsection

@extends('layout/header')
@extends('layout/menu')