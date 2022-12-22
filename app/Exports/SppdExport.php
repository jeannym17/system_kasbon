<?php

namespace App\Exports;

use App\Models\sppd;
use App\Models\SPPDDetail;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class sppdExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings, SkipsEmptyRows
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

        return SPPDDetail::query()->whereBetween('created_at', [$this->tglawal, $this->tglakhir]);
    }

    public function map($sppddetail): array
    {
        return [
            Date::dateTimeToExcel($sppddetail->created_at),
            $sppddetail->id_sppd,
            $sppddetail->no,
            $sppddetail->sppd->no_sppd ?? '',
            $sppddetail->nip,
            $sppddetail->nama,
            $sppddetail->departemen,
            $sppddetail->sppd->jumlah ?? '',
            $sppddetail->hari,
            $sppddetail->tglberangkat,
            $sppddetail->tglpulang,
            $sppddetail->instansi,
            $sppddetail->ket,
            $sppddetail->proyek,
        ];
    }
    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            // 'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            // 'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            // 'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            // 'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
    public function headings(): array
    {
        return [
            'TANGGAL',
            'NO',
            'KODE KARYAWAN',
            'SPPD',
            'NIP',
            'NAMA',
            'DEPARTEMEN',
            'JUMLAH',
            'HARI',
            'TANGGAL DINAS',
            'TANGGAL PULANG',
            'TUJUAN',
            'KETERANGAN',
            'NO KONTRAK / ATAS PROYEK',
        ];
    }
    // public function collection()
    // {
    //     return Kasbon::all();
    // }
}
