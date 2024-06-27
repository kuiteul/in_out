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
                    <th>Date d'entrée</th>
                    <th>Heure d'entrée</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @method('POST')
                @foreach ($employee as $item)
                    <form action="{{ url('/validateEntry')}}" method="post">
                        @csrf
                    <!-- Otherwise We display it -->
                    
                        <input type="text" value="{{ $item->employee_id }}" name="employee-id" hidden> 
                            <tr>
                                <td> {{ $item->f_name }} {{ $item->l_name }}</td>
                                <td><input type="date" class="form-control" name="date-in" id="date_entry"></td>
                                <td>
                                    <input type="time" class="form-control" name="hour-in" id="hour_entry">
                                </td>
                                @if (in_array($item->employee_id, $in_presence))
                                    <td><button disabled class="btn btn-primary" type="submit">Déjà Arrivé</button></a></td>  
                                @else
                                    <td><button class="btn btn-primary" type="submit">Arrivé</button></a></td>  
                                @endif                                                   
                            </tr>                    
                        <input type="text" value="{{ Auth::user()->user_id }}" name="user-id" hidden >
                    </form>
                @endforeach
            </tbody>
        </table>

</main>
@endsection

@extends('layout/header')
@extends('layout/menu')