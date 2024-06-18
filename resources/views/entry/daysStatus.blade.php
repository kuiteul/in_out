@extends('layout/template')

@section('title')
    Liste des présents
@endsection

@section('content')
<main class="col-8" style="margin-left: 1.5%">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des présents</h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <form action="search" method="POST" class="col-12 row ">
        @csrf
        <div class="col-4">
            <select name="service_id" id="service_id" class="form-control col-12 input-login">
                <option value="" disabled selected>Rechercher par service</option>
                @foreach ($service as $item)
                    <option value="{{ $item->service_id }}">{{ $item->service_name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-3 position-relative">
            <button class="btn search-button col-12 position-absolute top">Rechercher</button>
        </div>
    </form>
    <br>
        <table class="border table">
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Heure d'entrée</th>
                    <th>Heure sortie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @method('POST')
            @foreach ($status as $item)
                <form action="removeEntry" method="post">
                    @csrf
                    @if ($item->hour_entries > "09:00")
                        <tr class="alert alert-danger">
                            <td> {{ $item->full_name }} </td>
                            <td>{{ $item->service_name }}</td>
                            <td> {{ $item->date_entries }}</td>
                            <td> {{ $item->hour_entries }}</td>
                            @if (empty($item->hour_out))
                                <td>Pas encore sorti(e)</td>
                            @else 
                                <td>{{ $item->hour_out }} </td>
                            @endif
                            
                            @if ($user_log->user_type == "Supervisor")
                                <td><a href="mailto:{{ $item->employee_email}}" class="text-primary">Envoyer un mail</a></td>
                                <input type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                                <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
                            @endif
                        
                        </tr>
                    @else 
                        <tr>
                            <td> {{ $item->full_name }} </td>
                            <td>{{ $item->service_name }}</td>
                            <td> {{ $item->date_entries }}</td>
                            <td> {{ $item->hour_entries }}</td>
                            @if (empty($item->hour_out))
                                <td>Pas encore sorti(e)</td>
                            @else 
                                <td>{{ $item->hour_out }} </td>
                            @endif
                            
                            @if ($user_log->user_type == "Supervisor")
                                <td>Aucune action</td>
                                <input type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                                <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
                            @endif
                        
                        </tr>
                    @endif
                    
                </form>
            @endforeach
            </tbody>
        </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')