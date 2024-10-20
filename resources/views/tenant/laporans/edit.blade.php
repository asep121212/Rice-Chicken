@extends('tenant.layouts.app')

@section('title', 'Tenant - Edit Pengeluaran')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Update Pengeluaran </h1>

  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form update Pengeluaran</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('laporans.update', $laporan->id) }}" method="POST">
            @method('PUT')
            @csrf
             <div class="mb-3 row">
              <label for="laporan_pengeluaran" class="col-sm-4 col-form-label">Pengeluaran</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="laporan_pengeluaran" name="laporan_pengeluaran"
                  value="{{ old('laporan_pengeluaran', $laporan->laporan_pengeluaran) }}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="laporan_tunai" class="col-sm-4 col-form-label">Tunai</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="laporan_tunai" name="laporan_tunai"
                  value="{{ old('laporan_tunai', $laporan->laporan_tunai) }}" required>
              </div>
            </div>
    
          
            <button type="submit" class="btn btn-primary">Update Pengeluaran</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
