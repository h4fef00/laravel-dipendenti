@extends('layout')
@section('content')
    <div class="row mx-0 mt-3">
        <div class="col-3">
            <form class="d-flex">
                <div class="input-group">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                    <span class="input-group-text btn"><i class="bi bi-search"></i></span>
                </div>
            </form>
        </div>
        <div class="col-3">
            <p class="mb-0">20 products found</p>
        </div>
        <div class="col-3">
            <p class="mb-0 d-inline">Sort By</p>
            <div class="btn-group">
                <a class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Price (lowest)
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#" class="dropdown-item">Price (highest)</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">Name (A-Z)</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">Name (Z-A)</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="row mt-2 mx-0">
        <div class="col-6">
            <p class="mb-0 text-bold">Category</p>
            <ul>
                <li><a href="">All</a></li>
                <li><a href="">Electronics</a></li>
                <li><a href="">Jewelery</a></li>
                <li><a href="">Men's clothing</a></li>
                <li><a href="">Women's clothing</a></li>
            </ul>
        </div>
    </div>
    <div class="row mt-3 mx-0">
        @foreach ($products as $product)
            <div class="col-lg-4 col-md-4 px-0 w-25">
                <x-product-card>
                    <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['description'] }}">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $product['title'] }}</h5>
                        <p class="card-text text-truncate">{{ $product['description'] }}</p>
                        <p class="card-text text-truncate">{{ $product['price'] }}</p>
                        <a href="/product/{{ $product['id'] }}" class="btn btn-primary">Go
                            somewhere</a>
                    </div>
                </x-product-card>
            </div>
        @endforeach
    </div>
@endsection
