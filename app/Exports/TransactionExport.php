<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionExport implements FromCollection, WithMapping, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaction::with(['user', 'nominal'])->get();
    }

    public function map($trx): array
    {
        return [
            $trx->id,
            $trx->user->name,
            $trx->user->username,
            $trx->user->email,
            $trx->nominal->product->name,
            $trx->nominal->name,
            'Rp ' . number_format($trx->nominal->price, 0, ',', '.'),
            $trx->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Username',
            'Email',
            'Game',
            'Nominal',
            'Price',
            'Date',
        ];
    }

    public function styles(Worksheet $worksheet): array
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }




}
