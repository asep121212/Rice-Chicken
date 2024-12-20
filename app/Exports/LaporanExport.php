<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class LaporanExport implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize
{
    public function collection()
    {
        return Pemasukan::with('product') // Ensure relationship is loaded
            ->get()
            ->map(function ($pemasukan) {
                return [
                    'product_name' => $pemasukan->product ? $pemasukan->product->product_name : 'N/A',
                    'tunai' => $pemasukan->tunai,
                    'qr' => $pemasukan->qr,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'Pembayaran Tunai',
            'Pembayaran QR',
        ];
    }

    public function title(): string
    {
        return 'Laporan Pengeluaran';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Main Report Title
                $sheet->mergeCells('A1:C1');
                $sheet->setCellValue('A1', 'Laporan Pengeluaran');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(18);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                // Row height adjustments
                $sheet->getRowDimension('1')->setRowHeight(40);  // Title row
                $sheet->getRowDimension('2')->setRowHeight(30);  // Headings row

                // Add logo to the header
                $drawing = new Drawing();
                $drawing->setName('Logo');
                $drawing->setPath(public_path('client/img/logo.png')); // Adjust the path to your logo
                $drawing->setHeight(50); // Adjust the height as needed
                $drawing->setCoordinates('A1'); // Place logo in the first cell
                $drawing->setWorksheet($sheet);

                // Styling for Header Row (Row 2)
                $sheet->setCellValue('A2', 'Nama Produk');
                $sheet->setCellValue('B2', 'Pembayaran Tunai');
                $sheet->setCellValue('C2', 'Pembayaran QR');

                $sheet->getStyle('A2:C2')->getFont()->setBold(true);
                $sheet->getStyle('A2:C2')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A2:C2')->getAlignment()->setVertical('center');
                $sheet->getStyle('A2:C2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFD9D9D9'); // Light grey background for headings

                // Inserting data below the headings
                $data = $this->collection();
                $rowIndex = 3; // Start from row 3 (after title and headings)

                foreach ($data as $row) {
                    $sheet->setCellValue('A' . $rowIndex, $row['product_name']);
                    $sheet->setCellValue('B' . $rowIndex, $row['tunai']);
                    $sheet->setCellValue('C' . $rowIndex, $row['qr']);
                    $rowIndex++;
                }

                // Borders for header and data rows
                $sheet->getStyle('A2:C2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('A3:C' . ($rowIndex - 1))
                    ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            },
        ];
    }
}