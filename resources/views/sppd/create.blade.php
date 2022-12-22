@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/sc-2.0.7/datatables.min.css"/>

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
                            <h4 class="card-title" id="1-form-entry">{{$nomer}}</h4>
                            <h4 class="card-title" id="3-form-entry">Lembar Verifikasi</h4>
                            <h4 class="card-title" id="2-form-entry">Keterangan</h4>
                        </div><!--end card-header-->
                        <div class="card-body bootstrap-select-1 form-wizard-wrapper">
                            <form  action="{{ route('sppd.store') }}" method="post" class="form-parsley">
                                {{ csrf_field() }}
                                @include('sppd.entry-1')
                            </form>   
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div>
           
@endsection


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
<script src="{{ URL::asset('assets/plugins/tiny-editable/mindmup-editabletable.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/tiny-editable/numeric-input-example.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootable/bootstable.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.tabledit.init.js') }}"></script>
<script src=https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/sc-2.0.7/datatables.min.js"></script>


 <script>
        $('#1-form-entry').show();
        $('#2-form-entry').hide();
        $('#3-form-entry').hide();
        $('#form-entry-1').show();
        $('#form-entry-2').hide();
        $('#form-entry-3').hide();

        function form1(){
            $('#form-entry-1').show();
            $('#form-entry-2').hide();
            $('#form-entry-3').hide();
            $('#1-form-entry').show();
            $('#2-form-entry').hide();
            $('#3-form-entry').hide();
           
        }
        function form2(){
            $('#form-entry-1').hide();
            $('#form-entry-2').hide();
            $('#form-entry-3').show();
            $('#1-form-entry').hide();
            $('#2-form-entry').hide();
            $('#3-form-entry').show();
           
        }
        function form3(){
            $('#form-entry-1').hide();
            $('#form-entry-2').show();
            $('#form-entry-3').hide();
            $('#1-form-entry').hide();
            $('#2-form-entry').show();
            $('#3-form-entry').hide();
           
        }
    </script>
@endsection


