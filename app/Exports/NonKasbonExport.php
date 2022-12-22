<?php

namespace App\Exports;

use App\Models\nonkasbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class NonkasbonExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings, SkipsEmptyRows
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($tglawal, $tglakhir)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
    }

    public function query()
    {

        return nonkasbon::query()->whereBetween('created_at', [$this->tglawal, $this->tglakhir]);
    }

    public function map($nonkasbon): array
    {
        return [
            Date::dateTimeToExcel($nonkasbon->created_at),
            $nonkasbon->no_nonkasbon,
            // $nonkasbon->tglmasuk,
            $nonkasbon->doksebelumnya,
            $nonkasbon->user->name,
            $nonkasbon->kodekasbon,
            $nonkasbon->jenis,
            $nonkasbon->tujuanpembayaran,
            $nonkasbon->namavendor,
            $nonkasbon->noinvoice,
            $nonkasbon->iddpp,
            $nonkasbon->idppn,
            $nonkasbon->total,
            $nonkasbon->proyek
        ];
    }
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            // 'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
    public function headings(): array
    {
        return [
            'Tanggal Masuk',
            'No Non Kasbon',
            'Dokumen Sebelumnya',
            'User',
            'Kode Kasbon',
            'Jenis Kasbon',
            'Uraian Penggunaan',
            'Nama Vendor',
            'No Invoice',
            'DPP',
            'PPN',
            'Total',
            'Proyek'
        ];
    }
    // public function collection()
    // {
    //     return Kasbon::all();
    // }
}
