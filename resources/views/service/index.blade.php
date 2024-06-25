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
        <a href="service/create" class="col-12 text-primary">Ajouter un service</a>
    </p>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des services</h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <table class="border table">
        <thead>
            <tr>
                <th>Service ID </th>
                <th>Serice name</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($service as $item)
                <tr onclick="document.location.href='/service/{{ $item->service_id }}'" class="cursor">
                    <td> {{ $item->service_id }}</td>
                    <td> {{ $item->service_name }} </td>
                    <td> {{ $item->created_at }}</td>
                </tr>
          @endforeach
        </tbody>
    </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')