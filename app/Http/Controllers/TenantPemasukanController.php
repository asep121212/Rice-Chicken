<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan; 
use App\Models\Product; 
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemasukanExport; 

class TenantPemasukanController extends Controller 
{
    public function export()
    {
        return Excel::download(new PemasukanExport, 'pemasukans.xlsx');
    }

    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $query = Pemasukan::query(); // Renamed model
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $pemasukans = $query->get();
    
        // Calculate totals
        $totalTunai = $pemasukans->sum('tunai');
        $totalQr = $pemasukans->sum('qr');
    
        return view('tenant.pemasukans.index', compact('pemasukans', 'startDate', 'endDate', 'totalTunai', 'totalQr'));
    }

    public function create()
    {
        $products = Product::all(); // Use Product model
        return view('tenant.pemasukans.create', compact('products')); // Pass products to view
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tunai' => 'required|numeric',
            'qr' => 'required|numeric',
        ]);

        Pemasukan::create([
            'product_id' => $request->product_id,
            'tunai' => $request->tunai,
            'qr' => $request->qr,
        ]);

        return redirect()->route('pemasukans.index')->with('success', 'Pemasukan baru telah ditambahkan!');
    }

    public function edit(Pemasukan $pemasukan)
    {
        $products = Product::all(); // Use Product model
        return view('tenant.pemasukans.edit', compact('pemasukan', 'products'));
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tunai' => 'required|numeric',
            'qr' => 'required|numeric',
        ]);

        $pemasukan->update([
            'product_id' => $request->product_id,
            'tunai' => $request->tunai,
            'qr' => $request->qr,
        ]);

        return redirect()->route('pemasukans.index')->with('success', 'Pemasukan berhasil diupdate!');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()->route('pemasukans.index')->with('success', 'Pemasukan berhasil dihapus');
    }
}
