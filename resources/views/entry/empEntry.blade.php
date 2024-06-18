@extends('layout.template')
@section('title')
    Entrée des employés
@endsection

@section('content')
    
    <main class="col-10 col-sm-7 offset-1">
        <div class="col-12 main-bar">
            <p class="fw-bold fs-5">Connecting the world</p>
        </div>
        <p class="col-2 offset-10">
            <a href="/employee" class="col-12 text-primary">Liste des employés</a>
        </p>
        <h2 class="text-center  text-uppercase fw-bold fs-1 title col-12">Arrivée des employés</h2>
        <hr>
        <!-- 
            |
            | Formulaire de création de ticket 
            |
        -->
        <form action="/employee" class="col-12" method="POST">
            @csrf <!-- Clé de contrôle du formulaire -->
            @method('GET')
            @isset($error)
                <div class="col-12 alert alert-danger text-center">{{ $error }}</div>
            @endisset
            <div class="col-6 offset-3">
                    <div class="input-group mb-3 col-12 ">
                       <select name="service_id" id="service_id" class="form-control">
                            <option value="" selected disabled>Sélectionner le service</option>
                            @foreach ($service as $item)
                                <option value="{{ $item->service_id }}">{{ $item->service_name }} </option>
                            @endforeach
                            
                       </select>
                    </div>
                    @error('service_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="employee"></div>
                    <div class="input-group mb-3" id="submit">
                        <input type="submit" class="btn-login col-8 offset-2" value="Continuer ->">
                    </div>

            </div>
            
        </form>
    </main>

@endsection

@extends('layout/header')
@extends('layout/menu')