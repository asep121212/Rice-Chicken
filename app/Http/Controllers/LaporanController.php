<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function export()
    {
        return Excel::download(new LaporanExport, 'laporans.xlsx');
    }
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $query = Laporan::query();
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $laporans = $query->get();
    
        // Calculate totals
        $totalTunai = $laporans->sum('laporan_tunai');
        $totalQr = $laporans->sum('laporan_qr');
    
        return view('dashboard.laporans.index', compact('laporans', 'startDate', 'endDate', 'totalTunai', 'totalQr'));
    }
    public function create()
    {
        return view('dashboard.laporans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'laporan_menu' => 'required|string',
            'laporan_tunai' => 'required|numeric',
            'laporan_qr' => 'required|numeric',
            'laporan_pengeluaran' => 'required|numeric',

        ]);

        Laporan::create([
            'laporan_menu' => $request->laporan_menu,
            'laporan_tunai' => $request->laporan_tunai,
            'laporan_qr' => $request->laporan_qr,
            'laporan_pengeluaran' => $request->laporan_pengeluaran,
        ]);

        return redirect()->route('laporans.index')->with('success', 'Laporan baru telah ditambahkan!');
    }

    public function edit(Laporan $laporan)
    {
        return view('dashboard.laporans.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'laporan_menu' => 'required|string',
            'laporan_tunai' => 'required|numeric',
            'laporan_qr' => 'required|numeric',
            'laporan_pengeluaran' => 'required|numeric',
         ]);

        $laporan->update([
            'laporan_menu' => $request->laporan_menu,
            'laporan_tunai' => $request->laporan_tunai,
            'laporan_qr' => $request->laporan_qr,
            'laporan_pengeluaran' => $request->laporan_pengeluaran,
        ]);

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil diupdate!');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dihapus');
    }
}
