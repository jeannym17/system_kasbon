<?php

namespace App\Http\Controllers;

use App\Exports\KasbonExport;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Kasbon;
use App\Models\User;
use App\Models\Kurs;
use App\Models\Jenis;
use App\Models\Pph;
use App\Models\Kelengkapan;
use App\Models\KodeKasbon;
use App\Models\Keterangan;
use App\Models\Keterangan_detail;
use App\Models\Dvendor;
use App\Models\DCustomer;
use App\Models\DDinas;
use App\Models\DImpor;
use App\Models\DPajak;
use App\Models\NamaVendor;
use App\Models\VerifikasiKasbon;
use App\Models\KeteranganKasbon;
use App\Models\Bank;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Romans\Filter\IntToRoman;
use PDF;

class KasbonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:kasbon', ['only' => ['index', 'show', 'kasbonexport', 'create', 'store', 'store1', 'edit', 'update', 'destroy', 'verifikasi']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function cetakdata(Request $request)
    // {
    //     $tglawal = $request->tglawal;
    //     $tglakhir = $request->tglakhir;TT

    //     if ($tglawal and $tglakhir) {
    //         $kasbon = Kasbon::whereBetween('tglmasuk', [$tglawal, $tglakhir])->get();
    //     } else {
    //         $kasbon = Kasbon::all();
    //     }

    //     return Excel::download(new KasbonExport('maju'), 'users.xlsx');
    // }

    public function findUser(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = User::orderby('nip', 'asc')->select('nip', 'id_unit', 'name')->limit(5)->get();
        } else {
            $employees = User::orderby('nip', 'asc')->select('nip', 'id_unit', 'name')->where('nip', 'like', '%' . $search . '%')->where('id_unit', '=', Auth::user()->id_unit)->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("label" => $employee->nip, "unit" => $employee->unit->name, "name" => $employee->name);
        }

        return response()->json($response);
    }



    public function generatePDF($id)
    {
        $kasbon = Kasbon::find($id);
        $kd = $kasbon->kelengkapan->keterangan->id;
        $keterangan = Keterangan_detail::where('id_keterangan', $kd)->get();
        $detail = Keterangan_detail::where('id_keterangan', $kd)->get();
        return view('pdf.print-kasbon', compact('kasbon', 'detail', 'keterangan'));
    }

    public function printppkuser($id)
    {
        $kasbon = Kasbon::find($id);
        return view('pdf.print-ppk-user', compact('kasbon'));
    }


    public function printsp1($id)
    {
        $kasbon = Kasbon::find($id);

        return view('pdf.print-sp1', compact('kasbon',  'kasbon'));
    }

    public function printsp2($id)
    {
        $kasbon = Kasbon::find($id);

        return view('pdf.print-sp2', compact('kasbon',  'kasbon'));
    }

    public function printsp3($id)
    {
        $kasbon = Kasbon::find($id);

        return view('pdf.print-sp3', compact('kasbon',  'kasbon'));
    }
    public function index()
    {
        if (Auth::user()->hasRole('ADMIN')  == 'ADMIN') {
            $kasbon = Kasbon::all();
        } else {
            $kasbon = Kasbon::where('id_unit', Auth::user()->id_unit)->get();
        }
        $now = Carbon::now()->format('Y-m-d');
        $title = 'Kasbon';
        return view('kasbon.index', compact('kasbon', 'title', 'now'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filter = new IntToRoman();
        $dueDate = now()->addDays(7)->format('Y-m-d');
        $pph = Pph::all();
        $pphs = Pph::all();
        $kurs = Kurs::all();
        $jenis = Jenis::all();
        $user = User::all();
        $bank = Bank::all();
        $namavendor = NamaVendor::all();
        $kodekasbon = KodeKasbon::all();
        $now = Carbon::now('Asia/Jakarta');
        $jamnow = Carbon::now()->setTimezone('Asia/Jakarta')->format('H:i:s');
        $thnBulan = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');
        $result = $filter->filter($bulan);
        $cek = Kasbon::count();
        $tglmasuk = Carbon::now()->format('Y-m-d');

        if ($cek == 0) {
            // $urut = 100001;
            $nomer = 'PPK' . '/' . '1' . '/' . $result . '/' . $thnBulan;
            // $n0mer = 'D' . $urut;
            $terakhir = 'PPK/0/X/2022';
        } else {
            $ambil = Kasbon::all()->last();
            $urut = (int)substr($ambil->nokasbon, 4) + 1;
            $nomer = 'PPK' . '/' . $urut . '/' . $result . '/' . $thnBulan;
            $uru_t = (int)substr($ambil->nokasbon, -1) + 1;
            $n0mer = 'D' . $uru_t;
            $_terakhir = Kasbon::query()->latest('id')->first();
            $terakhir = $_terakhir->nokasbon;
        }
        $title = 'Input Kasbon';
        return view('kasbon.create', compact('title', 'user', 'nomer', 'terakhir', 'kurs', 'jenis', 'tglmasuk', 'pph', 'dueDate', 'jamnow', 'kodekasbon', 'namavendor', 'pphs', 'bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            // 'jeniskasbon' => 'required',
            // 'id_jenis' => 'required',
            // 'id_kurs' => 'required',
            // 'proyek' => 'required',
            // 'uraianpengguna' => 'required',
            // 'iddpp' => 'required',
            // 'idppn' => 'required',
            // 'id_pph' => 'required',
            // 'idpph' => 'required',
            // 'namavendor' => 'required',
            // 'haritempo' => 'required',
            // 'noinvoice' => 'required',
            // 'spph' => 'required',
            // 'po_vendor' => 'required',
            // 'po_customer' => 'required',
            // 'sjn' => 'required',
            // 'harga_jual' => 'required',
            // 'barang_datang' => 'required',
            // 'nopi' => 'required',

        ]);

        DB::transaction(function () use ($request) {
            $filter = new IntToRoman();
            $now = Carbon::now('Asia/Jakarta');
            $thnBulan = Carbon::now()->format('Y');
            $bulan = Carbon::now()->format('m');
            $result = $filter->filter($bulan);
            $cek = Kasbon::count();
            $terakhir = Kasbon::query()->latest('id')->first();
            // $filename = $now . '.' . $request->file->extension();
            $file = $request->file('file');
            $filename = time() . $file->getClientOriginalName();
            $request->file('file')->storeAs('post-file', $filename);
            // $request->file->move(public_path('public'), $filename);
            // $file = $request->file('file');
            // $store = $file('file')->storeAs('post-file', $filename);
            if ($cek == 0) {
                $urut = 1;
                $nomer = 'PPK' . '/' . $urut . '/' . $result . '/' . $thnBulan;
                $terakhir = 'PPK/0/X/2022';
            } else {
                $ambil = Kasbon::all()->last();
                $urut = (int)substr($ambil->nokasbon, 4) + 1;
                $nomer = 'PPK' . '/' . $urut . '/' . $result . '/' . $thnBulan;
                $_terakhir = Kasbon::query()->latest('id')->first();
                $terakhir = $_terakhir->nokasbon;
            }

            if ($request->id_kurs == 42) {
                $iddpp = Str::replace(',', '', $request->iddpp);
                $idppn = Str::replace(',', '', $request->idppn);
                $idpph = Str::replace(',', '', $request->idpph);
                $total = Str::replace(',', '', $request->iddpp) + Str::replace(',', '', $request->idppn) - Str::replace(',', '', $request->idpph);
                $ktotal = $total;
                $konversi = 0;
            } else {
                $iddpp = Str::replace(',', '', $request->iddpp1);
                $idppn = 0;
                $idpph = 0;
                $total =  Str::replace(',', '', $request->iddpp1);
                $konversi =  Str::replace(',', '', $request->konversi);
                $hasilk = $total * $konversi;
                $ktotal = Str::replace(',', '', $hasilk);
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

            $bank = DB::table('bank')->where('name', $request->id_bank)->first();
            if ($bank === null)
                Bank::insertGetId([
                    'name' => $request->id_bank
                ]);


            $kasbonID = Kasbon::insertGetId([
                'tglmasuk' => $request->tglmasuk,
                'jammasuk' => $request->jammasuk,
                'id_kurs' => $request->id_kurs,
                'proyek' => $request->proyek,
                'jeniskasbon' => $request->jeniskasbon,
                'nip' => $nip,
                'id_unit' => $id_unit,
                'id_user' => $id_user,
                'doksebelumnya' => $terakhir,
                'nokasbon' => $nomer,
                'id_kodekasbon' => $request->kodekasbon,
                'uraianpengguna' => $request->uraianpengguna,
                'iddpp' => Str::replace(',', '', $iddpp),
                'idppn' => Str::replace(',', '', $idppn),
                'id_jenis' => $request->id_jenis,
                'id_pph' => $request->id_pph,
                'idpph' => Str::replace(',', '', $idpph),
                'total' => Str::replace(',', '', $total),
                'konversi' => Str::replace(',', '', $konversi),
                'k_total' => $ktotal,
                'namavendor' => $request->namavendor,
                'noinvoice' => $request->noinvoice,
                'spph' => $request->spph,
                'po_vendor' => $request->po_vendor,
                'po_customer' => $request->po_customer,
                'sjn' => $request->sjn,
                'nopi' => $request->nopi,
                'novkb' => $request->novkb,
                'formatkasbon' => $nomer . ';' . $request->jeniskasbon . ' AN ' . $name_user . ';' . $request->uraianpengguna . ';' . $request->po_customer . ';' . $request->proyek,
                'transferke' => $request->transferke,
                'id_bank' => $request->id_bank,
                'namarek' => $request->namarek,
                'norek' => $request->norek,
                'file' =>  $filename,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            $vendorID = Dvendor::insertGetId([

                'dv_invoice' => $request->Input('dv_invoice'),
                'dv_kwitansi' => $request->Input('dv_kwitansi'),
                'dv_povendor' => $request->Input('dv_povendor'),
                'dv_sjnvendor' => $request->Input('dv_sjnvendor'),
                'dv_packcinglist' => $request->Input('dv_packinglist'),
                'dv_testreport' => $request->Input('dv_testreport'),
                'dv_bapp' => $request->Input('dv_bapp'),
                'dv_lppb' => $request->Input('dv_lppb'),
                'dv_ko' => $request->Input('dv_ko'),
                'dv_spp' => $request->Input('dv_spp'),
            ]);

            $customerID = DCustomer::insertGetId([

                'dc_memointernal' => $request->Input('dc_memointernal'),
                'dc_spph' => $request->Input('dc_spph'),
                'dc_ko' => $request->Input('dc_ko'),
                'dc_loi' => $request->Input('dc_loi'),
                'dc_invoicecustom' => $request->Input('dc_invoicecustom'),
                'dc_sjncustom' => $request->Input('dc_sjncustom'),
            ]);

            $imporID = DImpor::insertGetId([

                'di_pib' => $request->Input('di_pib'),
                'di_bl' => $request->Input('di_bl'),
                'di_com' => $request->Input('di_com'),
                'di_coo' => $request->Input('di_coo'),
                'di_invoicecustom' => $request->Input('di_invoicecustom'),
                'di_sjncustom' => $request->Input('di_sjncustom'),
            ]);

            $pajakID = DPajak::insertGetId([

                'dp_kesesuaianfaktur' => $request->Input('dp_kesesuaianfaktur'),
                'dp_pajakpenghasilan' => $request->Input('dp_pajakpenghasilan'),
                'dp_suratnonpkp' => $request->Input('dp_suratnonpkp'),
            ]);

            $dinasID = DDinas::insertGetId([

                'dd_tickettransport' => $request->Input('dd_tickettransport'),
                'dd_notamakan' => $request->Input('dd_notamakan'),
                'dd_boardingpass' => $request->Input('dd_boardingpass'),
                'dd_notapenginapan' => $request->Input('dd_notapenginapan'),
                'dd_sppd' => $request->Input('dd_sppd'),
                'dd_lapdinas' => $request->Input('dd_lapdinas'),
            ]);

            $ketID = Keterangan::insertGetId([]);

            Kelengkapan::insertGetId([
                'nokasbon' => $nomer,
                'id_kasbon' => $kasbonID,
                'id_dv' => $vendorID,
                'id_dc' => $customerID,
                'id_di' => $imporID,
                'id_dp' => $pajakID,
                'id_dd' => $dinasID,
                'id_kt' => $ketID,
            ]);

            if (($ktotal < 10000000)) {
                VerifikasiKasbon::insertGetId([
                    'id_kasbon' => $kasbonID,
                    'vkb_a_1' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            } elseif (($ktotal > 10000000) && ($ktotal < 25000000)) {
                VerifikasiKasbon::insertGetId([
                    'id_kasbon' => $kasbonID,
                    'vkb_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            } elseif (($ktotal > 25000000) && ($ktotal < 100000000)) {
                VerifikasiKasbon::insertGetId([
                    'id_kasbon' => $kasbonID,
                    'vkb_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            } else {
                VerifikasiKasbon::insertGetId([
                    'id_kasbon' => $kasbonID,
                    'vkb_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
        });

        return redirect()->route('kasbon.index')->with('success', 'Kasbon created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Kasbon  $kasbon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelengkapan = Kelengkapan::find($id);
        if (isset($kelengkapan->keterangan->id)) {
            $detail = Keterangan_detail::where('id_keterangan', $kelengkapan->keterangan->id)->get();
            $keterangan = Keterangan::all();
            $kasbon = Kasbon::find($id);
            $pph = Pph::all();
            $kurs = Kurs::all();
            $jenis = Jenis::all();
            $title = 'Detail';
            return view('kasbon.show', compact('title', 'kasbon', 'pph', 'kurs', 'jenis',  'kelengkapan', 'keterangan', 'detail'));
        } else {
            $keterangan = Keterangan::all();
            $kasbon = Kasbon::find($id);
            $pph = Pph::all();
            $kurs = Kurs::all();
            $jenis = Jenis::all();
            $title = 'Detail';
            return view('kasbon.show', compact('title', 'kasbon', 'pph', 'kurs', 'jenis',  'kelengkapan', 'keterangan'));
        }
    }
    public function verifikasi(Kasbon $kasbon)
    {
        return view('kasbon.verifikasi', compact('kasbon'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kasbon  $kasbon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasbon = Kasbon::find($id);
        // $detail = KeteranganKasbon::where('id_kasbon', $id)->get();
        $pph = Pph::all();
        $detail = Keterangan::where('id', $kasbon->kelengkapan->id_kt)->get();
        $pph = Pph::all();
        $kodekasbon = KodeKasbon::all();
        $namavendor = namavendor::all();
        $kurs = Kurs::all();
        $bank = Bank::all();
        $jenis = Jenis::all();
        $title = 'Detail';
        return view('kasbon.edit', compact('title', 'kasbon', 'pph', 'kurs', 'jenis', 'bank', 'detail', 'namavendor', 'kodekasbon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kasbon  $kasbon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            if ($request->id_kurs == 42) {
                $iddpp = Str::replace(',', '', $request->iddpp);
                $idppn = Str::replace(',', '', $request->idppn);
                $idpph = Str::replace(',', '', $request->idpph);
                $total = Str::replace(',', '', $request->iddpp) + Str::replace(',', '', $request->idppn) - Str::replace(',', '', $request->idpph);
                $ktotal = $total;
                $konversi = 0;
            } else {
                $iddpp = Str::replace(',', '', $request->iddpp1);
                $idppn = 0;
                $idpph = 0;
                $total =  Str::replace(',', '', $request->iddpp1);
                $konversi =  Str::replace(',', '', $request->konversi);
                $hasilk = $total * $konversi;
                $ktotal = Str::replace(',', '', $hasilk);
            }

            $now = Carbon::now('Asia/Jakarta');
            $kasbon = Kasbon::find($id);

            if ($request->file('file')) {
                if ($request->oldfile) {
                    Storage::delete('post-file/' . $request->oldfile);
                }
                $file = $request->file('file');
                $filename = time() . $file->getClientOriginalName();
                $request->file('file')->storeAs('post-file', $filename);
            } else {
                $filename = $kasbon->file;
            }

            $vendor = DB::table('nama_vendor')->where('name', $request->namavendor)->first();
            if ($vendor === null)
                NamaVendor::insertGetId([
                    'name' => $request->namavendor
                ]);

            $bank = DB::table('bank')->where('name', $request->id_bank)->first();
            if ($bank === null)
                Bank::insertGetId([
                    'name' => $request->id_bank
                ]);


            $kasbon->id_kurs = $request->id_kurs;
            $kasbon->proyek = $request->proyek;
            $kasbon->id_kodekasbon = $request->kodekasbon;
            $kasbon->uraianpengguna = $request->uraianpengguna;
            $kasbon->iddpp = $iddpp;
            $kasbon->idppn = $idppn;
            $kasbon->id_jenis = $request->id_jenis;
            $kasbon->id_pph = $request->id_pph;
            $kasbon->idpph = $idpph;
            $kasbon->total = $total;
            $kasbon->k_total = $ktotal;
            $kasbon->konversi = $konversi;
            $kasbon->namavendor = $request->namavendor;
            $kasbon->noinvoice = $request->noinvoice;
            $kasbon->spph = $request->spph;
            $kasbon->po_vendor = $request->po_vendor;
            $kasbon->po_customer = $request->po_customer;
            $kasbon->sjn = $request->sjn;
            $kasbon->nopi = $request->nopi;
            $kasbon->novkb = $request->novkb;
            $kasbon->formatkasbon = $kasbon->nokasbon . ';' . $kasbon->jeniskasbon . ' AN ' . $kasbon->user->name . ';' . $request->uraianpengguna . ';' . $request->po_customer . ';' . $request->proyek;
            $kasbon->transferke = $request->transferke;
            $kasbon->id_bank = $request->id_bank;
            $kasbon->namarek = $request->namarek;
            $kasbon->norek = $request->norek;
            $kasbon->file = $filename;
            $kasbon->updated_at = $now;
            $kasbon->update();

            $idvendor = $kasbon->kelengkapan->dvendor->id;
            $vendor = Dvendor::find($idvendor);
            $vendor->update([
                'dv_invoice' => $request->Input('dv_invoice'),
                'dv_kwitansi' => $request->Input('dv_kwitansi'),
                'dv_povendor' => $request->Input('dv_povendor'),
                'dv_sjnvendor' => $request->Input('dv_sjnvendor'),
                'dv_packcinglist' => $request->Input('dv_packinglist'),
                'dv_testreport' => $request->Input('dv_testreport'),
                'dv_bapp' => $request->Input('dv_bapp'),
                'dv_lppb' => $request->Input('dv_lppb'),
                'dv_ko' => $request->Input('dv_ko'),
                'dv_spp' => $request->Input('dv_spp'),
            ]);

            $idcustomer = $kasbon->kelengkapan->dcustomer->id;
            $customer = DCustomer::find($idcustomer);
            $customer->update([
                'dc_memointernal' => $request->Input('dc_memointernal'),
                'dc_spph' => $request->Input('dc_spph'),
                'dc_ko' => $request->Input('dc_ko'),
                'dc_loi' => $request->Input('dc_loi'),
                'dc_invoicecustom' => $request->Input('dc_invoicecustom'),
                'dc_sjncustom' => $request->Input('dc_sjncustom'),
            ]);

            $iddinas = $kasbon->kelengkapan->ddinas->id;
            $dinas = DDinas::find($iddinas);
            $dinas->update([
                'dd_tickettransport' => $request->Input('dd_tickettransport'),
                'dd_notamakan' => $request->Input('dd_notamakan'),
                'dd_boardingpass' => $request->Input('dd_boardingpass'),
                'dd_notapenginapan' => $request->Input('dd_notapenginapan'),
                'dd_sppd' => $request->Input('dd_sppd'),
                'dd_lapdinas' => $request->Input('dd_lapdinas'),
            ]);

            $idimpor = $kasbon->kelengkapan->dimpor->id;
            $impor = DImpor::find($idimpor);
            $impor->update([
                'di_pib' => $request->Input('di_pib'),
                'di_bl' => $request->Input('di_bl'),
                'di_com' => $request->Input('di_com'),
                'di_coo' => $request->Input('di_coo'),
                'di_invoicecustom' => $request->Input('di_invoicecustom'),
                'di_sjncustom' => $request->Input('di_sjncustom'),
            ]);

            $idpajak = $kasbon->kelengkapan->dpajak->id;
            $pajak = DPajak::find($idpajak);
            $pajak->update([
                'dp_kesesuaianfaktur' => $request->Input('dp_kesesuaianfaktur'),
                'dp_pajakpenghasilan' => $request->Input('dp_pajakpenghasilan'),
                'dp_suratnonpkp' => $request->Input('dp_suratnonpkp'),
            ]);

            // $idketerangan = $kasbon->kelengkapan->keterangan->id;
            // $keterangan = Keterangan::find($idketerangan);
            // $keterangan->update([
            //     'catatan' => $request->Input('catatan'),
            // ]);


            $idvkb = $kasbon->verifikasikasbon->id;
            $vkb = VerifikasiKasbon::find($idvkb);
            if (($ktotal < 10000000)) {
                $vkb->update([
                    'vkb_a_1' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($ktotal > 10000000) && ($ktotal < 25000000)) {
                $vkb->update([
                    'vkb_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($ktotal > 25000000) && ($ktotal < 100000000)) {
                $vkb->update([
                    'vkb_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif ($ktotal > 100000000) {
                $vkb->update([
                    'vkb_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        });
        return redirect()->route('kasbon.index')->with('success', 'Kasbon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kasbon::find($id)->delete();
        return redirect()->route('kasbon.index')
            ->with('success', 'Kasbon deleted successfully');
    }

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
}
