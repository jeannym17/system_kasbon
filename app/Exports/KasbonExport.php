<?php

namespace App\Exports;

use App\Models\Kasbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;

// use Maatwebsite\Excel\Concerns\WithColumnWidths;

use Maatwebsite\Excel\Concerns\WithStyles;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KasbonExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings, SkipsEmptyRows, WithBackgroundColor, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Invoice::all();
    }

    public function startCell(): string
    {
        return 'B1';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            // $sheet->mergeCells('A1:E1')
        ];
    }

    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 15,
    //         'B' => 20, 
    //         'C' => 25,
    //         'D' => 15, 
    //         'E' => 20,
    //         'F' => 15, 
    //         'G' => 20,
    //         'H' => 55, 
    //         'I' => 25,
    //         'J' => 45, 
    //         'K' => 25,
    //         'L' => 25, 
    //         'M' => 25,
    //         'N' => 25, 
    //         'O' => 25,
    //         'P' => 45, 
    //         'Q' => 25,
    //         'R' => 25, 
    //         'S' => 25,
    //         'T' => 25, 
    //         'U' => 25,
    //         'V' => 25,   
    //         'W' => 25,
    //         'X' => 25,  
    //     ];
    // }

    public function backgroundColor()
    {
        // Return RGB color code.
        return 'FFF8DC';

        // Return a Color instance. The fill type will automatically be set to "solid"
        // return new Color(Color::COLOR_BLUE);

        // Or return the styles array
        // return [
        //     //  'fillType'   => Fill::FILL_GRADIENT_LINEAR,
        //      'startColor' => ['argb' => Color::COLOR_RED],
        // ];
    }
    public function __construct($tglawal, $tglakhir)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
    }

    public function query()
    {

        return Kasbon::query()->whereBetween('tglmasuk', [$this->tglawal, $this->tglakhir]);
    }

    public function map($kasbon): array
    {
        return [
            Date::dateTimeToExcel($kasbon->tglmasuk),
            $kasbon->nokasbon,
            $kasbon->user->name,
            $kasbon->kodekasbon->name,
            $kasbon->jeniskasbon,
            $kasbon->kurs->code,
            $kasbon->total,
            $kasbon->uraianpengguna,
            $kasbon->tgltempo,
            $kasbon->namavendor,
            $kasbon->noinvoice,
            $kasbon->spph,
            $kasbon->po_vendor,
            $kasbon->po_customer,
            $kasbon->sjn,
            $kasbon->proyek,
            $kasbon->novkbkasbon,
            $kasbon->nopi,
            $kasbon->iddpp,
            $kasbon->idppn,
            // $kasbon->pph->name,
            $kasbon->pertanggungan->nilaiptj ?? '',
            $kasbon->pertanggungan->tglptj ?? '',
            $kasbon->pertanggungan->novkbselisihptj ?? '',
            $kasbon->pertanggungan->nilaiselisihptj ?? '',
            $kasbon->id_bank,
            $kasbon->namarek,
            $kasbon->norek
        ];
    }
    public function columnFormats(): array
    {
        return [

            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'S' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'U' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'X' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'V' => NumberFormat::FORMAT_DATE_DDMMYYYY,


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
            'Nilai Selisih PTJ',
            'Nama Bank',
            'Nama Rekening',
            'Nomor Rekening',
        ];
    }

    // public function collection()
    // {
    //     return Kasbon::all();
    // }
}
