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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="display: inline;">Kasbon</h4>
                         
                            <p class="text-muted mb-0">
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <table class="table mb-0" style="text-align:justify" >
                                <tbody >
                                    <tr >
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->nokasbon}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">NIP</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->user->nip}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nama Vendor</p>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->namavendor}}</td>                                      
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Tanggal Masuk</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->tglmasuk->format('m/d/Y')}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">User</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->user->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Tgl JTT</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{ $kasbon->tgltempo ? $kasbon->tgltempo->format('m/d/Y')  : '-' }}</td>                                                         
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Jam Masuk</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->jammasuk}}</td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Unit</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->user->unit->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No Invoice</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->noinvoice}}</td>                                             
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->jeniskasbon}} </td>    
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kurs</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kurs->code}}</td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">SPPH/KOI/LOI</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->spph}}</td>   
                                    </tr>  
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kode Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kodekasbon->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nilai/DPP</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kurs->symbol}} {{number_format($kasbon->iddpp)}}</td>   
                                        <td>
                                            <p class=" align-middle mb-0 product-name">SJN</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{ $kasbon->sjn ?? '-' }}</td>                                              
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Jenis Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->jenis->name}}</td>   
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PPN</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kurs->symbol}} {{number_format($kasbon->idppn)}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No. PI (FOCUS)</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{ $kasbon->sjn ?? '-' }}</td>                                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PO Vendor</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->po_vendor}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PPH</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>({{ $kasbon->pph->name ?? '' }}) {{$kasbon->kurs->symbol}} {{number_format($kasbon->idpph)}}</td>    
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Proyek</p>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="width:30%">{{$kasbon->proyek}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PO Customer</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->po_customer}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nominal Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}</td>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Uraian</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->uraianpengguna}}</td>    
                                    </tr>      
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Bank</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->id_bank ?? ''}}</td>   
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nama Rekening</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->namarek}}</td>    
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nomor Rekening</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->norek}}</td>   
                                    </tr>                          
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-sm-12 text-end">
                    <a href="{{ route('vkb-atasan-user-3.index') }}" type="button" class="btn btn-danger px-4">Back</a>
                </div>
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
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
