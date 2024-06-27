@extends('layout/template')

@section('title')
    Liste des présents
@endsection

@section('content')
<main class="col-8" style="margin-left: 1.5%">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des présents du 
         <?= now()->format('d-m-Y') ?>
    </h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
    <form action="search" method="POST" class="col-12 row ">
        @csrf
        <div class="col-4">
            <select name="service-id" id="service-id" class="form-control col-12 input-login">
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
                    <th>Date d'entrée</th>
                    <th>Heure d'entrée</th>
                    <th>Heure sortie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @method('POST')
            @foreach ($presence as $item)
                <form action="removeEntry" method="post">
                    @csrf
                    <tr>
                        <td> {{ $item->f_name }} {{ $item->l_name}} </td>
                        <td>{{ $item->service_name }}</td>
                        <td> {{ $item->date_in }}</td>
                        <td> {{ $item->hour_in }}</td>
                        <td>{{ $item->hour_out }}</td>
                        <td><a href="mailto:{{$item->email}}?Subject=RETARD OBSERV&Eacute;&amp;body=Bonjour 
                            {{ $item->f_name}} {{$item->l_name}},
                            pouvez-vous me donner la raison de votre retard ?" class="text-primary" alt="">Envoyer email</a></td>
                        <!-- We hide this code to all people who are not a user
                            We do it to put a fair treatement.
                        -->
                        @if (Auth::user()->role == "User")
                            <td>
                                <input type="time" name="hour-out" class="form-control" id="hour-out">
                            </td>                          
                        @endif

                        @if (Auth::user()->role == "User")
                            <td><button type="submit">Sortie</button></a></td>
                            <input type="text" value="{{ $item->in_out_id}}" name="in-out-id" hidden id="in-out-id">
                            <input type="text" value="{{ $item->employee_id }}" name="employee-id" hidden>
                            <input type="text" value="{{ Auth::user()->id }}" name="user-id" hidden >
                        @endif

                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')