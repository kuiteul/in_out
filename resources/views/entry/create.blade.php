@extends('layout.template')
@section('title')
    Entrée des employés
@endsection

@section('content')
    
    <main class="col-10 col-sm-7 offset-1">
        <div class="col-12 main-bar">
            <p class="fw-bold fs-5">Connecting the world</p>
        </div>
        <h2 class="text-center  text-uppercase fw-bold fs-1 title col-12">Arrivée des employés</h2>
        <hr>
        <!-- 
            |
            | Formulaire de création de ticket 
            |
        -->
        <form action="/selectEmployee" class="col-12" method="POST">
            @csrf <!-- Clé de contrôle du formulaire -->
            @isset($error)
                <div class="col-12 alert alert-danger text-center">{{ $error }}</div>
            @endisset
            <div class="col-6 offset-3">
                @if ($user_log->user_type != "User")

                    <h2 class="text-center text-warning text-upper">Your privilege don't allow you to make this action</h2>
                @else
                    <div class="input-group mb-3 col-12 ">
                       <select name="service_id" id="service_id" class="form-control">
                            <option value="" selected disabled>Sélectionner le service</option>
                            @foreach ($service as $item)
                                <option value="{{ $item->service_id }}">{{ $item->service_name }} </option>
                            @endforeach
                            
                       </select>
                    </div>
                    <div id="employee"></div>
                    <div class="input-group mb-3" id="submit">
                        <input type="submit" class="btn-login col-8 offset-2" value="Continuer ->">
                    </div>
                @endif
            </div>
            
        </form>
    </main>

@endsection

@extends('layout/header')
@extends('layout/menu')