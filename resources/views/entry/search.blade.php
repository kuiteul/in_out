@extends('layout/template')

@section('title')
    Recherche
@endsection

@section('content')
<main class="col-8" style="margin-left: 1.5%">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Faire une recherche</h2>
    <hr>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <form action="searchAll" method="POST" class="col-12 row ">
        @csrf
        <div class="col-3">
            <input type="date" class="form-control" name="date_start" id="date_start">
            @error('date_start')
                <div class="alert alert-danger col-12">{{ $message }} </div>
             @enderror
        </div>
        <div class="col-3">
            <input type="date" class="form-control" name="date_end" id="date_end">
            @error('date_end')
                <div class="alert alert-danger col-12">{{ $message }} </div>
            @enderror
        </div>
        <div class="col-3">
            <select name="employee" id="employee" class="form-control col-12 input-login">
                <option value="" disabled selected>Sélectionner l'employé</option>
                @foreach ($employee as $item)
                    <option value="{{ $item->employee_id }}">{{ $item->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2 position-relative">
            <button class="btn search-button col-12 position-absolute top">Rechercher</button>
        </div><br>
    </form>
    <br>
</main>
@endsection

@extends('layout/header')
@extends('layout/menu')