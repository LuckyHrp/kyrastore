<?php

namespace App\Exports;

use App\Models\Nominal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NominalExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Nominal::with('product')->get();
    }

    public function map($nominal): array
    {
        return [
            $nominal->id,
            $nominal->product->name,
            $nominal->product->company,
            $nominal->name,
            $nominal->code,
            'Rp' . number_format($nominal->price, 0, ',', '.'),
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nama Game',
            'Company Game',
            'Nominal',
            'Code',
            'Price',
        ];
    }

    public function styles(Worksheet $sheet): array // 3. Buat method styles()
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
