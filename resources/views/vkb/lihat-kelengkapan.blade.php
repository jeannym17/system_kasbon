@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/jquery-steps/jquery.steps.css') }}">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/0.7.17/cleave.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="{{ URL::asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Lihat Kasbon @endslot
            @slot('li_3') Lihat @endslot
            @slot('title') Lihat Kasbon @endslot
        @endcomponent

        <style>
            p{
                font-weight: bold;
            }
        </style>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <strong>Well Done 👍</strong>{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
                <div class="card-body" id="form1">
                  {!! Form::model($kasbon, ['method' => 'PATCH','route' => ['vkb.update', $kasbon->id],'class' => 'form-parsley','id' => 'myForm']) !!}
                  {{ csrf_field() }}
                  <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Dokumen Vendor</h4>
                         </div><!--end card-header-->
                         <div class="card-body">
                                 <div class="row">
                                 
                                         <div class="col-md-2">
                                             <label class="form-label">INVOICE</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_invoice=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_invoice1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_invoice=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_invoice2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_invoice=="-")? "checked" : "" }} >
                                                 <label class="form-check-label" for="dv_invoice2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                        
                                         <div class="col-md-2">
                                             <label class="form-label">KWITANSI</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_kwitansi=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_kwitansi1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_kwitansi=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_kwitansi2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_kwitansi=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_kwitansi2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">PO VENDOR</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_povendor=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_povendor1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_povendor=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_povendor2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_povendor=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_povendor2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">SJN VENDOR</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_sjnvendor=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_sjnvendor1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_sjnvendor=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_sjnvendor2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_sjnvendor=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_sjnvendor2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">PACKING LIST</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_packcinglist=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_packinglist1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_packcinglist=="COPY")? "checked" : "" }}> 
                                                 <label class="form-check-label" for="dv_packinglist2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_packcinglist=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_packinglist2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">TEST REPORT</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_testreport=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_testreport1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_testreport=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_testreport2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_testreport=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_testreport2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                 </div>
                                 <br>
                                 <div class="row">
                                         <div class="col-md-2">
                                             <label class="form-label">BAPP/BAST</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_bapp=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_bapp1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_bapp=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_bapp2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_bapp=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_bapp2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">LPBB</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_lppb=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_lppb1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_lppb=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_lppb2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_lppb=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_lppb2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">KO</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_ko=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_ko1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_ko=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_ko2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_ko=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_ko2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                             <label class="form-label">SPP</label>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_spp=="ASLI")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_spp1">
                                                     ASLI
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_spp=="COPY")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_spp2">
                                                     COPY
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_spp=="-")? "checked" : "" }}>
                                                 <label class="form-check-label" for="dv_spp2">
                                                     -
                                                 </label>
                                             </div>
                                         </div>
                                 </div>
                         </div><!--end card-body-->
                     </div><!--end card-->
                 </div>
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Dokumen Impor</h4>
                         </div><!--end card-header-->
                         <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-2">
                                         <label class="form-label">PIB</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_pib" id="di_pib1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_pib=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_pib1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_pib" id="di_pib2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_pib=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_pib2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_pib" id="di_pib2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_pib=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_pib2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">AWB</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_bl" id="di_bl1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_bl=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_bl1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_bl" id="di_bl2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_bl=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_bl2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_bl" id="di_bl2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_bl=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_bl2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">COM</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_com" id="di_com1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_com=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_com1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_com" id="di_com2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_com=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_com2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_com" id="di_com2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_com=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_com2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">COO</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_coo" id="di_coo1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_coo=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_coo1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_coo" id="di_coo2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_coo=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_coo2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_coo" id="di_coo2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_coo=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_coo2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">INVOICE CUSTOM</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_invoicecustom=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_invoicecustom1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_invoicecustom=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_invoicecustom2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_invoicecustom=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_invoicecustom2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">SJN CUSTOM</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_sjncustom=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_sjncustom1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_sjncustom=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_sjncustom2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_sjncustom=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="di_sjncustom2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                         </div><!--end card-body-->
                     </div><!--end card-->
                 </div>
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Dokumen Customer</h4>
                         </div><!--end card-header-->
                         <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-2">
                                         <label class="form-label">MEMO INTERNAL</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_memointernal=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_memointernal1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_memointernal=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_memointernal2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal2" value="-"  {{ ($kasbon->kelengkapan->dcustomer->dc_memointernal=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_memointernal2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">SPPH</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph1" value="ASLI"  {{ ($kasbon->kelengkapan->dcustomer->dc_spph=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_spph1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_spph=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_spph2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_spph=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_spph2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">KO</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_ko=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_ko1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_ko=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_ko2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_ko=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_ko2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">LOI</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_loi=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_loi1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_loi=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_loi2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_loi=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_loi2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">PO CUSTOMER</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_invoicecustom=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_invoicecustom1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_invoicecustom=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_invoicecustom2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_invoicecustom=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_invoicecustom2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">SJN CUSTOMER</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_sjncustom=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_sjncustom1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_sjncustom=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_sjncustom2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_sjncustom=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dc_sjncustom2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                         </div><!--end card-body-->
                     </div><!--end card-->
                 </div>
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Dokumen Pajak</h4>
                         </div><!--end card-header-->
                         <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-3">
                                         <label class="form-label">KESESUAIAN FAKTUR</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur1" value="ASLI" {{ ($kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_kesesuaianfaktur1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur2" value="COPY" {{ ($kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_kesesuaianfaktur2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur2" value="-" {{ ($kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_kesesuaianfaktur2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <label class="form-label">PAJAK PENGHASILAN</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan1" value="ASLI" {{ ($kasbon->kelengkapan->dpajak->dp_pajakpenghasilan=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_pajakpenghasilan1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan2" value="COPY" {{ ($kasbon->kelengkapan->dpajak->dp_pajakpenghasilan=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_pajakpenghasilan2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan2" value="-" {{ ($kasbon->kelengkapan->dpajak->dp_pajakpenghasilan=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_pajakpenghasilan2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <label class="form-label">SURAT NON PKB</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp1" value="ASLI" {{ ($kasbon->kelengkapan->dpajak->dp_suratnonpkp=="ASLI")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_suratnonpkp1">
                                                 ASLI
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp2" value="COPY" {{ ($kasbon->kelengkapan->dpajak->dp_suratnonpkp=="COPY")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_suratnonpkp2">
                                                 COPY
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp2" value="-" {{ ($kasbon->kelengkapan->dpajak->dp_suratnonpkp=="-")? "checked" : "" }}>
                                             <label class="form-check-label" for="dp_suratnonpkp2">
                                                 -
                                             </label>
                                         </div>
                                     </div>
                                   
                                 </div>
                         </div><!--end card-body-->
                     </div><!--end card-->
                 </div>
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h4 class="card-title">Dokumen Dinas</h4>
                         </div><!--end card-header-->
                         <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-2">
                                         <label class="form-label">TICKET TRANSPORT</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_tickettransport" id="dd_tickettransport1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_tickettransport=="ADA")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_tickettransport1">
                                                 ADA
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_tickettransport" id="dd_tickettransport2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_tickettransport=="TIDAK")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_tickettransport2">
                                                 TIDAK
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">NOTA MAKAN</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_notamakan" id="dd_notamakan1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_notamakan=="ADA")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_notamakan1">
                                                 ADA
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_notamakan" id="dd_notamakan2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_notamakan=="TIDAK")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_notamakan2">
                                                 TIDAK
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">BOARDING PASS</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_boardingpass" id="dd_boardingpass1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_boardingpass=="ADA")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_boardingpass1">
                                                 ADA
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_boardingpass" id="dd_boardingpass2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_boardingpass=="TIDAK")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_boardingpass2">
                                                 TIDAK
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">NOTA PENGINAPAN</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_notapenginapan" id="dd_notapenginapan1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_notapenginapan=="ADA")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_notapenginapan1">
                                                 ADA
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_notapenginapan" id="dd_notapenginapan2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_notapenginapan=="TIDAK")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_notapenginapan2">
                                                 TIDAK
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">SPPD</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_sppd" id="dd_sppd1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_sppd=="ADA")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_sppd1">
                                                 ADA
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_sppd" id="dd_sppd2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_sppd=="TIDAK")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_sppd2">
                                                 TIDAK
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <label class="form-label">LAPORAN DINAS</label>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_lapdinas" id="dd_lapdinas1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_lapdinas=="ADA")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_lapdinas1">
                                                 ADA
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio" name="dd_lapdinas" id="dd_lapdinas2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_lapdinas=="TIDAK")? "checked" : "" }}>
                                             <label class="form-check-label" for="dd_lapdinas2">
                                                 TIDAK
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                         </div>
                         </div><!--end card-body-->
                 
                        <input value="{{$kasbon->id}}" class="text-muted mb-0" name="id" hidden> 
                        <table class="table table-borderless mt-0">
                           <thead>
                             <tr>
                               <th></th>
                               <th></th>
                             </tr>
                           </thead>
                          <qy><tbody id="tbodc">
                           @foreach ($kasbon->kelengkapan->keterangan->keterangan_detail as $detail)
                             <tr>
                               <td>
                                   <label class="mb-1">Kekurangan</label>
                                   <input type="text" name="kekurangan[]" id="kekurangan" class="form-control" value="{{$detail->kekurangan}}" >
                               </td>
                               <td hidden>
                                   <label class="mb-1">Tgl Kelengkapan</label>
                                   <input type="date" name="tgl_kelengkapan[]" id="" class="form-control" >
                               </td>
                               <td><a href="javascript:;" class="btn btn-outline-danger btn-sm deleteRow mt-4"> <span class="far fa-trash-alt me-1"></span>Delete</a></td>
                           </tr>
                           @endforeach
                           </tbody> </qy>
                         </table>
                         <k> <a href="javascript:;" class="btn btn-outline-secondary addRow btn-sm" >
                           <span class="fas fa-plus"></span> Tambah Kekurangan </a></k>
                <div class="row ">
                    <div class="col-sm-12 text-end"> 
                        <a href="#" type="button" onclick="form1()" class="btn btn-danger px-4">Back</a>  
                        <button  type="submit"  class="btn btn-primary px-4">Simpan</button>      
                    </div>
                </div>
              </div>
                        </div>
                </div>

                
                {!! Form::close() !!}    
      
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/cleave/dist/addons/cleave-phone.i18n.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/cleave/dist/cleave.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.form-upload.init.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.datatable.init.js') }}"></script>
<script src="assets/plugins/tippy/tippy.all.min.js"></script>
<script src="{{ URL::asset('assets/js/jquery.core.js') }}"></script>
<script>
   $('#form1').show();
   $('#form2').hide();
   function form1(){
       $('#form1').show();
       $('#form2').hide();
   }
   function form2(){
       $('#form1').hide();
       $('#form2').show();
   }
</script>
<script>
   $('k').on('click','.addRow', function(){
    var trc = '<tr>'+
            '<td>'+
                '<label class="mb-1">Kekurangan</label>'+
                '<input type="text" name="kekurangan[]" id="kekurangan" class="form-control" ></td>'+
                '<td hidden>'+
                '<label class="mb-1">Tgl Kelengkapan</label>'+
                '<input type="date" name="tgl_kelengkapan[]" id="" class="form-control" ></td>'+
            '<td>'+  
                '<a href="javascript:;" class="btn btn-sm btn-outline-danger deleteRow mt-3"> <span class="far fa-trash-alt me-1"></span>Delete</a></td>'+
        '</tr>';
   
       $('#tbodc').append(trc);
   });
   
   $('tbody').on('click','.deleteRow', function(){
       $(this).parent().parent().remove();
   });
   
   </script>
@endsection
