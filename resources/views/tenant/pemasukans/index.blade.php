@extends('tenant.layouts.app')

@section('title', 'Dashboard - Date Pemasukan')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Pemasukan</h1>
  <a class="btn btn-primary mb-3" href="{{ route('pemasukans.create') }}">Tambahkan Pemasukan</a>

  @if (session('success'))
    <div class="alert alert-success col-lg-4">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('pemasukans.index') }}" method="GET" class="mb-4">
    <div class="form-row">
      <div class="col-md-4">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
      </div>
      <div class="col-md-4">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
      </div>
      <div class="col-md-4 align-self-end">
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
        <a href="{{ route('pemasukans.index') }}" class="btn btn-secondary mt-2">Reset</a>
      </div>
    </div>
  </form>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemasukan</h6>
    </div>
    <a class="btn btn-success mb-3" href="{{ route('pemasukans.export') }}">Cetak Pemasukan ke Excel</a>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Tunai</th>
                        <th>QR</th>
                        <th>Tanggal</th> <!-- New Date Column -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Tunai</th>
                        <th>QR</th>
                        <th>Tanggal</th> <!-- New Date Column -->
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($pemasukans as $pemasukan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemasukan->product->product_name ?? 'Produk tidak ditemukan' }}</td>
                            <td>{{ $pemasukan->tunai }}</td>
                            <td>{{ $pemasukan->qr }}</td>
                            <td>{{ $pemasukan->created_at->format('d-m-Y') }}</td> <!-- Displaying the date -->
                            <td>
                                <form onsubmit="return confirm('Yakin ingin menghapus data?');" action="{{ route('pemasukans.destroy', $pemasukan->id) }}" method="POST">
                                    <a href="{{ route('pemasukans.edit', $pemasukan->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
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
