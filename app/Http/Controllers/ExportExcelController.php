<?php

namespace App\Http\Controllers;

use App\Exports\KasbonExport;
use App\Exports\NonKasbonExport;
use App\Exports\PertanggunganExport;
use App\Exports\SppdExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportExcelController extends Controller
{
    public function kasbonexport(Request $request)
    {

        $tglawal = $request->reg_start_date;
        $tglakhir = $request->reg_end_date;

        // if ($tglawal and $tglakhir) {
        //     $kasbon = Kasbon::whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
        // } else {
        //     $kasbon = Kasbon::all();
        // }

        return Excel::download(new KasbonExport($tglawal, $tglakhir), 'kasbon.xlsx');
        // return view('kasbon.cetak', compact('kasbon'));
    }

    public function nonkasbonexport(Request $request)
    {

        $tglawal = $request->reg_start_date;
        $tglakhir = $request->reg_end_date;

        // if ($tglawal and $tglakhir) {
        //     $kasbon = Kasbon::whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
        // } else {
        //     $kasbon = Kasbon::all();
        // }

        return Excel::download(new NonKasbonExport($tglawal, $tglakhir), 'nonkasbon.xlsx');
        // return view('kasbon.cetak', compact('kasbon'));
    }

    public function pertanggunganexport(Request $request)
    {

        $tglawal = $request->reg_start_date;
        $tglakhir = $request->reg_end_date;

        // if ($tglawal and $tglakhir) {
        //     $kasbon = Kasbon::whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
        // } else {
        //     $kasbon = Kasbon::all();
        // }

        return Excel::download(new PertanggunganExport($tglawal, $tglakhir), 'pertanggungan.xlsx');
        // return view('kasbon.cetak', compact('kasbon'));
    }

    public function sppdexport(Request $request)
    {

        $tglawal = $request->reg_start_date;
        $tglakhir = $request->reg_end_date;

        // if ($tglawal and $tglakhir) {
        //     $kasbon = Kasbon::whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
        // } else {
        //     $kasbon = Kasbon::all();
        // }

        return Excel::download(new SppdExport($tglawal, $tglakhir), 'sppd.xlsx');
        // return view('kasbon.cetak', compact('kasbon'));
    }
}
