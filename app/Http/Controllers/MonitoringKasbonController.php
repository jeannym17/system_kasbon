<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasbon;

class MonitoringKasbonController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:verifikator', ['only' => ['index', 'store', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $kasbon = Kasbon::all();
        $title = 'Monitoring Kasbon';
        return view('mkb.index', compact('kasbon', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
