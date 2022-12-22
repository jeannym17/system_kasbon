
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Surat Pemberitahuan</title>
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
				  </div>
			  </div>
      </div>
		  <tbody>
			<div class="tm_invoice_seperator">
			<div class="tm_invoice_center tm_text_center">
				<p style="font-size: 15px">
				   <b class="tm_primary_color" style="text-transform:uppercase;">
				   SURAT PEMBERITAHUAN 
				   	<br>
				   PERTANGGUNGJAWABAN PERMINTAAN PENGELUARAN KAS 
						<br>
				    (KASBON) 
				 </p>
			   </div>
			<tr>
        </div>
        <div class="tm_invoice_head ">
          <div>
           <table>
            <tbody>
                <tr>
                    <td style="width: 60%" class="tm_border_top_0">Surat Pemberitahuan</td>
                    <td class="tm_border_top_0">:</td>
                    <td class="tm_border_top_0">I (Pertama)</td>
                </tr>
                <tr>
                    <td style="width: 60%" class="tm_border_top_0">Tanggal</td>
                    <td class="tm_border_top_0">:</td>
                    <td class="tm_border_top_0">{{$kasbon->monitoringsp->tgl_sp1}}</td>
                </tr>
                <tr>
                    <td style="width: 60%" class="tm_border_top_0">User kasbon</td>
                    <td class="tm_border_top_0">:</td>
                    <td class="tm_border_top_0">{{$kasbon->user->name}}</td>
                </tr>
                <tr>
                    <td style="width: 60%" class="tm_border_top_0">Divisi</td>
                    <td class="tm_border_top_0">:</td>
                    <td class="tm_border_top_0">{{$kasbon->user->unit->name}}</td>
                </tr>
                <tr>
                    <td style="width: 60%" class="tm_border_top_0">Total Nilai Kasbon Jatuh Tempo</td>
                    <td class="tm_border_top_0">:</td>
                    <td class="tm_border_top_0">{{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}</td>
                </tr>
            </tbody>
           </table>
          </div>
          <div class="tm_invoice_right tm_text_right">
            <p style="font-size: 10px">
            </b>
            </p>
          </div>
        </div>
        <div class="tm_table tm_style1 tm_mb5">
          <div class="tm_round_border">
            <div class="tm_table_responsive">
              <table style="text-align: center">
                <tbody>
                <tr>
                  <td style="width: 15%;" class="tm_border_top_0 tm_border_right tm_gray_bg"><b class="tm_primary_color">No. Kasbon</b></td>
                  <td style="width: 25%;text-align: center" class="tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Keperluan Kasbon</b></td>
                  <td style="width: 15%;" class="tm_border_left tm_border_right tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Nilai Kasbon</b></td>
                  <td style="width: 15%;" class="tm_border_top tm_border_right tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Tanggal Bayar Kasbon</b></td>
                  <td style="width: 15%;" class="tm_border_top tm_border_right tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">Tanggal Jatuh Tempo Kasbon</b></td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">JT Perpanjangan / JT SP Sebelumnya</b></td>
                </tr>
                <tr>
                  <td style="width: 15%;" class="tm_border_top tm_border_right">{{$kasbon->nokasbon}}</td>
                  <td style="width: 25%;" class="tm_border_top">{{$kasbon->formatkasbon}}</td>
                  <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}</td>
                  <td style="width: 15%;" class="tm_border_top tm_border_right"></td>
                  <td style="width: 15%;r" class="tm_border_top ">{{$kasbon->tgltempo->format('Y-m-d')}} </td>
                  <td style="width: 5%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->tgltempo->format('Y-m-d')}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
			<br>
			<b>
			<p class="tm_primary_color tm_mb1" style="font-size: 10px;">Kasbon yang sudah Jatuh Tempo agar segera dipertanggungjawabkan, apabila sampai dengan tanggal :</p>
			<div class="tm_gray_bg tm_text_center tm_f18 tm_primary_color tm_grand_total">
				<p class="tm_m0" style="text-align: left;font-size:12px;"></p>
			</div>
      </div>
			  <p class="tm_primary_color tm_mb1" style="font-size: 10px;">Kasbon tersebut belum dipertanggungjawabkan akan kami terbitkan Surat Pemberitahuan berikutnya sesuai dengan Surat Edaran Direksi No. 03A/SE/IMST/2019 tanggal 24 Juni 2019.</p>
      </tr>
			</div>
      <br>
        <p class="tm_primary_color tm_mb1" style="font-size: 10px;">Demikian Surat Pemberitahuan ini kami sampaikan, atas perhatiannya kami ucapkan  terima kasih.</p>
      </tr>
      <br>
			<b>
      <div class="tm_table tm_style1 tm_mb5">
        <div class="tm_round_border">
            <table>
              <tbody>
              <tr>
                <td style="width: 25%;text-align: center" class="tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">DIBUAT OLEH</b></td>
                <td style="width: 25%;text-align: center" class="tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">DIKETAHUI OLEH</b></td>
              </tr>
              <tr>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">VERIFIKATOR</td>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">PJ KEPALA DEPARTEMEN KEUANGAN</td>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">KEPALA DIVISI KEUANGAN</td>
              </tr>
              <tr>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">-</td>
                <td style="width: 15%;height:70px;text-align: center" class="tm_border_left tm_border_right tm_border_top">-</td>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">-</td>
              </tr>
              <tr>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">TENDHY ANDAR</td>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">ZAHRIA ULFA</td>
                <td style="width: 15%;text-align: center" class="tm_border_left tm_border_right tm_border_top">NUROCHIM</td>
              </tr>
            </tbody>
          </table>
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