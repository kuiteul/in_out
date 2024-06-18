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
        <a href="employee/create" class="col-12 text-primary">Ajouter un employé</a>
    </p>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des employés</h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <table class="border table">
        <thead>
            <tr>
                <th>Nom complet</th>
                <th>Addresse email</th>
                <th>Service</th>
                <th>Créé par </th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($employee as $item)
                <tr>
                    <td> {{ $item->full_name }} </td>
                    <td> {{ $item->employee_email }} </td>
                    <td> {{ $item->service_name }}</td>
                    <td> {{ $item->name}}</td>
                    <td><a href="employee/{{$item->employee_id}}" class="text-primary"> Gérer </a></td>
                </tr>
          @endforeach
        </tbody>
    </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')