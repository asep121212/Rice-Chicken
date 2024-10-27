@extends('tenant.layouts.app')

@section('title', 'Tenant - Date Pengeluaran')

@push('css')
<link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<h1 class="h3 mb-4 text-gray-800">Pengeluaran</h1>
<a class="btn btn-primary mb-3" href="{{ route('laporans.create') }}">Tambahkan Pengeluaran</a>

@if (session('success'))
<div class="alert alert-success col-lg-4">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('laporans.index') }}" method="GET" class="mb-4">
    <div class="form-row">
        <div class="col-md-4">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
                value="{{ request('start_date') }}">
        </div>
        <div class="col-md-4">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-primary mt-2">Filter</button>
            <a href="{{ route('laporans.index') }}" class="btn btn-secondary mt-2">Reset</a>
        </div>
    </div>
</form>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
    </div>
    <a class="btn btn-success mb-3" href="{{ route('pemasukans.export') }}">Cetak Pengeluaran ke Excel</a>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pengeluaran</th>
                        <th>Tunai</th>
                        <th>Tanggal</th> <!-- New Date Column -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Pengeluaran</th>
                        <th>Tunai</th>
                        <th>Tanggal</th> <!-- New Date Column -->
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($laporans as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->laporan_pengeluaran }}</td>
                        <td>{{ $laporan->laporan_tunai }}</td>
                        <td>{{ $laporan->created_at->format('d-m-Y') }}</td> <!-- Displaying the date -->
                        <td>
                            <form onsubmit="return confirm('Yakin ingin menghapus data?');"
                                action="{{ route('laporans.destroy', $laporan->id) }}" method="POST">
                                <a href="{{ route('laporans.edit', $laporan->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data kosong.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <h5>Total Tunai: Rp{{ number_format($totalTunai, 0, ',', '.') }}</h5>
            <h5>Total QR: Rp{{ number_format($totalQr, 0, ',', '.') }}</h5>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('/') }}dash/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}dash/js/demo/datatables-demo.js"></script>
@endpush