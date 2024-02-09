@extends('layout')
@section('content')
    @csrf
    <h1 class="text-center">Lista dipendenti</h1>
    <a class="btn btn-success" href="/create">Aggiungi dipendente</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dipendenti as $dipendente)
                <tr>
                    <td scope="row">{{ $dipendente->id }}</td>
                    <td>{{ $dipendente->name }}</td>
                    <td>{{ $dipendente->surname }}</td>
                    <td>{{ $dipendente->email }}</td>
                    <td><a class="btn btn-warning" href="/create/{{ $dipendente['id'] }}">Modifica</a></td>
                    <td><a class="btn btn-danger" onclick="eliminaDipendente({{ $dipendente->id }})"">Elimina</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- import per css e js --}}
@section('css')
    @include('dipendenti.index.assets.css')
@endsection
@section('scripts')
    @parent
    @include('dipendenti.index.assets.js')
@endsection
