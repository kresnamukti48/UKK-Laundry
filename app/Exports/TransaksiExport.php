<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransaksiExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStrictNullComparison, WithColumnFormatting
{
    public $collection;

    protected $rowNumber = 0;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->collection;
    }

    /**
     * @var Seller
     */
    public function map($transaksi): array
    {
        return [
            ++$this->rowNumber,
            $transaksi->member->nama,
            Date::dateTimeToExcel(Carbon::createFromFormat('Y-m-d', $transaksi->tgl)),
            $transaksi->lama_pengerjaan,
            Date::dateTimeToExcel(Carbon::createFromFormat('Y-m-d', $transaksi->batas_waktu)),
            Date::dateTimeToExcel(Carbon::createFromFormat('Y-m-d', $transaksi->tgl_bayar)),
            $transaksi->status,
            $transaksi->dibayar,
            $transaksi->user->name,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Member',
            'Tanggal Transaksi',
            'Lama pengerjaan',
            'Batas Waktu',
            'Tanggal Bayar',
            'Status',
            'Dibayar',
            'Nama Kasir',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
