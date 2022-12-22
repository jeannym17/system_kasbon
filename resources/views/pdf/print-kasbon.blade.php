
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>&nbsp; </title>
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
					<v style="font-size: 10px;">Kantor : Ring Road Barat, Ngegong,<br>
					Manguharjo, Kota Madiun - 63125 <br>
					T/F:  (0351) 2810737   E : ptimstrading@gmail.com 
					</v>
				  </div>
			  </div>
          </div>
		  <div class="tm_invoice_seperator"></div>
          </div>
          <div class="tm_invoice_head ">
            <div class="tm_invoice_left">
              <p  style="font-size: 11px " ><b class="tm_primary_color" >
                NAMA USER &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;{{$kasbon->user->name}}<br>
                NOMINAL KASBON &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;{{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}} <br>
				{{$kasbon->jeniskasbon}}
				</b>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
             <p style="font-size: 11px">
				<b class="tm_primary_color" style="text-transform:uppercase;">
					<br><br><br>
                NO KASBON {{$kasbon->nokasbon}}<br>
                PROYEK {{$kasbon->proyek}}<br>
				</b>
              </p>
            </div>
          </div>
          <div class="tm_invoice_info">
          </div>
          <div class="tm_table tm_style1 tm_mb5">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <tbody>
					<tr>
						<td class="tm_border_top_0 tm_border_bottom" colspan="6" style="text-align: center"><b class="tm_primary_color">LEMBAR VERIFIKASI</b></td>
					</tr>
                    <tr>
					  <td style="width: 5%;" class="tm_border_top_0 tm_border_right "><b class="tm_primary_color">No</b></td>
                      <td style="width: 30%;text-align: center" class="tm_border_top_0 "><b class="tm_primary_color">DOKUMEN VENDOR</b></td>
                      <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top_0 "><b class="tm_primary_color">KET</b></td>
					  <td style="width: 5%;" class="tm_border_top tm_border_right "><b class="tm_primary_color">No</b></td>
                      <td style="width: 30%;text-align: center" class="tm_border_top "><b class="tm_primary_color">DOKUMEN IMPOR</b></td>
                      <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top "><b class="tm_primary_color">KET</b></td>
                    </tr>
                    <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
						<td style="width: 30%;" class="tm_border_top ">INVOICE</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_invoice}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
						<td style="width: 30%;r" class="tm_border_top ">PIB </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_pib}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
						<td style="width: 30%;" class="tm_border_top ">KWITANSI</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_kwitansi}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
						<td style="width: 30%;r" class="tm_border_top ">BILL OF LADING / AWB </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_bl}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
						<td style="width: 30%;" class="tm_border_top ">KO (KONFIRMASI ORDER)</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_ko}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
						<td style="width: 30%;r" class="tm_border_top ">COM </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_com}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
						<td style="width: 30%;" class=" ">PO VENDOR</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_povendor}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
						<td style="width: 30%;r" class="tm_border_top ">COO </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_coo}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
						<td style="width: 30%;" class="tm_border_top ">SJN VENDOR</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_sjnvendor}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
						<td style="width: 30%;r" class="tm_border_top ">INVOICE CUSTOM </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_invoicecustom}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
						<td style="width: 30%;" class="tm_border_top ">PACKING LIST</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_packcinglist}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
						<td style="width: 30%;r" class="tm_border_top ">INVOICE FREIGHT  </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_sjncustom}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">7</b></td>
						<td style="width: 30%;" class="tm_border_top ">TEST REPORT</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_testreport}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right "><b class="tm_primary_color">No</b></td>
						<td style="width: 30%;text-align: center" class="tm_border_top "><b class="tm_primary_color">DOKUMEN PAJAK</b></td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top "><b class="tm_primary_color">KET</b></td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">8</b></td>
						<td style="width: 30%;" class="tm_border_top ">BAPP / BAST</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_bapp}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
						<td style="width: 30%;r" class="tm_border_top ">KESESUAIAN FAKTUR </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">9</b></td>
						<td style="width: 30%;" class="tm_border_top ">LPPB</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_lppb}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
						<td style="width: 30%;r" class="tm_border_top ">PAJAK PENGHASILAN </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dpajak->dp_pajakpenghasilan}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">10</b></td>
						<td style="width: 30%;" class="tm_border_top ">SURAT PERMOHONAN PEMBAYARAN</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_spp}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
						<td style="width: 30%;r" class="tm_border_top ">SURAT NON PKP / SKB</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dpajak->dp_suratnonpkp}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right "><b class="tm_primary_color">No</b></td>
						<td style="width: 30%;text-align: center" class="tm_border_top "><b class="tm_primary_color">DOKUMEN CUSTOMER</b></td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top "><b class="tm_primary_color">KET</b></td>
						<td style="width: 5%;" class="tm_border_top tm_border_right "><b class="tm_primary_color">No</b></td>
						<td style="width: 30%;text-align: center" class="tm_border_top "><b class="tm_primary_color">DOKUMEN DINAS</b></td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top "><b class="tm_primary_color">KET</b></td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
						<td style="width: 30%;" class="tm_border_top ">MEMO INTERNAL/ NOTULEN RAPAT</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_memointernal}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
						<td style="width: 30%;r" class="tm_border_top ">INVOICE/TIKET TRANSPORT</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_tickettransport}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
						<td style="width: 30%;" class="tm_border_top ">SPPH </td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_spph}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
						<td style="width: 30%;r" class="tm_border_top ">NOTA MAKAN</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_notamakan}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
						<td style="width: 30%;" class="tm_border_top ">KO (KONFIRMASI ORDER)</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_ko}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
						<td style="width: 30%;r" class="tm_border_top ">BOARDING PASS</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_boardingpass}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
						<td style="width: 30%;" class="tm_border_top ">LOI</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_loi}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
						<td style="width: 30%;r" class="tm_border_top ">NOTA PENGINAPAN / HOTEL</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_notapenginapan	}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
						<td style="width: 30%;" class="tm_border_top ">PO CUSTOMER</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_invoicecustom}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
						<td style="width: 30%;r" class="tm_border_top ">SPPD</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_sppd}}</td>
					 </tr>
					 <tr>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
						<td style="width: 30%;" class="tm_border_top ">SJN CUSTOMER</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_sjncustom}}</td>
						<td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
						<td style="width: 30%;r" class="tm_border_top ">LAPORAN DINAS</td>
						<td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_lapdinas}}</td>
					 </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
		  <p class="tm_primary_color tm_mb1 tm_bold" style="font-size: 12px;">Catatan :</p>
          <div class=" tm_text_center tm_f18 tm_primary_color tm_grand_total">
          <p class="tm_m0" style="text-align: left;font-size:12px;">{{$kasbon->kelengkapan->keterangan->catatan}}</p>
          </div>
          <div class="tm_mb0">
            <p class="tm_primary_color tm_mb1 tm_bold" style="font-size: 12px;">KEKURANGAN DOKUMEN :</p>
			
            <div class="tm_grid_row tm_col_2">
              <div class="tm_border_none_sm">
                <ul class="tm_m0" style="font-size: 12px;">
					@foreach ($detail as $detail)
                  <p style="margin-bottom: 1px;">{{$loop->iteration}}. {{$detail->kekurangan}} </p>
				  @endforeach
                </ul>
              </div>
              <div>
                <ul class="tm_m0" style="font-size: 12px;">
					@foreach ($keterangan as $keterangan)
					<p style="margin-bottom: 1px;font-size: 12px;">DILENGKAPI TANGGAL {{$keterangan->tgl_kelengkapan}}</p>
					@endforeach
				</ul>
              </div>
            </div>
          </div>
          <hr class="tm_mb2">
			<div class="tm_mb0">
            	<p class="tm_primary_color tm_mb1 tm_bold" style="font-size: 12px;">Diverifikasi</p>
            		<div class="tm_grid_row tm_col_2">
              			<div class=" tm_border_none_sm">
                			<ul class="tm_m0" style="font-size: 12px;">
								<br>
								<img src="data:image/png;base64,{{DNS2D::getBarcodePNG($kasbon->user->name, 'QRCODE')}}" alt="barcode" />
								<br><br>
								<hr style="width: 30%;" class="tm_mb0">
								<p>Staff Keuangan</p>
                			</ul>
              			</div>
              		<div>
					<ul class="tm_m0" style="font-size: 12px;">
						<p>Masuk Tanggal : {{$kasbon->tglmasuk->format('m/d/Y')}}</p>
						<p>Jam : {{$kasbon->jammasuk}}</p>
					</ul>
              	</div>
            </div>
        </div>
		<div class="tm_invoice_btns tm_hide_print">
			<button onclick="window.print()" class="tm_invoice_btn tm_color1">
			  <span class="tm_btn_icon">
				<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
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