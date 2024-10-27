<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class TenantLaporanController extends Controller
{
   
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
    
        return view('tenant.laporans.index', compact('laporans', 'startDate', 'endDate', 'totalTunai', 'totalQr'));
    }
    public function create()
    {
        return view('tenant.laporans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'laporan_tunai' => 'required|numeric',
            'laporan_pengeluaran' => 'required|string',

        ]);

        Laporan::create([
            'laporan_tunai' => $request->laporan_tunai,
            'laporan_pengeluaran' => $request->laporan_pengeluaran,
        ]);

        return redirect()->route('tenant.laporans.index')->with('success', 'Laporan baru telah ditambahkan!');
    }

    public function edit(Laporan $laporan)
    {
        return view('tenant.laporans.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'laporan_tunai' => 'required|numeric',
            'laporan_pengeluaran' => 'required|string',
         ]);

        $laporan->update([
            'laporan_tunai' => $request->laporan_tunai,
            'laporan_pengeluaran' => $request->laporan_pengeluaran,
        ]);

        return redirect()->route('tenant.laporans.index')->with('success', 'Laporan berhasil diupdate!');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('tenant.laporans.index')->with('success', 'Laporan berhasil dihapus');
    }
}