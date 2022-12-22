<?php

namespace App\Http\Controllers;

use App\Models\Nonkasbon;
use App\Models\KeteranganNonKasbon;
use App\Http\Requests\UpdateNonkasbonRequest;
use App\Models\Kurs;
use App\Models\NamaVendor;
use App\Models\Jenis;
use App\Models\Pph;
use App\Models\VerifikasiNonKasbon;
use App\Models\KodeKasbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class NonKasbonAtasanUser3Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:atasan-user-3', ['only' => ['index', 'store', 'create',  'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        if (Auth::user()->hasRole('ADMIN')  == 'ADMIN') {
            $nonkasbon = Nonkasbon::all();
        } else {
            $nonkasbon = Nonkasbon::where('id_unit', Auth::user()->id_unit)->get();
        }
        $title = 'nonkasbon';
        return view('vnk-atasan-user-3.index', compact('nonkasbon', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $nonkasbon = Nonkasbon::find($id);
        $title = 'Non Kasbon';
        return view('vnk-atasan-user-3.lihat-nonkasbon', compact('nonkasbon', 'title'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $nonkasbon = nonkasbon::find($id);
        $now = Carbon::now('Asia/Jakarta');
        DB::transaction(function () use ($nonkasbon, $request, $id) {
            $now = Carbon::now('Asia/Jakarta');
            // foreach ($request->kekurangan as $key => $kekurangan) {
            //     $data = new KeteranganNonKasbon();
            //     $data->id_nonkasbon = $id;
            //     $data->keterangan = $kekurangan;
            //     $data->save();
            // }

            if ($nonkasbon->verifikasinonkasbon->vnk_a_13 = $request->Input('status') == 'Terverifikasi') {
                $nonkasbon->verifikasinonkasbon->vnk_a_13 = $request->Input('status');
                $nonkasbon->verifikasinonkasbon->vnk = 'Dalam Proses';
            } elseif ($nonkasbon->verifikasinonkasbon->vnk_a_13 = $request->Input('status') == 'Ditolak') {
                $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
            } else {
                $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
            }

            KeterangannonKasbon::insertGetId([
                'id_nonkasbon' => $id,
                'keterangan' => $request->Input('keterangan'),
                'created_at' => $now,
                'updated_at' => $now
            ]);

            $nonkasbon->verifikasinonkasbon->tgl_vnk_a_13 = $now;
            $nonkasbon->verifikasinonkasbon->id_vnk_a_13 = Auth::user()->id;
            $nonkasbon->verifikasinonkasbon->updated_at = $now;
            $nonkasbon->verifikasinonkasbon->save();
        });

        return redirect()->route('vnk-atasan-user-3.index')
            ->with('success', 'nonkasbon berhasil diverifikasi');
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $now = Carbon::now('Asia/Jakarta');
            $nonkasbon = nonkasbon::find($id);
            if ($nonkasbon->verifikasinonkasbon->vnk_a_13 = $request->Input('status') == 'Terverifikasi') {
                $nonkasbon->verifikasinonkasbon->vnk = 'Dalam Proses';
            } elseif ($nonkasbon->verifikasinonkasbon->vnk_a_13 = $request->Input('status') == 'Ditolak') {
                $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
            } else {
                $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
            }
            $nonkasbon->verifikasinonkasbon->update([
                'tgl_vnk_a_13' => $now,
                'vnk_a_13' => $request->Input('status'),
                'id_vnk_a_13' => Auth::user()->id,
                'updated_at' =>  $now
            ]);
            $keterangan = Keterangannonkasbon::updateOrCreate(
                ['id_nonkasbon' => $nonkasbon->id],
                ['keterangan' => $request->Input('keterangan'), 'updated_at' => $now]
            );
        });
        return redirect()->route('vnk-atasan-user-3.index')->with('success', 'Non Kasbon updated successfully');
    }
}
