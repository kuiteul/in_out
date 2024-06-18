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
                        <td> {{ $item->full_name }} </td>
                        <td>{{ $item->service_name }}</td>
                        <td> {{ $item->date_entries }}</td>
                        <td> {{ $item->hour_entries }}</td>
                        <!-- We hide this code to all people who are not a user
                            We do it to put a fair treatement.
                        -->
                        @if ($user_log->user_type == "User")
                            <td>
                                <input type="time" name="hour_out" class="form-control" id="hour_out">
                            </td>                          
                        @endif

                        @if ($user_log->user_type == "User")
                            <td><button type="submit">Sortie</button></a></td>
                            <input type="text" value="{{ $item->entries_id}}" name="entries_id" hidden id="entries_id">
                            <input type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                            <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
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