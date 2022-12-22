@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/jquery-steps/jquery.steps.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/0.7.17/cleave.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Forms @endslot
            <!-- @slot('li_3') Wizard @endslot
            @slot('title') Wizard @endslot -->
            @slot('li_3') Verifikasi @endslot
            @slot('title') Verifikasi @endslot
        @endcomponent
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        </style>
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
                            <h4 class="card-title" id="1-form-entry">Form Entry Pertanggungan 1</h4>
                            <h4 class="card-title" id="2-form-entry">Form Entry Pertanggungan 2</h4>
                            <h4 class="card-title" id="3-form-entry">Dokumen Impor</h4>
                            <h4 class="card-title" id="4-form-entry">Dokumen Pajak</h4>
                            <h4 class="card-title" id="5-form-entry">Dokumen Dinas</h4>
                            <h4 class="card-title" id="6-form-entry">Keterangan</h4>
                        </div><!--end card-header-->
                        <input type="text" value={{$kasbon->id_user}} hidden>
                        <input type="text" value={{$kasbon->id_user}} hidden>
                        <div class="card-body form-wizard-wrapper">
                            <form  action="{{ route('pertanggungan.store') }}" method="post" class="form-parsley" >
                                <input value="{{$kasbon->id}}" class="text-muted mb-0" name="id" hidden>
                                {{ csrf_field() }}
                               @include('pertanggungan.entry-1')
                               @include('pertanggungan.entry-2')
                            </form>   
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div>

@endsection

@include('kasbon.script')

@section('script')
    <script src="{{ URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/jquery.form-wizard.init.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/cleave/dist/addons/cleave-phone.i18n.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/cleave/dist/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
 <script>
        $('#1-form-entry').show();
        $('#2-form-entry').hide();
        $('#3-form-entry').hide();
        $('#4-form-entry').hide();
        $('#5-form-entry').hide();
        $('#6-form-entry').hide();
        $('#form-entry-1').show();
        $('#form-entry-2').hide();
        $('#form-entry-3').hide();
        $('#form-entry-4').hide();
        $('#form-entry-5').hide();
        $('#form-entry-6').hide();

        function form1(){
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
        function form2(){
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
        function form3(){
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
        function form4(){
            $('#form-entry-vendor').hide();
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
        function form5(){
            $('#form-entry-vendor').hide();
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
        function form6(){
            $('#form-entry-vendor').hide();
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
    <script>

        new Cleave('.dollar', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        new Cleave('.dollar1', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        new Cleave('.dollarselisih', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        
          </script>
@endsection
