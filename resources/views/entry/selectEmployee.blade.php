@extends('layout/template')

@section('title')
    Liste des employés
@endsection

@section('content')
<main class="col-10 col-sm-7 offset-1">
    <div class="col-12 main-bar">
        <p class="fw-bold fs-5">Connecting the world</p>
    </div>
    <h2 class="text-center text-uppercase fw-bold fs-1 title col-12">Liste des employés</h2>
    @isset($success)
        <div class="alert alert-success col-12 text-center">{{ $success }}</div>
    @endisset
        <table class="border table">
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Active</th>
                    <th>Date d'entrée</th>
                    <th>Heure d'entrée</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @method('POST')
            @foreach ($employee as $item)
                <form action="validateEntry" method="post">
                    @csrf
                    @if(in_array($item->employee_id, $presence)) <!-- We check and element is present in the array. If so, we remove
                        and we continue. -->
                        <tr>
                            <td> {{ $item->full_name }} </td>
                            <td> {{ $item->Active }}</td>
                            <td><input disabled type="date" name="date_entry" id="date_entry"></td>
                            <td>
                                <input disabled type="time" name="hour_entry" id="hour_entry" >
                            </td>
                            <td><button disabled type="submit">Déjà arrivé</button></a></td>
                            <input disabled type="text" value=" {{ $item->service_id }}" name="service_id" hidden>
                            <input disabled type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                            <input disabled type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
                        </tr>
                        @continue
                    @else <!-- Otherwise We display it -->
                        <tr>
                            <td> {{ $item->full_name }} </td>
                            <td> {{ $item->Active }}</td>
                            <td><input type="date" name="date_entry" id="date_entry"></td>
                            <td>
                                <input type="time" name="hour_entry" id="hour_entry">
                            </td>
                            <td><button type="submit">Arrivé</button></a></td>
                            <input type="text" value=" {{ $item->service_id }}" name="service_id" hidden>
                            <input type="text" value="{{ $item->employee_id }}" name="employee_id" hidden>
                            <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden >
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