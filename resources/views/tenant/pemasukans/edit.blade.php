@extends('tenant.layouts.app')

@section('title', 'Dashboard - Edit Pemasukan')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Update Pemasukan </h1>

  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form update Pemasukan</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('pemasukans.update', $pemasukan->id) }}" method="POST">
            @method('PUT')
            @csrf
       
            <div class="mb-3 row">
            <label for="product_id" class="col-sm-4 col-form-label">Produk</label>
              <div class="col-sm-8">
                  <select class="form-control" id="product_id" name="product_id" required>
                      <option value="">-- Pilih Produk --</option>
                      @foreach($products as $product)
                          <option value="{{ $product->id }}" 
                              {{ old('produk', $pemasukan->product) == $product->id ? 'selected' : '' }}>
                              {{ $product->product_name }} <!-- Assuming 'name' is the product name field -->
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
            <div class="mb-3 row">
              <label for="tunai" class="col-sm-4 col-form-label">Tunai</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="tunai" name="tunai"
                  value="{{ old('tunai', $pemasukan->tunai) }}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="qr" class="col-sm-4 col-form-label">QR</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="qr" name="qr"
                  value="{{ old('qr', $pemasukan->qr) }}" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Pemasukan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
