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
                <div class="col-sm-12">
                    @if(isset($pertanggungan->keterangan_pertanggungan))
                    <div class="alert alert-danger border-0" role="alert">
                      @foreach ($detail as $detail)
                      <strong>Catatan : </strong> {{$detail->keterangan ?? '-'}}
                      @endforeach
                      @endif
                  </div>
{{-- 
                    @if(isset($pertanggungan->keterangan_pertanggungan))
                    <div class="card-body"> 
                        <div class="alert alert-danger mb-0" role="alert">
                            <h4 class="alert-heading font-18">Catatan :</h4>
                            @foreach ($detail as $detail)
                            <p>[{{$loop->iteration}}] {{$detail->keterangan}}</p>
                            @endforeach
                        </div>                                     
                    </div><!--end card-body-->  
                    @endif --}}
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="1-form-edit">Form edit Pertanggungan 1</h4>
                            <h4 class="card-title" id="2-form-edit">Form edit Pertanggungan 2</h4>
                        </div><!--end card-header-->
                        <input type="text" value={{$pertanggungan->kasbon->id_user}} hidden>
                        <input type="text" value={{$pertanggungan->kasbon->id_user}} hidden>
                        <div class="card-body form-wizard-wrapper">
                            {!! Form::model($pertanggungan, ['method' => 'PATCH','route' => ['pertanggungan.update', $pertanggungan->id],'class' => 'form-parsley']) !!}
                                <input value="{{$pertanggungan->id}}" class="text-muted mb-0" name="id" hidden>
                                {{ csrf_field() }}
                               @include('pertanggungan.edit-1')
                               @include('pertanggungan.edit-2')
                               {!! Form::close() !!}
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
        $('#1-form-edit').show();
        $('#2-form-edit').hide();
        $('#3-form-edit').hide();
        $('#4-form-edit').hide();
        $('#5-form-edit').hide();
        $('#6-form-edit').hide();
        $('#form-edit-1').show();
        $('#form-edit-2').hide();
        $('#form-edit-3').hide();
        $('#form-edit-4').hide();
        $('#form-edit-5').hide();
        $('#form-edit-6').hide();

        function form1(){
            $('#form-edit-1').show();
            $('#form-edit-2').hide();
            $('#1-form-edit').show();
            $('#2-form-edit').hide();
        }
        function form2(){
            $('#form-edit-1').hide();
            $('#form-edit-2').show();
            $('#1-form-edit').hide();
            $('#2-form-edit').show();
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
