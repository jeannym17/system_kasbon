<?php

namespace App\Http\Controllers;

use App\Models\Kasbon;
use App\Models\User;
use App\Models\MonitoringSP;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonitoringSpController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $title = 'Monitoring SP';
        $kasbon = Kasbon::all();
        return view('msp.index', compact('title', 'kasbon', 'now'));
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            Kasbon::find($request->pk)->update([$request->name => $request->value]);

            return response()->json(['success' => true]);
        }
    }

    public function show(Request $request)
    {
    }
}
