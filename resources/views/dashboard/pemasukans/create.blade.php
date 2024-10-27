@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Pemasukan')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data Pemasukan</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pemasukan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pemasukans.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="product_id" class="col-sm-4 col-form-label">Produk
                                <span class="required-asterisk">*</span>
                            </label>
                            <div class="col-sm-6">
                                <select class="form-control" id="product_id" name="product_id" required>
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('produk') == $product->id ? 'selected' : '' }}>
                                        {{ $product->product_name }}
                                        <!-- Assuming 'name' is the product name field -->
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tunai" class="col-sm-4 col-form-label">Tunai
                                <span class="required-asterisk">*</span>

                            </label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="tunai" name="tunai" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="qr" class="col-sm-4 col-form-label">QR
                                <span class="required-asterisk">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="qr" name="qr" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Pemasukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection