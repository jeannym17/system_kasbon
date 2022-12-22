@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Lihat Kelengkapan @endslot
            @slot('li_3') Lihat @endslot
            @slot('title') Lihat Kelengkapan @endslot
        @endcomponent

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <strong>Well Done 👍</strong>{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="display: inline;">List Kelengkapan</h4>
                         
                            <p class="text-muted mb-0">
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
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
                                       <tr>
                                        <td colspan="6"class="tm_border_top tm_border_right"><b class="tm_primary_color">CATATAN : {{$kasbon->kelengkapan->keterangan->catatan ?? '-'}} </b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"class="tm_border_top tm_border_right"><b class="tm_primary_color">KEKURANGAN DOKUMEN :</b></td>
                                        <td colspan="3"class="tm_border_top tm_border_right"><b class="tm_primary_color">TANGGAL KELENGKAPAN :</b></td>
                                    </tr>
                                    @foreach ($kasbon->kelengkapan->keterangan->keterangan_detail as $details)
                                    <tr>
                                        <td colspan="3"class="tm_border_top tm_border_right"><b class="tm_primary_color">{{$loop->iteration}}. {{$details->kekurangan ?? '-' }}</b></td>
                                        <td colspan="3"class="tm_border_top tm_border_right"><b class="tm_primary_color">{{$details->tgl_kelengkapan ?? '-'}}</b></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                                </div>
                    </div>
                </div> <!-- end col -->
            </div>
      
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
<script src="{{ URL::asset('assets/js-pdf/jspdf.min.js') }}"></script>
<script src="{{ URL::asset('assets/js-pdf/html2canvas.min.js') }}"></script>
<script src="{{ URL::asset('assets/js-pdf/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/huebee/huebee.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.datatable.init.js') }}"></script>
<script src="assets/plugins/tippy/tippy.all.min.js"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
