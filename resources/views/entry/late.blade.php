@extends('layout/template')

@section('title')
    Liste des présents
@endsection

@section('content')
<main class="col-8" style="margin-left: 1.5%">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des Retardataires </h2>
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
            @foreach ($presence as $item)
                @foreach ($late as $item_late)
                    @if ($item->employee_id == $item_late->employee_id)
                        <form action="removeEntry" method="post">
                            @csrf
                            <tr>
                                <td> {{ $item->full_name }} </td>
                                <td>{{ $item->service_name }}</td>
                                <td> {{ $item->date_entries }}</td>
                                <td> {{ $item->hour_entries }}</td>
                                <!-- We hide this code to all people who are not a user
                                    We do it to put a fair treatement.
                                -->
        
                                @if ($user_log->user_type == "User")
                                    <td><button type="submit">Sortie</button></a></td>
                                    <input type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                                    <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
                                @endif
        
                                @if ($user_log->user_type == "Supervisor")
                                    <td><a href="mailto:{{ $item->employee_email}}" class="text-primary">Envoyer un mail</a></td>
                                    <input type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                                    <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
                                @endif
                            
                            </tr>
                        </form>
                    @endif
                @endforeach
                
            @endforeach
            </tbody>
        </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')