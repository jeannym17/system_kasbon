<?php

namespace App\Exports;

use App\Models\Pertanggungan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PertanggunganExport implements FromQuery,  WithMapping, WithHeadings, SkipsEmptyRows, WithColumnFormatting
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

        return Pertanggungan::query()->whereBetween('created_at', [$this->tglawal, $this->tglakhir]);
    }

    public function map($pertanggungan): array
    {
        return [
            Date::dateTimeToExcel($pertanggungan->kasbon->created_at),
            $pertanggungan->kasbon->nokasbon,
            $pertanggungan->kasbon->user->name,
            $pertanggungan->kasbon->kodekasbon->name,
            $pertanggungan->kasbon->jeniskasbon,
            $pertanggungan->kasbon->kurs->code,
            $pertanggungan->kasbon->total,
            $pertanggungan->kasbon->uraianpengguna,
            $pertanggungan->kasbon->tgltempo,
            $pertanggungan->kasbon->namavendor,
            $pertanggungan->kasbon->noinvoice,
            $pertanggungan->kasbon->spph,
            $pertanggungan->kasbon->po_vendor,
            $pertanggungan->kasbon->po_customer,
            $pertanggungan->kasbon->sjn,
            $pertanggungan->kasbon->proyek,
            $pertanggungan->kasbon->novkbkasbon,
            $pertanggungan->kasbon->nopi,
            $pertanggungan->kasbon->iddpp,
            $pertanggungan->kasbon->idppn,
            $pertanggungan->kasbon->transferke,
            $pertanggungan->kasbon->bank,
            $pertanggungan->kasbon->namarek,
            $pertanggungan->kasbon->norek,
            $pertanggungan->nilaiptj,
            $pertanggungan->tglptj,
            $pertanggungan->novkbselisihptj,
            $pertanggungan->nilaiselisihptj
        ];
    }
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'S' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'U' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'X' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
    public function headings(): array
    {
        return [
            'Tanggal Masuk',
            'No Kasbon',
            // 'Jam Masuk',
            'User',
            // 'Kasbon',
            'Kode Kasbon',
            'Jenis Kasbon',
            'Kurs',
            'Nominal Kasbon',
            'Uraian Penggunaan',
            'Tanggal Tempo',
            'Nama Vendor',
            'No Invoice',
            'SPPH',
            'PO Vendor',
            'PO Customer',
            'SJN',
            'Proyek',
            'No VKB Kasbon',
            'No PI',
            'DPP',
            'PPN',
            'Nilai PTJ',
            'Tanggal PTJ',
            'No VKB Selisih PTJ',
            'Nilai Selisih PTJ'
        ];
    }
    // public function collection()
    // {
    //     return Kasbon::all();
    // }
}
