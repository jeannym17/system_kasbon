<?php

namespace App\Http\Controllers;

use App\Models\Nonkasbon;
use App\Models\User;
use App\Models\Kurs;
use App\Models\NamaVendor;
use App\Models\Jenis;
use App\Models\Pph;
use App\Models\VerifikasiNonKasbon;
use App\Models\KeteranganNonKasbon;
use App\Models\KodeKasbon;
use App\Models\DokumenNKD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;
use Romans\Filter\IntToRoman;
use DateInterval;
use DateTime;

class NonkasbonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:nonkasbon', ['only' => ['index', 'show', 'create', 'store', 'store1', 'edit', 'update', 'destroy', 'verifikasi']]);
    }
    public function index()
    {
        $title = 'Non Kasbon';
        if (Auth::user()->hasRole('ADMIN')  == 'ADMIN') {
            $nonkasbon = Nonkasbon::all();
        } else {
            // $nonkasbon = Nonkasbon::where('id_unit', Auth::user()->id_unit)->get();
            $nonkasbon = Nonkasbon::all();
        }
        return view('nonkasbon.index', compact('nonkasbon', 'title'));
    }

    public function findUser(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = User::orderby('nip', 'asc')->select('nip', 'id_unit', 'name')->limit(5)->get();
        } else {
            $employees = User::orderby('nip', 'asc')->select('nip', 'id_unit', 'name')->where('nip', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("label" => $employee->nip, "unit" => $employee->unit->name, "name" => $employee->name);
        }

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nonkasbon = Nonkasbon::all();
        $title = 'Nonkasbon';
        $dueDate = now()->addDays(30)->format('Y-m-d');
        $pph = Pph::all();
        $kurs = Kurs::all();
        $namavendor = NamaVendor::all();
        $jenis = Jenis::all();
        $kodekasbon = KodeKasbon::all();
        $now = Carbon::now('Asia/Jakarta');
        $jamnow = Carbon::now()->setTimezone('Asia/Jakarta')->format('H:i:s');
        $filter = new IntToRoman();
        $thnBulan = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');
        $result = $filter->filter($bulan);
        $cek = NonKasbon::count();
        $tglmasuk = Carbon::now()->format('Y-m-d');
        $terakhir = NonKasbon::query()->latest('id')->first();
        if ($cek == 0) {
            $urut = 0;
            $nomer = 'NK' . '/' . $urut . '/' . $result . '/' . $thnBulan;
        } else {
            $ambil = NonKasbon::all()->last();
            $urut = (int)substr($ambil->no_nonkasbon, 3) + 1;
            $nomer = 'NK' . '/' . $urut . '/' . $result . '/' . $thnBulan;
        }
        return view('nonkasbon.create', compact('title', 'nonkasbon', 'nomer', 'terakhir', 'kurs', 'jenis', 'tglmasuk', 'pph', 'dueDate', 'jamnow', 'kodekasbon', 'namavendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNonkasbonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            // 'tglmasuk' => 'required',
            // 'tglptj' => 'required',
            // 'selisihptjakhir' => 'required',
            // 'novkbselisihptj' => 'required',
            // 'nilaiselisihptj' => 'required',
        ]);
        DB::transaction(function () use ($request) {
            $id = $request->id;
            $nonkasbon = Nonkasbon::find($id);
            $thn = Carbon::now()->format('y');
            $bln = Carbon::now()->format('m');
            $now = Carbon::now('Asia/Jakarta');
            $thnBulan = $now->year . $now->month . $now->day;
            $cek = NonKasbon::count();

            if ($cek == 0) {
                // $urut = 100001;
                $nomer = 'NK' . '/' . 0 . '/' . $bln . '/' . $thn;
                $terakhir = 'NK/0/11/22';
            } else {
                $ambil = NonKasbon::all()->last();
                $urut = (int)substr($ambil->no_nonkasbon, 3) + 1;
                $nomer = 'NK' . '/' . $urut . '/' . $bln . '/' . $thn;
                $uru_t = (int)substr($ambil->no_nonkasbon, -1) + 1;
                $terakhirt = NonKasbon::query()->latest('id')->first();
                $terakhir = $terakhirt->no_nonkasbon;
            }

            if ($request->id_kurs == 42) {
                $iddpp = Str::replace(',', '', $request->iddpp);
                $idppn = Str::replace(',', '', $request->iddpp);
                $idpph = Str::replace(',', '', $request->idpph);
                $total = Str::replace(',', '', $request->iddpp);
                +Str::replace(',', '', $request->iddpp);
                -Str::replace(',', '', $request->idpph);
                $ktotal = $total;
            } else {
                $iddpp = Str::replace(',', '', $request->iddpp1);
                $idppn = 0;
                $idpph = 0;
                $total =  Str::replace(',', '', $request->iddpp1);
                $konversi =  Str::replace(',', '', $request->konversi);
                $hkonversi = $total * $konversi;
                $ktotal = Str::replace(',', '', $hkonversi);
            }

            $nip = $request->nip;
            $user = User::where('nip', '=', $nip)->first();
            $id_user = $user->id;
            $name_user = $user->name;
            $id_unit = $user->id_unit;

            $vendor = DB::table('nama_vendor')->where('name', $request->namavendor)->first();
            if ($vendor === null)
                NamaVendor::insertGetId([
                    'name' => $request->namavendor
                ]);

            $nonkasbonID = NonKasbon::insertGetId([
                'no_nonkasbon' => $nomer,
                'tglmasuk' => $request->tglmasuk,
                'jammasuk' => $request->jammasuk,
                'doksebelumnya' => $terakhir,
                'id_unit' => $id_unit,
                'id_user' => $id_user,
                'kodekasbon' => $request->kodekasbon,
                'jenis' => $request->jenis,
                'id_kurs' => $request->id_kurs,
                'id_pph' => $request->id_pph,
                'namavendor'  => $request->namavendor,
                'noinvoice'  => $request->noinvoice,
                'tujuanpembayaran' => $request->tujuanpembayaran,
                'proyek' => $request->proyek,
                'iddpp' => $iddpp,
                'idppn' => $idppn,
                'idpph' => $idpph,
                'total' => $total,
                'k_total' => $ktotal,
                'created_at' => $now,
                'updated_at' =>  $now
            ]);

            if (($ktotal < 10000000)) {
                VerifikasinonKasbon::insertGetId([
                    'id_nonkasbon' => $nonkasbonID,
                    'vnk_a_1' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                ]);
            } elseif (($ktotal > 10000000) && ($ktotal < 25000000)) {
                VerifikasinonKasbon::insertGetId([
                    'id_nonkasbon' => $nonkasbonID,
                    'vnk_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                ]);
            } elseif (($ktotal > 25000000) && ($ktotal < 100000000)) {
                VerifikasinonKasbon::insertGetId([
                    'id_nonkasbon' => $nonkasbonID,
                    'vnk_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                ]);
            } elseif ($ktotal > 100000000) {
                VerifikasinonKasbon::insertGetId([
                    'id_nonkasbon' => $nonkasbonID,
                    'vnk_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                ]);
            }
        });

        return redirect()->route('nonkasbon.index')
            ->with('success', 'Non Kasbon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nonkasbon  $nonkasbon
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nonkasbon  $nonkasbon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pph = Pph::all();
        $kurs = Kurs::all();
        $namavendor = NamaVendor::all();
        $jenis = Jenis::all();
        $kodekasbon = KodeKasbon::all();
        $nonkasbon = NonKasbon::find($id);
        $detail = KeteranganNonKasbon::where('id_nonkasbon', $id)->get();
        $title = 'Non Kasbon';
        return view('nonkasbon.edit', compact('title', 'nonkasbon', 'detail', 'pph', 'kurs', 'namavendor', 'jenis', 'kodekasbon'));
    }

    public function show($id)
    {

        $nonkasbon = nonkasbon::find($id);

        $title = 'Detail';
        return view('nonkasbon.show', compact('title', 'nonkasbon'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNonkasbonRequest  $request
     * @param  \App\Models\Nonkasbon  $nonkasbon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        DB::transaction(function () use ($request, $id) {
            $jammasuk = Carbon::now()->format('H:i:s');;
            $tglmasuk = Carbon::now()->format('Y-m-d');
            $now = Carbon::now('Asia/Jakarta');
            $nonkasbon = Nonkasbon::find($id);
            if ($request->id_kurs == 42) {
                $iddpp = Str::replace(',', '', $request->iddpp);
                $idppn = Str::replace(',', '', $request->iddpp);
                $idpph = Str::replace(',', '', $request->idpph);
                $total = Str::replace(',', '', $request->iddpp);
                +Str::replace(',', '', $request->iddpp);
                -Str::replace(',', '', $request->idpph);
                $ktotal = $total;
            } else {
                $iddpp = Str::replace(',', '', $request->iddpp1);
                $idppn = 0;
                $idpph = 0;
                $total =  Str::replace(',', '', $request->iddpp1);
                $konversi =  Str::replace(',', '', $request->konversi);
                $hkonversi = $total * $konversi;
                $ktotal = Str::replace(',', '', $hkonversi);
            }

            $vendor = DB::table('nama_vendor')->where('name', $request->namavendor)->first();
            if ($vendor === null)
                NamaVendor::insertGetId([
                    'name' => $request->namavendor
                ]);
            $nonkasbon->update([
                'tglmasuk' => $tglmasuk,
                'jammasuk' => $jammasuk,
                'kodekasbon' => $request->kodekasbon,
                'jenis' => $request->jenis,
                'id_kurs' => $request->id_kurs,
                'id_pph' => $request->id_pph,
                'iddpp' => $iddpp,
                'idppn' => $idppn,
                'idpph' => $idpph,
                'total' => $total,
                'k_total' => $ktotal,
                'namavendor'  => $request->namavendor,
                'noinvoice'  => $request->noinvoice,
                'tujuanpembayaran' => $request->tujuanpembayaran,
                'proyek' => $request->proyek,
                'updated_at' =>  $now,
            ]);


            $idvnk = $nonkasbon->verifikasinonkasbon->id;
            $vnk = VerifikasinonKasbon::find($idvnk);
            if (($ktotal < 10000000)) {
                $vnk->update([
                    'vnk_a_1' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($ktotal > 10000000) && ($ktotal < 25000000)) {
                $vnk->update([
                    'vnk_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($ktotal > 25000000) && ($ktotal < 100000000)) {
                $vnk->update([
                    'vnk_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif ($ktotal > 100000000) {
                $vnk->update([
                    'vnk_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        });
        return redirect()->route('nonkasbon.index')->with('success', 'Non Kasbon updated successfully');
    }

    public function generatePDF($id)
    {
        $nonkasbon = Nonkasbon::find($id);
        $detail = DokumenNKD::where('id_dnk', $nonkasbon->dokumennk->id)->get();
        return view('pdf.print-nonkasbon', compact('nonkasbon', 'detail'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nonkasbon  $nonkasbon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nonkasbon::find($id)->delete();
        return redirect()->route('nonkasbon.index')
            ->with('success', 'Nonkasbon deleted successfully');
    }
}
