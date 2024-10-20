<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetching existing data
        $totalProducts = DB::table('products')->count();
        $totalCategory = DB::table('categories')->count();
        $totalDiscount = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->where('sales.status', 'Selesai')
            ->sum('products.price_discount');
        $tasksCompletion = 50; // Example percentage
    
        // Fetching laporan data
        $laporanData = DB::table('laporans')
            ->select(
                DB::raw('SUM(laporan_tunai) as totalTunai'),
                DB::raw('SUM(laporan_pengeluaran) as totalPengeluaran')
            )
            ->first();
      $pemasukanData = DB::table('pemasukans')
            ->select(
                DB::raw('SUM(tunai) as totalTunais'),
                DB::raw('SUM(qr) as totalQr')
            )
            ->first();
    
        return view('tenant.index', compact('totalProducts', 'totalCategory', 'totalDiscount', 'tasksCompletion', 'laporanData','pemasukanData'));
    }}
