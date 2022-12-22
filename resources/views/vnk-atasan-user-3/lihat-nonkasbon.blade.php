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
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No. Non Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->no_nonkasbon}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kode Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->kodekasbon}}</td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Jenis Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->jenis}}</td>                                           
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Tanggal Masuk</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->tglmasuk->format('m/d/Y')}}</td>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kurs</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->kurs->code}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No. Invoice</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->noinvoice}}</td>                                                     
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Jam Masuk</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->jammasuk}}</td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nilai / DPP</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->iddpp)}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nama Vendor</p>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->namavendor}}</td>                                                   
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">User</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->user->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PPH</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>({{$nonkasbon->pph->name ?? '-'}}) {{number_format($nonkasbon->idpph ?? '-')}}</td>  
                                        <td >
                                            <p class=" align-middle mb-0 product-name">Proyek</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td> {{$nonkasbon->proyek}}</td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">NIP</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->user->nip}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PPN</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->idppn) ?? '-'}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Tujuan Pembayaran</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="width:30%">{{$nonkasbon->tujuanpembayaran}}</td>        
                                    </tr>  
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Unit</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->user->unit->name}}</td>   
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nominal Kasbon</p>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->total)}}</td>
                                    </tr>                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-sm-12 text-end">
                    <a href="{{ route('vnk-atasan-user-3.index') }}" type="button" class="btn btn-danger px-4">Back</a>
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
