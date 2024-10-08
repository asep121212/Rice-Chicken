<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Laporan::all(['laporan_menu', 'laporan_tunai', 'laporan_qr', 'laporan_pengeluaran']);
    }

    public function headings(): array
    {
        return [
            'laporan_menu',
            'laporan_tunai',
            'laporan_qr',
            'laporan_pengeluaran',
        ];
    }
}