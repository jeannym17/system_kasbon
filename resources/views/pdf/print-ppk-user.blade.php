<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>PT.  INKA MULTI SOLUSI TRADING</title>
    <link href="{{ URL::asset('assets/css/stylepdf.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style1" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head  tm_align_center">
                        <div class="tm_invoice_left">
                            <div class="tm_logo"><img src="{{ URL::asset('assets/images/brand-logo/imst.png') }}" alt="Logo"></div>
                        </div>
			            <div class="tm_invoice_right">
				            <div style="float:right;">
                                <b class="tm_primary_color">PT.  INKA MULTI SOLUSI TRADING</b> 
                                <br>
                                <v style="font-size: 10px;">Kantor : Jl. Ring Road Barat, Ngegong, Manguharjo<br>
                                    Kota Madiun, Jawa Timur, Indonesia 63125<br>
                                    T/F: (0351) 2810737 E mail : corporate@imst.id 
                                </v>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_seperator"></div>
                </div>
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head  tm_align_center">
                        <div class="tm_invoice_left" style="width: 40%">
                            <div class="tm_round_border">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="tm_border_top_0" style="text-align: left"><b class="tm_primary_color">Total Nilai : {{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
			            <div class="tm_invoice_right" style="width: 50%">
                            <div class="tm_round_border">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="text-align: center" class="tm_border_top_0"><b class="tm_primary_color">PERMINTAAN PENGELUARAN KAS</b></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; text-align: left" class="tm_border_top"><b class="tm_primary_color">No Kasbon</b></td>
                                            <td style="width: 0%" class="tm_border_top"><b class="tm_primary_color">:</b></td>
                                            <td class="tm_border_top"><b class="tm_primary_color">{{$kasbon->nokasbon}}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%; text-align: left" class="tm_border_top"><b class="tm_primary_color">Untuk Keperluan</b></td>
                                            <td colspan="2" style="width: 0%" class="tm_border_top"><b class="tm_primary_color">:</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: justify" class="tm_border_top"><b class="tm_primary_color">{{$kasbon->uraianpengguna}}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_seperator"></div>
                </div>
                <div class="tm_table tm_style1 tm_mb5">
                    <div class="tm_round_border">
                        <div class="tm_table_responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="tm_border_top_0" style="text-align: left"><b class="tm_primary_color">Jangka Waktu : </b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tm_invoice_info"></div>
                <div class="tm_table tm_style1 tm_mb5">
                    <div class="tm_round_border">
                        <div class="tm_table_responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 10%;text-align: center" class="tm_border_top_0 tm_border_right tm_gray_bg"><b class="tm_primary_color">Tanggal</b></td>
                                        <td colspan="2" style="width: 54%;text-align: center" class="tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Penjelasan Penggunaan</b></td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_right tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Rencana (Rp)</b></td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Realisasi (Rp)</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">{{$kasbon->created_at->format('m/d/Y')}}</b></td>
                                        <td colspan="2" style="width: 54%;text-align:justify" class="tm_border_top ">{{$kasbon->uraianpengguna}}</td>
                                        <td style="width: 18%; text-align: center" class="tm_border_left tm_border_right tm_border_top">
                                            @if($kasbon->jeniskasbon == "KASBON RENCANA")
                                            {{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}
                                            @endif
                                        </td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b>
                                            @if($kasbon->jeniskasbon == "KASBON REALISASI")
                                            {{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr height="20px">
                                        <td class="tm_border_top"></td>
                                        <td colspan="2" class="tm_border_left tm_border_top"></td>
                                        <td class="tm_border_left tm_border_top"></td>
                                        <td class="tm_border_left tm_border_top"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class="tm_border_top ">PO Customer</td>
                                        <td style="width: 39%;" class="tm_border_top ">: {{$kasbon->po_customer}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class="tm_border_top ">PO Vendor</td>
                                        <td style="width: 39%;" class="tm_border_top ">: {{$kasbon->po_vendor}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class=" ">SPPH/KO</td>
                                        <td style="width: 39%;" class="tm_border_top ">: {{$kasbon->spph}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;">Proyek</td>
                                        <td style="width: 39%;">: {{$kasbon->proyek}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr height="20px">
                                        <td class="tm_border_top"></td>
                                        <td colspan="2" class="tm_border_left tm_border_top"></td>
                                        <td class="tm_border_left tm_border_top"></td>
                                        <td class="tm_border_left tm_border_top"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class="tm_border_top "><b>Transfer Ke</b></td>
                                        <td style="width: 39%;" class="tm_border_top ">:</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class="tm_border_top ">Nama Rekening</td>
                                        <td style="width: 39%;" class="tm_border_top ">: {{$kasbon->namarek}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class="tm_border_top ">Bank</td>
                                        <td style="width: 39%;" class="tm_border_top ">: {{$kasbon->id_bank ?? ''}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td style="width: 15%;" class="tm_border_top">No Rekening</td>
                                        <td style="width: 39%;" class="tm_border_top ">: {{$kasbon->norek}}</td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right"></td>
                                        <td style="width: 18%; text-align: center" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" class="tm_border_top tm_border_right"><b class="tm_primary_color"></b></td>
                                        <td colspan="2" style="width: 10%;text-align: left" class="tm_border_top tm_border_right tm_gray_bg"><b class="tm_primary_color">Total</b></td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_border_right tm_gray_bg">{{$kasbon->kurs->symbol}}
                                            @if($kasbon->jeniskasbon == "KASBON RENCANA")
                                            {{number_format($kasbon->total)}}
                                            @endif
                                        </td>
                                        <td style="width: 18%; text-align: center"  class="tm_border_left tm_gray_bg">{{$kasbon->kurs->symbol}}
                                            @if($kasbon->jeniskasbon == "KASBON REALISASI")
                                            {{number_format($kasbon->total)}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="width: 10%;text-align: left" class=" tm_border_right tm_gray_bg"><b class="tm_primary_color">Selisih Lebih (Kurang)</b></td>
                                        <td style="width: 18%;"  class="tm_border_left tm_gray_bg"></td>
                                        <td style="width: 18%;"  class="tm_border_left tm_gray_bg"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p class="tm_primary_color tm_mb1 tm_bold" style="font-size: 10px; text-align:justify">
                    Demikian pengajuan kami, apabila dalam batas waktu yang ditentukan kami belum dapat mempertanggungjawabkannya, maka kami bersedia untuk dikenakan sanksi (potong gaji) sesuai peraturan yang berlaku.
                </p>
                <div class="tm_table tm_style1 tm_mb5">
                    <div class="tm_round_border">
                        <div class="tm_table_responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 64%;text-align: center" class="tm_border_top_0 tm_border_right tm_gray_bg"><b class="tm_primary_color">Otorisasi</b></td>
                                        <td colspan="2" style="width: 36%;text-align: center" class="tm_border_left tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Tanda Tangan</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 64%;text-align: center" class="tm_border_left tm_border_right tm_border_top tm_gray_bg"><b class="tm_primary_color">Tanggal : </b></td>
                                        <td style="width: 18%;text-align: center" class="tm_border_left tm_border_right tm_border_top tm_gray_bg"><b class="tm_primary_color">Rencana (Rp)</b></td>
                                        <td style="width: 18%;text-align: center" class="tm_border_left tm_border_top tm_gray_bg"><b class="tm_primary_color">Realisasi (Rp)</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 64%;" class="tm_border_top">1. Yang Meminta <br> Nama, NIP : {{$kasbon->user->name}} , {{$kasbon->nip}}</td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">
                                            @if($kasbon->jeniskasbon == "KASBON RENCANA")
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(($kasbon->user->name.' '.$kasbon->created_at), 'QRCODE')}}" width="35" height="35" alt="barcode" />
                                            @endif 
                                        </td>
                                        <td style="width: 18%;text-align: center" class="tm_border_top"><b class="tm_primary_color"></b>
                                            @if($kasbon->jeniskasbon == "KASBON REALISASI")
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(($kasbon->user->name.' '.$kasbon->created_at), 'QRCODE')}}" width="35" height="35" alt="barcode" />
                                            @endif 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 64%;" class="tm_border_top">2. Atas yang Meminta <br> Nama, NIP :</td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%;" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 64%;" class="tm_border_top">3. Disetujui Direktur Administrasi & Keuangan / Kepala Divisi, Kepala Departemen <br> Nama, NIP :</td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%;" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 64%;" class="tm_border_top">4. Pemegang Kas <br> Nama, NIP :</td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%;" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 64%;" class="tm_border_top">5. Penerima Kasbon <br> Nama, NIP :</td>
                                        <td style="width: 18%;text-align: center"  class="tm_border_left tm_border_right tm_border_top"></td>
                                        <td style="width: 18%;" class="tm_border_top"><b class="tm_primary_color"></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tm_invoice_btns tm_hide_print">
                    <button onclick="window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v164a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                    </a>
                    <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </span>
                    <span class="tm_btn_text">Download</span>
                    </button>
                </div>
            </div>
            </div>
        </div>
        <script src="{{ URL::asset('assets/js-pdf/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js-pdf/jspdf.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js-pdf/html2canvas.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js-pdf/main.js') }}"></script>
    </body>
</html>