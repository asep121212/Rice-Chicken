@extends('client.layouts.app')

@section('title', 'Nasi Kulit - Nasi')

@section('content')
@php
    $bestSellerProducts = \App\Models\Product::getBestSellerProducts();
@endphp

@if ($bestSellerProducts->count() > 0)
<div class="container my-5 py-5">
    <h4 class="text-light">Best Seller</h4>
    <div class="row mt-5 justify-content-center align-items-center">
        @foreach ($bestSellerProducts as $bestSellerProduct)
        <div class="col-md-4 mb-4">
            <div class="card bg-warning"> <!-- Sesuaikan dengan warna yang Anda inginkan -->
                <img src="{{ $bestSellerProduct->image !== 'null' ? asset('storage/products/' . $bestSellerProduct->image) : asset('client/img/' . $bestSellerProduct->id . '.jpg') }}" class="card-img-top img-fluid" alt="Produk">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-success fs-6 text-light">{{ $bestSellerProduct->product_name }} - {{ optional($bestSellerProduct->category)->category_name }}</h5>
                    @if($bestSellerProduct->price_discount > 0)
        <p class="card-text text-dark fs-6">
            <span class="text-decoration-line-through">Rp {{ number_format($bestSellerProduct->price, 0, ',', '.') }}</span>
        </p>
        <p class="card-text text-dark fs-6">
            Rp {{ number_format($bestSellerProduct->price_discount, 0, ',', '.') }}
        </p>
    @else
        <p class="card-text text-dark fs-6">
            Rp {{ number_format($bestSellerProduct->price, 0, ',', '.') }}
        </p>
    @endif                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<section>
    <div class="container my-5 py-5">
        <h4 class="text-light">Produk Kami</h4>
        <div class="row mt-5 justify-content-center align-items-center">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card bg-primary">
                    <img src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}" class="card-img-top img-fluid" alt="Produk">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-success fs-6 text-light">{{ $product->product_name }} - {{ optional($product->category)->category_name }}</h5>
                        @if($product->price_discount > 0)
        <p class="card-text text-dark fs-6">
            <span class="text-decoration-line-through">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
        </p>
        <p class="card-text text-dark fs-6">
            Rp {{ number_format($product->price_discount, 0, ',', '.') }}
        </p>
    @else
        <p class="card-text text-dark fs-6">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </p>
    @endif                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
