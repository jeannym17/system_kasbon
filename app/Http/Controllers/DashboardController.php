<?php

namespace App\Http\Controllers;

use App\Models\Kasbon;
use App\Models\Nonkasbon;
use App\Models\Pertanggungan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kasbons = Kasbon::latest()->take(5)->get();
        $thn = Carbon::now()->format('Y');
        $year = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $nonkasbon = [];
        foreach ($year as $key => $value) {
            $nonkasbon[] = Nonkasbon::whereYear('tglmasuk', '=', $thn)->where(\DB::raw("DATE_FORMAT(tglmasuk, '%m')"), $value)->count();
        }
        $kasbon = [];
        foreach ($year as $key => $value) {
            $kasbon[] = Kasbon::whereYear('tglmasuk', '=', $thn)->where(\DB::raw("DATE_FORMAT(tglmasuk, '%m')"), $value)->count();
        }
        $pertanggungan = [];
        foreach ($year as $key => $value) {
            $pertanggungan[] = Pertanggungan::whereYear('updated_at', '=', $thn)->where(\DB::raw("DATE_FORMAT(updated_at, '%m')"), $value)->count();
        }
        $totalksb =  Kasbon::whereYear('tglmasuk', '=', $thn)->sum('total');
        $jmlksb =  Kasbon::whereYear('tglmasuk', '=', $thn)->count();

        $totalnksb =  Nonkasbon::whereYear('tglmasuk', '=', $thn)->join('dokumen_nk', 'nonkasbons.id', '=', 'dokumen_nk.id_nonkasbon')->sum('total');
        $jmlnksb =  Nonkasbon::whereYear('tglmasuk', '=', $thn)->count();

        $totalksb =  Kasbon::whereYear('tglmasuk', '=', $thn)->sum('total');
        $jmlksb =  Kasbon::whereYear('tglmasuk', '=', $thn)->count();

        $totalptj =  Pertanggungan::whereYear('updated_at', '=', $thn)->sum('nilaiptj');
        $jmlptj =  Pertanggungan::whereYear('updated_at', '=', $thn)->count();

        $title = 'Dashboard';
        return view('dashboard', compact('title', 'kasbons', 'kasbon', 'totalksb', 'jmlksb', 'totalnksb', 'jmlnksb', 'totalptj', 'jmlptj'))->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('kasbon', json_encode($kasbon, JSON_NUMERIC_CHECK))->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('nonkasbon', json_encode($nonkasbon, JSON_NUMERIC_CHECK))->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('pertanggungan', json_encode($pertanggungan, JSON_NUMERIC_CHECK));
    }
}
