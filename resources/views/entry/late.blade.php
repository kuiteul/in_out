@extends('layout/template')

@section('title')
    Liste des présents
@endsection

@section('content')
<main class="col-8" style="margin-left: 1.5%">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">
        Liste des Retardataires du <?= now()->format('d-m-Y'); ?>
    </h2>
    <br>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <br>
        <table class="border table">
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Service</th>
                    <th>Date d'entrée</th>
                    <th>Heure d'entrée</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @method('POST')
            @foreach ($late as $item)

                <tr class="cursor">
                    <td>{{ $item->f_name }} {{ $item->l_name }}</td>
                    <td>{{ $item->service_name }}</td>
                    <td>{{ $item->date_in }}</td>
                    <td>{{ $item->hour_in }}</td>
                    <td><a href="mailto:{{$item->email}}" class="text-primary" alt="">Envoyer mail</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')