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
    <form action="/searchPresence" method="POST" class="col-12 row ">
        @csrf
        <div class="col-4">
            <select name="service-id" id="service_id" class="form-control col-12 input-login">
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
                    <th>Date sortie</th>
                    <th>Heure sortie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @method('POST')
            @foreach ($presence as $item)
                <form action="removeEntry/{{ $item->employee_id }}" method="post">
                    @csrf
                    @foreach ($service as $item_service)
            
                        @if ($item->service_id == $item_service->service_id)
                            <tr>
                                <td> {{ $item->f_name }} {{ $item->l_name}} </td>
                                <td>{{ $item->service_name }}</td>
                                <td> <input type="date" name="date-out" id="date-out" class="form-control"></td>
                            <td> <input type="time" name="hour-out" id="hour-out" class="form-control"></td>
                            @if (empty($item->hour_out))
                                <td>Pas encore sorti(e)</td>
                            @endif
                            
                            @if (Auth::user()->role == "Supervisor")
                                <td><a href="mailto:{{ $item->employee_email}}" class="text-primary">Envoyer un mail</a></td>
                                <input type="text" value="{{ $item->employee_id }}" name="employee-id" hidden>
                                <input type="text" value="{{ Auth::user()->user_id }}" name="user-id" hidden >
                            @else 
                                <td><button type="submit" class="btn btn-danger">Sortie</button></td>
                            @endif

                            </tr>
                        @endif
                    @endforeach
                    
                </form>
            @endforeach
            </tbody>
        </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')