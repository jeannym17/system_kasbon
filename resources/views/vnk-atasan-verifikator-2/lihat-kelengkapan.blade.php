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
                           <h4 class="card-title" style="display: inline;">Kelengkapan Dokumen</h4>
                        
                           <p class="text-muted mb-0">
                           </p>
                       </div><!--end card-header-->
                       
                           <table class="table  table-bordered table-sm t1">
                               <tbody>
                               <tr>
                                   <th style="width: 70%;text-align:center">Dokumen</th>
                                   <th style="text-align:center">Nominal</th>
                                   {{-- <th style="width: 0%" class="text-center"></th> --}}
                               </tr>
                               @foreach ($nonkasbon->dokumennk->dokumennkd as $item)
                               <tr class="item">
                                   <td>{{$item->dokumen}}</td>
                                   <td> {{number_format($item->nominal)}}</td>
                                   @endforeach
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                           <th class="text-center"><strong>TOTAL NOMINAL</strong></th>
                                           <th>
                                               <div class="input-group">
                                                   <span class="input-group-text"> {{number_format($nonkasbon->dokumennk->total)}}</span>
                                              </th>
                                           </div>
                                           {{-- <th></th> --}}
                                       </tr>
                                   </tfoot>
                           </table>
               </div> <!-- end col -->
               <div class="row">
                <div class="col-sm-12 text-end">
                    <a href="{{ route('vnk-atasan-verifikator-2.index') }}" type="button" class="btn btn-danger px-4">Back</a>
                </div>
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
<script src="assets/plugins/tippy/tippy.all.min.js"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
