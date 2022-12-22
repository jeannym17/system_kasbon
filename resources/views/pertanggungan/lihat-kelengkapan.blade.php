@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Forms @endslot
            <!-- @slot('li_3') Wizard @endslot
            @slot('title') Wizard @endslot -->
            @slot('li_3') Verifikasi @endslot
            @slot('title') Verifikasi @endslot
        @endcomponent
            <div class="row">
                <div class="col-12">
                    @error('error')
                        <div class="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="cek-form-entry">Show {{$pertanggungan->kasbon->nokasbon}}</h4>
                            <h4 class="card-title" id="1-form-entry">Dokumen Vendor</h4>
                            <h4 class="card-title" id="2-form-entry">Dokumen Customer</h4>
                            <h4 class="card-title" id="3-form-entry">Dokumen Impor</h4>
                            <h4 class="card-title" id="4-form-entry">Dokumen Pajak</h4>
                            <h4 class="card-title" id="5-form-entry">Dokumen Dinas</h4>
                            <h4 class="card-title" id="6-form-entry">Keterangan</h4>
                        </div><!--end card-header-->
                        <div class="card-body bootstrap-select-1 form-wizard-wrapper">
                            <form  action="{{ route('pertanggungan.storee', $pertanggungan->id) }}" method="post" class="form-parsley" >
                                <input value="{{$pertanggungan->id}}" class="text-muted mb-0" name="id" hidden>
                                {{ csrf_field() }}
                                <div class="col-sm-12">
                                    <div class="card form-wizard-wrapper">
                                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">                                            
                                                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                    <input class="form-control" name="tglmasuk" type="date" value="{{$pertanggungan->kasbon->tglmasuk}}" id="example-date-input" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Jam Masuk</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">                                            
                                            <span class="input-group-text"><i class="ti ti-alarm-clock font-16"></i></span>
                                            <input class="form-control" type="time" name="jammasuk" value="{{$pertanggungan->kasbon->jammasuk}}" disabled>
                                            </div>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Kasbon Rencana / Realisasi</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" name="jeniskasbon" value="{{$pertanggungan->kasbon->jeniskasbon}}" disabled>
                                        </div>                
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" value="">User</label>
                                            <div class="col-lg-8">
                                                <input-type="text" class="form-control" value="{{$pertanggungan->kasbon->username}}" id="username" name="username" disabled>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtLastNameShipping" class="col-lg-4 col-form-label">NIP</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->nip}}" aria-label="Disabled input example" nama="nip" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtCompanyShipping" class="col-lg-4 col-form-label">Unit</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" value="{{$pertanggungan->kasbon->unit->name}}" aria-label="Disabled input example" nama="id_unit" disabled readonly>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtEmailAddressBilling" class="col-lg-4 col-form-label">No. Dokumen Sebelumnya</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->doksebelumnya}}" aria-label="Disabled input example" name="doksebelumnya" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">Kode Kasbon</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" value="{{$pertanggungan->kasbon->kodekasbon->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled readonly>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col--> 
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Kurs</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" value="{{$pertanggungan->kasbon->kurs->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled readonly>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtCityShipping" class="col-lg-4 col-form-label">Proyek</label>
                                            <div class="col-lg-8">
                                                <input id="proyek" name="proyek" type="text" class="form-control" value="{{$pertanggungan->kasbon->proyek}}" disabled>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtAddress1Billing" class="col-lg-4 col-form-label">Uraian Penggunaan</label>
                                            <div class="col-lg-8">
                                                <textarea id="uraianpengguna" name="uraianpengguna" rows="4" class="form-control" disabled>{{$pertanggungan->kasbon->uraianpengguna}}</textarea>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="txtCityShipping" class="col-lg-4 col-form-label">Jenis Kasbon</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" value="{{$pertanggungan->kasbon->jeniskasbon}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled >
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                                </div>
                                        </div>
                                    </div>
                                <div class="col-sm-12">
                                    <div class="card form-wizard-wrapper">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row" >
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai / DPP</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input  id="iddpp" class="form-control"  name="iddpp" value="{{number_format($pertanggungan->kasbon->iddpp)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PPN</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control input-numera" id="idppn" class="form-control"  name="idppn" value="{{number_format($pertanggungan->kasbon->idppn)}}" disabled>
                                                        </div>   
                                                    </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">PPH</label>
                                                        <div class="col-lg-4">
                                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->pph->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled >
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input class="form-control input-numera"id="idpph" class="form-control"  name="idpph" value="{{number_format($pertanggungan->kasbon->idpph)}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input class="form-control input-numer" id="total" name="total" disabled value="{{number_format($pertanggungan->kasbon->total)}}">
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">SJN</label>
                                                        <div class="col-lg-8">
                                                            <input id="txtNameCard" name="sjn" type="text" class="form-control input-sj"  value="{{$pertanggungan->kasbon->sjn}}" disabled> 
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Harga Jual Ke Customer</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input class="form-control input-num" name="harga_jual" value="{{number_format($pertanggungan->kasbon->harga_jual)}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">PO Vendor</label>
                                                        <div class="col-lg-8">
                                                            <input id="txtNameCard" name="po_vendor" type="text" class="form-control input-v" data-parsley-minlength="17" value="{{$pertanggungan->kasbon->po_vendor}}" disabled>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">PO Customer</label>
                                                        <div class="col-lg-8">
                                                            <input id="po_customer" name="po_customer" type="text" class="form-control" value="{{$pertanggungan->kasbon->po_customer}}" disabled>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                    <div class="card form-wizard-wrapper">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Vendor</label>
                                                    <div class="col-lg-8">
                                                        <input  type="text" class="form-control" name ="namavendor" value="{{$pertanggungan->kasbon->namavendor}}" disabled>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row POC">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Tanggal Jatuh Tempo</label>
                                                    <div class="col-lg-4">
                                                        <input id="txtNameCard"  class="form-control" name="haritempo" value="{{$pertanggungan->kasbon->haritempo}}" disabled>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">                                            
                                                            <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                        <input-type="text" class="form-control"  type="date"  id="example-date-input" name="tgltempo" value="{{$pertanggungan->kasbon->tgltempo}}" disabled>    
                                                        </div>
                                                    </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">No. Invoice</label>
                                                    <div class="col-lg-8">
                                                        <input id="txtNameCard" name="noinvoice" type="text" class="form-control input-noi" data-parsley-minlength="10" value="{{$pertanggungan->kasbon->noinvoice}}" disabled> 
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">SPPH/KOI/LOI</label>
                                                    <div class="col-lg-8">
                                                        <input id="txtNameCard" name="spph" type="text" class="form-control input-koi" data-parsley-minlength="20" value="{{$pertanggungan->kasbon->spph}}" disabled>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Perkiraan Barang Datang</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">                                            
                                                            <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                        <input id="txtNameCard" name="barang_datang" type="date" class="form-control" value="{{$pertanggungan->kasbon->barang_datang}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">No. PI (FOCUS)</label>
                                                    <div class="col-lg-8">
                                                        <input id="txtNameCard" name="nopi" type="text" class="form-control input-pi" data-parsley-minlength="17" value="{{$pertanggungan->kasbon->nopi}}" disabled>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                    <div class="card form-wizard-wrapper">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row" >
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">No VKB Kasbon</label>
                                                    <div class="col-lg-8">
                                                        <input   class="form-control"  value="{{$pertanggungan->novkbkasbon}}" disabled>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Tgl Bayar ke User</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                        <input class="form-control" type="date" class="form-control"  name="idppn" value="{{$pertanggungan->tglbayarkeuser}}" disabled>
                                                        </div>   
                                                    </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai Pertanggungjawaban</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input class="form-control"class="form-control" value="{{number_format($pertanggungan->nilaiptj)}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Tanggal Pertanggungjawaban</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                            <input class="form-control" type="date" class="form-control" value="{{$pertanggungan->tglptj}}" disabled>
                                                            </div>  
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Selisih Pertanggungjawaban</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input class="form-control" type="date" class="form-control" value="{{number_format($pertanggungan->selisihptj)}}" disabled>
                                                            </div>  
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">No VKB Selisih PTJ</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input class="form-control" value="{{$pertanggungan->novkbselisihptj}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai Selisih PTJ</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input  type="text" class="form-control" value="{{number_format($pertanggungan->nilaiselisihptj)}}" disabled>
                                                        </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="txtNameCard" class="col-lg-4 col-form-label">Selisih PTJ Akhir</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                            <input type="text" class="form-control" value="{{number_format($pertanggungan->selisihptjakhir)}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group-->
                                                </div><!--end col-->
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </form>   
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div class="row mt-3">
                    <div class="col-sm-12 text-end">
                        <a href="{{route('pertanggungan.index')}}" class="btn btn-danger">Cancel</a>  
                        <a href="#" type="button" onclick="form2()" class="btn btn-primary px-4">Next</a>      
                    </div>
                </div>
            </div>
            </div>
         
           
@endsection

@include('kasbons.script')

@section('script')
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/huebee/huebee.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.form-repeater.js') }}"></script>


 <script>
        $('#cek-form-entry').show();
        $('#1-form-entry').hide();
        $('#2-form-entry').hide();
        $('#3-form-entry').hide();
        $('#4-form-entry').hide();
        $('#5-form-entry').hide();
        $('#6-form-entry').hide();
        $('#form-entry-cek').show();
        $('#form-entry-1').hide();
        $('#form-entry-2').hide();
        $('#form-entry-3').hide();
        $('#form-entry-4').hide();
        $('#form-entry-5').hide();
        $('#form-entry-6').hide();

        function form1(){
            $('#cek-form-entry').show();
            $('#form-entry-cek').show();
            $('#form-entry-1').hide();
            $('#form-entry-2').hide();
            $('#form-entry-3').hide();
            $('#form-entry-4').hide();
            $('#form-entry-5').hide();
            $('#form-entry-6').hide();
            $('#1-form-entry').show();
            $('#2-form-entry').hide();
            $('#3-form-entry').hide();
            $('#4-form-entry').hide();
            $('#5-form-entry').hide();
            $('#6-form-entry').hide();
        }
        function form2(){
            $('#cek-form-entry').hide();
            $('#form-entry-cek').hide();
            $('#form-entry-1').show();
            $('#form-entry-2').hide();
            $('#form-entry-3').hide();
            $('#form-entry-4').hide();
            $('#form-entry-5').hide();
            $('#form-entry-6').hide();
            $('#1-form-entry').show();
            $('#2-form-entry').hide();
            $('#3-form-entry').hide();
            $('#4-form-entry').hide();
            $('#5-form-entry').hide();
            $('#6-form-entry').hide();
        }
        function form3(){
            $('#cek-form-entry').hide();
            $('#form-entry-cek').hide();
            $('#form-entry-1').hide();
            $('#form-entry-2').show();
            $('#form-entry-3').hide();
            $('#form-entry-4').hide();
            $('#form-entry-5').hide();
            $('#form-entry-6').hide();
            $('#1-form-entry').hide();
            $('#2-form-entry').show();
            $('#3-form-entry').hide();
            $('#4-form-entry').hide();
            $('#5-form-entry').hide();
            $('#6-form-entry').hide();
        }
        function form4(){
            $('#cek-form-entry').hide();
            $('#form-entry-cek').hide();
            $('#form-entry-1').hide();
            $('#form-entry-2').hide();
            $('#form-entry-3').show();
            $('#form-entry-4').hide();
            $('#form-entry-5').hide();
            $('#form-entry-6').hide();
            $('#1-form-entry').hide();
            $('#2-form-entry').hide();
            $('#3-form-entry').show();
            $('#4-form-entry').hide();
            $('#5-form-entry').hide();
            $('#6-form-entry').hide();
        }
        function form5(){
            $('#cek-form-entry').hide();
            $('#form-entry-cek').hide();
            $('#form-entry-1').hide();
            $('#form-entry-2').hide();
            $('#form-entry-3').hide();
            $('#form-entry-4').show();
            $('#form-entry-5').hide();
            $('#form-entry-6').hide();
            $('#1-form-entry').hide();
            $('#2-form-entry').hide();
            $('#3-form-entry').hide();
            $('#4-form-entry').show();
            $('#5-form-entry').hide();
            $('#6-form-entry').hide();
        }
        function form6(){
            $('#cek-form-entry').hide();
            $('#form-entry-cek').hide();
            $('#form-entry-1').hide();
            $('#form-entry-2').hide();
            $('#form-entry-3').hide();
            $('#form-entry-4').hide();
            $('#form-entry-5').show();
            $('#form-entry-6').hide();
            $('#1-form-entry').hide();
            $('#2-form-entry').hide();
            $('#3-form-entry').hide();
            $('#4-form-entry').hide();
            $('#5-form-entry').show();
            $('#6-form-entry').hide();
        }
        function form7(){
            $('#cek-form-entry').hide();
            $('#form-entry-cek').hide();
            $('#form-entry-1').hide();
            $('#form-entry-2').hide();
            $('#form-entry-3').hide();
            $('#form-entry-4').hide();
            $('#form-entry-5').hide();
            $('#form-entry-6').show();
            $('#1-form-entry').hide();
            $('#2-form-entry').hide();
            $('#3-form-entry').hide();
            $('#4-form-entry').hide();
            $('#5-form-entry').hide();
            $('#6-form-entry').show();
        }
    </script>
@endsection


