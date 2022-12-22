<div class="row" id="form-show-2">
    <div class="table-responsive shopping-cart">
        <table>
            <tbody>
              <tr>
                  <td class="tm_border_top_0 tm_border_bottom" colspan="6" style="text-align: center"><b class="tm_primary_color">LEMBAR VERIFIKASI</b></td>
              </tr>
              <tr style="background-color: #dcecf7; color: black;">
                <td style="width: 5%;" class="tm_border_top_0 tm_border_right tm_gray_bg"><b class="tm_primary_color">No</b></td>
                <td style="width: 40%;text-align: center" class="tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">DOKUMEN VENDOR</b></td>
                <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top_0 tm_gray_bg"><b class="tm_primary_color">KET</b></td>
                <td style="width: 5%;" class="tm_border_top tm_border_right tm_gray_bg"><b class="tm_primary_color">No</b></td>
                <td style="width: 40%;text-align: center" class="tm_border_top tm_gray_bg"><b class="tm_primary_color">DOKUMEN IMPOR</b></td>
                <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top tm_gray_bg"><b class="tm_primary_color">KET</b></td>
              </tr>
              <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
                  <td style="width: 40%;" class="tm_border_top ">INVOICE</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_invoice}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
                  <td style="width: 40%;" class="tm_border_top ">PIB </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_pib}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
                  <td style="width: 40%;" class="tm_border_top ">KWITANSI</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_kwitansi}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
                  <td style="width: 40%;" class="tm_border_top ">BILL OF LADING / AWB </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_bl}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
                  <td style="width: 40%;" class="tm_border_top ">KO (KONFIRMASI ORDER)</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_ko}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
                  <td style="width: 40%;" class="tm_border_top ">COM </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_com}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
                  <td style="width: 40%;" class=" ">PO VENDOR</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_povendor}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
                  <td style="width: 40%;" class="tm_border_top ">COO </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_coo}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
                  <td style="width: 40%;" class="tm_border_top ">SJN VENDOR</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_sjnvendor}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
                  <td style="width: 40%;" class="tm_border_top ">INVOICE CUSTOM </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_invoicecustom}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
                  <td style="width: 40%;" class="tm_border_top ">PACKING LIST</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_packcinglist}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
                  <td style="width: 40%;" class="tm_border_top ">INVOICE FREIGHT  </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dimpor->di_sjncustom}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">7</b></td>
                  <td style="width: 40%;" class="tm_border_top ">TEST REPORT</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_testreport}}</td>
                  <td style="background-color: #dcecf7; color: black; width: 5%;" class="tm_border_top tm_border_right tm_gray_bg"><b class="tm_primary_color">No</b></td>
                  <td style="background-color: #dcecf7; color: black; width: 40%;text-align: center" class="tm_border_top tm_gray_bg"><b class="tm_primary_color">DOKUMEN PAJAK</b></td>
                  <td style="background-color: #dcecf7; color: black; width: 10%;text-align: center"  class="tm_border_left tm_border_top tm_gray_bg"><b class="tm_primary_color">KET</b></td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">8</b></td>
                  <td style="width: 40%;" class="tm_border_top ">BAPP / BAST</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_bapp}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
                  <td style="width: 40%;" class="tm_border_top ">KESESUAIAN FAKTUR </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">9</b></td>
                  <td style="width: 40%;" class="tm_border_top ">LPPB</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_lppb}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
                  <td style="width: 40%;" class="tm_border_top ">PAJAK PENGHASILAN </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dpajak->dp_pajakpenghasilan}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">10</b></td>
                  <td style="width: 40%;" class="tm_border_top ">SURAT PERMOHONAN PEMBAYARAN</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dvendor->dv_spp}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
                  <td style="width: 40%;" class="tm_border_top ">SURAT NON PKP / SKB</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->dpajak->dp_suratnonpkp}}</td>
               </tr>
               <tr style="background-color: #dcecf7; color: black;">
                  <td style="width: 5%;" class="tm_border_top tm_border_right tm_gray_bg"><b class="tm_primary_color">No</b></td>
                  <td style="width: 40%;text-align: center" class="tm_border_top tm_gray_bg"><b class="tm_primary_color">DOKUMEN CUSTOMER</b></td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top tm_gray_bg"><b class="tm_primary_color">KET</b></td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right tm_gray_bg"><b class="tm_primary_color">No</b></td>
                  <td style="width: 40%;text-align: center" class="tm_border_top tm_gray_bg"><b class="tm_primary_color">DOKUMEN DINAS</b></td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top tm_gray_bg"><b class="tm_primary_color">KET</b></td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
                  <td style="width: 40%;" class="tm_border_top ">MEMO INTERNAL/ NOTULEN RAPAT</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_memointernal}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">1</b></td>
                  <td style="width: 40%;" class="tm_border_top ">INVOICE/TIKET TRANSPORT</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_tickettransport}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
                  <td style="width: 40%;" class="tm_border_top ">SPPH </td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_spph}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">2</b></td>
                  <td style="width: 40%;" class="tm_border_top ">NOTA MAKAN</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_notamakan}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
                  <td style="width: 40%;" class="tm_border_top ">KO (KONFIRMASI ORDER)</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_ko}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">3</b></td>
                  <td style="width: 40%;" class="tm_border_top ">BOARDING PASS</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_boardingpass}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
                  <td style="width: 40%;" class="tm_border_top ">LOI</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_loi}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">4</b></td>
                  <td style="width: 40%;" class="tm_border_top ">NOTA PENGINAPAN / HOTEL</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_notapenginapan	}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
                  <td style="width: 40%;" class="tm_border_top ">PO CUSTOMER</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_invoicecustom}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">5</b></td>
                  <td style="width: 40%;" class="tm_border_top ">SPPD</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_sppd}}</td>
               </tr>
               <tr>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
                  <td style="width: 40%;" class="tm_border_top ">SJN CUSTOMER</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_right tm_border_top">{{$kasbon->kelengkapan->dcustomer->dc_sjncustom}}</td>
                  <td style="width: 5%;" class="tm_border_top tm_border_right"><b class="tm_primary_color">6</b></td>
                  <td style="width: 40%;" class="tm_border_top ">LAPORAN DINAS</td>
                  <td style="width: 10%;text-align: center"  class="tm_border_left tm_border_top">{{$kasbon->kelengkapan->ddinas->dd_lapdinas}}</td>
               </tr>
            </tbody>
          </table>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 text-end">
                <a href="#" type="button" onclick="form1()" class="btn btn-danger px-4">Previous</a> 
                <a href="#" type="button" onclick="form3()" class="btn btn-primary px-4">Next</a> 
            </div>
        </div>
</div>
