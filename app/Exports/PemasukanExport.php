<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
class PemasukanExport implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function collection()
    {
        return Laporan::all(['laporan_pengeluaran','laporan_tunai']);
    }

    public function headings(): array
    {
        return [
            'laporan_pengeluaran',
            'laporan_tunai',
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
                $sheet->setCellValue('A1', 'Laporan Pemasukan');
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
                $sheet->setCellValue('A2', 'Pengeluaran');
                $sheet->setCellValue('B2', 'Pembayaran Tunai');

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
                    $sheet->setCellValue('A' . $rowIndex, $row['laporan_pengeluaran']);
                    $sheet->setCellValue('B' . $rowIndex, $row['laporan_tunai']);
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