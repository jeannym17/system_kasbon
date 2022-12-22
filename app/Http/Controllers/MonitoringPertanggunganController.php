<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanggungan;

class MonitoringPertanggunganController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:verifikator', ['only' => ['index', 'store', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $pertanggungan = Pertanggungan::all();
        $title = 'Monitoring Pertanggungan';
        return view('mkp.index', compact('pertanggungan', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
