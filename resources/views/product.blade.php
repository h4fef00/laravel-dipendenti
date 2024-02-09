@extends('layout')
@section('content')
    <div class="d-flex justify-content-around">
        {{-- immagine sulla destra --}}
        <div>
            <img src="{{ $product['image'] }}" class="">
        </div>

        <div class="">
            {{-- titolo e dati con bottone aggiungi al carrello --}}
            <div class="row">
                <h2>{{ $product['title'] }}</h2>
                <h5>{{ $product['category'] }}</h5>
                <p>{{ $product['description'] }}</p>
                {{-- <p>{{ $product['price'] }}</p> --}}
                <p>{{ $product['price'] }}</p>
                <div class="row">
                    <button class="btn btn-success">Aggiungi al carrello <span><i class="bi bi-cart"></i></span></button>
                </div>
            </div>
        </div>
    </div>
@endsection
