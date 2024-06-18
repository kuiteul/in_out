@extends('layout/template')

@section('title')
    Liste des présents
@endsection

@section('content')
<main class="col-8" style="margin-left: 1.5%">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Resultat de la recherche</h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
   
    <br>
    @if(count($employee) == 1)
        <div class="alert alert-warning fs-4 text-center col-8 offset-2">La date de début est supérieur à la date de fin</div>
        <div class="col-3 offset-6">
            <a href="{{ url('search')}}" class="text-primary">Retour</a>
        </div>
    @else 
        <table class="table">
            <thead>
                <th>Employé</th>
                <th>Service</th>
                <th>Date d'entrée</th>
                <th>Heure d'entrée</th>
                <th>Heure de sortie</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($employee as $item)
                    @if ($item->hour_entries > "09:00")
                    <tr class="alert alert-danger">
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->service_name }}</td>
                        <td>{{ $item->date_entries }}</td>
                        <td>{{ $item->hour_entries }}</td>
                        <td>{{ $item->hour_out }}</td>
                        <td><a href="mailto:{{ $item->employee_email}}" class="text-primary" alt='#'>Envoyer un mail</a></td>
                    </tr>
                    @else
                        <tr>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->service_name }}</td>
                            <td>{{ $item->date_entries }}</td>
                            <td>{{ $item->hour_entries }}</td>
                            <td>{{ $item->hour_out }}</td>
                            <td> </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif

    
</main>
@endsection

@extends('layout/header')
@extends('layout/menu')