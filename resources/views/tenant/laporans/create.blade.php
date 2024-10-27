@extends('tenant.layouts.app')

@section('title', 'Tenant - Tambah Pengeluaran')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data Pengeluaran</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporans.store') }}" method="POST">
                        @csrf

                        <div class="mb-3 row">
                            <label for="laporan_pengeluaran" class="col-sm-4 col-form-label">Pengeluaran</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="laporan_pengeluaran"
                                    name="laporan_pengeluaran" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="laporan_tunai" class="col-sm-4 col-form-label">Tunai</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="laporan_tunai" name="laporan_tunai"
                                    required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Pengeluaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection