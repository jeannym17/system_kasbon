<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nonkasbon;

class MonitoringNonKasbonController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:verifikator', ['only' => ['index', 'store', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $nonkasbon = Nonkasbon::all();
        $title = 'Monitoring Non Kasbon';
        return view('mnk.index', compact('nonkasbon', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
