
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
					<v style="font-size: 10px;">Kantor : Ring Road Barat, Ngegong,<br>
					Manguharjo, Kota Madiun - 63125 <br>
					T/F:  (0351) 2810737   E : ptimstrading@gmail.com 
					</v>
				  </div>
			  </div>
          </div>
		  <div class="tm_invoice_seperator"></div>
          </div>
          <table>
            <tbody>
              <tr>
                <td style="width: 20%;text-align:left;"  class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">Nama Pemohon</b></td>
                <td style="width: 0%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">:</b></td>
                <td style="width: 25%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">{{$nonkasbon->user->name}}</b></td>
                <td style="width: 10%;text-align:left;"   class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">No</b></td>
                <td style="width: 0%;text-align:left;"   class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">: </b></td>
                <td style="width: 25%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">{{$nonkasbon->no_nonkasbon}}</b></td>
              </tr>
              <tr>
                <td style="width: 20%;text-align:left;"  class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">Nominal</b></td>
                <td style="width: 0%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">:</b></td>
                <td style="width: 25%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->dokumennk->total)}}</b></td>
                <td style="width: 10%;text-align:left;"   class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color"></b></td>
                <td style="width: 0%;text-align:left;"   class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color"></b></td>
                <td style="width: 25%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color"></b></td>
              </tr>
              <tr>
                <td style="width: 20%;text-align:left;"  class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">Tanggal Pengajuan</b></td>
                <td style="width: 0%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">:</b></td>
                <td style="width: 25%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">{{$nonkasbon->tglmasuk->format('m/d/Y')}}</b></td>
                <td style="width: 10%;text-align:left;"   class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">Pukul</b></td>
                <td style="width: 0%;text-align:left;"   class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">: </b></td>
                <td style="width: 25%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">{{$nonkasbon->jammasuk}}</b></td>
              </tr>
              <tr>
                <td style="width: 20%;text-align:left;"  class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0"><b class="tm_primary_color">Tujuan Pembayaran</b></td>
                <td style="width: 0%;text-align:left;" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">:</b></td>
                <td style="width: 50%;text-align:left;" colspan="4" class="tm_border_top_0 tm_border_bottom_0 tm_border_right_0 tm_border_left_0" ><b class="tm_primary_color">{{$nonkasbon->tujuanpembayaran}}</b></td>

              </tr>
            </tbody>
          </table>
          <div class="tm_invoice_seperator"></div>
          <div class="tm_table tm_style1 tm_mb5">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <tbody>
					<tr>
						<td class="tm_border_top_0 tm_border_bottom" colspan="6" style="text-align: center"><b class="tm_primary_color">LEMBAR VERIFIKASI TANPA KASBON</b></td>
					</tr>
                    <tr>
					  <td style="width: 5%;" class="tm_border_top_0 tm_border_right "><b class="tm_primary_color">No</b></td>
                      <td style="width: 70%;text-align: center" ><b class="tm_primary_color">DOKUMEN</b></td>
                      <td style="width: 30%;text-align: center"  class="tm_border_left tm_border_right tm_border_top_0"><b class="tm_primary_color">NOMINAL</b></td>
                    </tr>
                    @foreach ($detail as $details)
                    <tr>
                        <td style="width: 5%;" class="tm_border_top tm_border_right "><b class="tm_primary_color">{{$loop->iteration}}</b></td>
                        <td style="width: 70%;text-align: center" class="tm_border_top tm_gray_bg"><b class="tm_primary_color">{{$details->dokumen}}</b></td>
                        <td style="width: 30%;text-align: center"  class="tm_border_left tm_border_right tm_border_top tm_gray_bg"><b class="tm_primary_color">{{$nonkasbon->kurs->symbol}} {{number_format($details->nominal)}}</b></td>
                      </tr>
                      @endforeach
                    <tr><td style="width: 5%;" class="tm_border_top tm_border_right "><b class="tm_primary_color"></b></td>
						<td class="tm_border_top  tm_border_right"  style="text-align: center" ><b class="tm_primary_color">TOTAL NOMINAL</b></td>
                      <td class="tm_border_top tm_border_right tm_gray_bg" style="text-align: center" ><b class="tm_primary_color">{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->dokumennk->total)}}</b></td>
					</tr>
                  </tbody>
        
                </table>
              </div>
            </div>
          </div>
		  <p class="tm_primary_color tm_mb1 tm_bold" style="font-size: 12px;">Catatan :</p>
          <div class="tm_gray_bg tm_text_center tm_f18 tm_primary_color tm_grand_total tm_border_top tm_border_bottom tm_border_right tm_border_left">
          <p class="tm_m0" style="text-align: left;font-size:12px;"></p>
          </div>
		  <div class="tm_mb0">

        <div class="tm_invoice_seperator"></div>
        <div class="tm_table tm_style1 tm_mb5">
          <div class="tm_round_border">
            <div class="tm_table_responsive">
              <table>
                <tbody>
        <tr>
          <td class="tm_border_top_0 tm_border_bottom" colspan="6" style="text-align: center"><b class="tm_primary_color">OTORISASI</b></td>
        </tr>
                  <tr>
          <td style="width: 5%;" class="tm_border_top_0 tm_border_right "><b class="tm_primary_color">No</b></td>
                    <td style="text-align: center" ><b class="tm_primary_color">NAMA</b></td>
                    <td style="text-align: center"  class="tm_border_left tm_border_right tm_border_top_0"><b class="tm_primary_color">NIP</b></td>
                    <td style="text-align: center"  class="tm_border_left tm_border_right tm_border_top_0"><b class="tm_primary_color">JABATAN</b></td>
                    <td style="text-align: center"  class="tm_border_left tm_border_right_0 tm_border_top_0 tm_border_bottom"><b class="tm_primary_color">TANDA TANGAN</b></td>
                  </tr>
                  <tr>
                      <td style="width: 5%;text-align: center;" class="tm_border_top tm_border_right "><b class="tm_primary_color">1</b></td>
                      <td style="text-align: center;height:50px;height:50%" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color">{{$nonkasbon->verifikasinonkasbon->id_vnkn->name ?? ''}}</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color">{{$nonkasbon->verifikasinonkasbon->id_vnkn->nip ?? ''}}</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color">VERIFIKATOR KEUANGAN</b></td>
                      {{-- <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right_0 tm_gray_bg"><b class="tm_primary_color"></b><img src="data:image/png;base64,{{DNS2D::getBarcodePNG(($nonkasbon->verifikasinonkasbon->id_vnkn->name.''.$nonkasbon->verifikasinonkasbon->tgl_vnk) , 'QRCODE')}}" width="35" height="35"  alt="barcode" /></td> --}}
                      
                    </tr>
                    <tr>
                      <td style="width: 5%;text-align: center;" class="tm_border_top tm_border_right "><b class="tm_primary_color">2</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color"></b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color"></b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color">PJ KEPALA DEPARTEMEN KEUANGAN</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right_0 tm_gray_bg"><b class="tm_primary_color"></b></td>
                    </tr>
                    <tr>
                      <td style="width: 5%;text-align: center;" class="tm_border_top tm_border_right "><b class="tm_primary_color">3</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color"></b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color"></b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color">KEPALA DIVISI KEUANGAN</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right_0 tm_gray_bg"><b class="tm_primary_color"></b></td>
                    </tr>
                    <tr>
                      <td style="width: 5%;text-align: center;" class="tm_border_top tm_border_right "><b class="tm_primary_color">4</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color"></b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color"></b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right tm_gray_bg"><b class="tm_primary_color">BENDAHARA</b></td>
                      <td style="text-align: center;height:50px" class="tm_border_top tm_border_left tm_border_right_0 tm_gray_bg"><b class="tm_primary_color"></b></td>
                    </tr>
                </tbody>
      
              </table>
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