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
            @slot('li_2') Lihat Dokumen @endslot
            @slot('li_3') Lihat @endslot
            @slot('title') Lihat Dokumen @endslot
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
                            <h4 class="card-title" style="display: inline;">Lampiran Dokumen</h4>
                         
                            <p class="text-muted mb-0">
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <iframe src="{{asset('storage/post-file/'.$kasbon->file)}}" width="700" height="700" class="col-lg-12 col-md-12 col-sm-12"></iframe>
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
