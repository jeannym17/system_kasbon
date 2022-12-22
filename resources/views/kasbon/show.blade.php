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
@endsection

      
          @section('content')
              @component('components.breadcrumb')
                  @slot('li_1') IMST @endslot
                  @slot('li_2') Forms @endslot
                  @slot('li_3') Entry Kasbon @endslot
                  @slot('title') Entry @endslot
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
                          <div class="card form-wizard-wrapper">
                              <div class="card-header">
                                  <h4 class="card-title" id="1-form-show">Show Kasbon Rencana / Realisasi 1</h4>
                                  <h4 class="card-title" id="2-form-show">Show Kasbon Rencana / Realisasi 2</h4>
                                  <h4 class="card-title" id="3-form-show">Show Kasbon Rencana / Realisasi 3</h4>
                                  <h4 class="card-title" id="4-form-show">Show Kasbon Rencana / Realisasi 4</h4>
                              </div><!--end card-header-->
                              <div class="card-body">
                                     @include('kasbon.show-1')
                                     @include('kasbon.show-2')
                                     @include('kasbon.show-3')
                                     @include('kasbon.show-4')
                              </div><!--end card-body-->
                          </div><!--end card-->
                      </div><!--end col-->
                  </div>
    

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
<script>
    $('#1-form-show').show();
    $('#2-form-show').hide();
    $('#3-form-show').hide();
    $('#4-form-show').hide();
    $('#form-show-1').show();
    $('#form-show-2').hide();
    $('#form-show-3').hide();
    $('#form-show-4').hide();
    function form1(){
        $('#form-show-1').show();
        $('#form-show-2').hide();
        $('#form-show-3').hide();
        $('#form-show-4').hide();
        $('#1-form-show').show();
        $('#2-form-show').hide();
        $('#3-form-show').hide();
        $('#4-form-show').hide();
    }
    function form2(){
        $('#form-show-1').hide();
        $('#form-show-2').show();
        $('#form-show-3').hide();
        $('#form-show-4').hide();
        $('#1-form-show').hide();
        $('#2-form-show').show();
        $('#3-form-show').hide();
        $('#4-form-show').hide();
    }
    function form3(){
        $('#form-show-1').hide();
        $('#form-show-2').hide();
        $('#form-show-3').show();
        $('#form-show-4').hide();
        $('#1-form-show').hide();
        $('#2-form-show').hide();
        $('#3-form-show').show();
        $('#4-form-show').hide();
    }
    function form4(){
        $('#form-show-1').hide();
        $('#form-show-2').hide();
        $('#form-show-3').hide();
        $('#form-show-4').show();
        $('#1-form-show').hide();
        $('#2-form-show').hide();
        $('#3-form-show').hide();
        $('#4-form-show').show();
    }
</script>
@endsection
