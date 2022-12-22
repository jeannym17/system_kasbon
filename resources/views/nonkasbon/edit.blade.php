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
    @endsection
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Forms @endslot
            @slot('li_3') Non Kasbon @endslot
            @slot('title') Entry @endslot
        @endcomponent
            <div class="row">
                {{-- <div class="col-12">
                    @error('error')
                        <div class="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div> --}}
                <div class="col-sm-12">
                    @if(isset($nonkasbon->keterangannonkasbon))
                    <div class="alert alert-danger border-0" role="alert">
                      @foreach ($detail as $detail)
                      <strong>Catatan : </strong> {{$detail->keterangan ?? '-'}}
                      @endforeach
                      @endif
                  </div>
                <div class="col-sm-12">
                    <div class="card form-wizard-wrapper">
                        <div class="card-header">
                            <h4 class="card-title" id="1-form-edit">Form Edit Non Kasbon - 1</h4>
                            <h4 class="card-title" id="2-form-edit">Form Edit Non Kasbon - 2</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            {!! Form::model($nonkasbon, ['method' => 'PATCH','route' => ['nonkasbon.update', $nonkasbon->id],'class' => 'form-parsley']) !!}
                            {{ csrf_field() }}
                            @include('nonkasbon.edit-1')
                            @include('nonkasbon.edit-2')
                            {!! Form::close() !!}
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div>

@endsection

@include('nonkasbon.script')

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
<script type="text/javascript">

    // CSRF Token
    
    $(document).ready(function(){
        $('#employee_search').on('input', function() {
    if (!$('#employee_search').val()) {
      $('#employeeunit').val('');
      $('#employeename').val('');
    }
    })
    
     $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': '{{csrf_token()}}'
             }
         });
      $( "#employee_search" ).autocomplete({
         source: function( request, response ) {
            // Fetch data
            $.ajax({
              url:"{{route('kasbon.findUser')}}",
              type: 'post',
              dataType: "json",
              data: {
                 search: request.term
              },
              success: function( data ) {
                 response( data );
              }
            });
         },
         select: function (event, ui) {
           // Set selection
           $('#employee_search').val(ui.item.label); // display the selected text
           $('#employeeunit').val(ui.item.unit);
           $('#employeename').val(ui.item.name); // save selected id to input
           return false;
         }
         
      });
    
    });
    </script>
 <script>
          $('#1-form-edit').show();
        $('#form-edit-1').show();
        $('#2-form-edit').hide();
        $('#form-edit-2').hide();
        function form1(){
            $('#form-edit-1').show();
            $('#1-form-edit').show();
            $('#2-form-edit').hide();
            $('#form-edit-2').hide();
        }  
        function form2(){
            $('#form-edit-1').hide();
            $('#1-form-edit').hide();
            $('#2-form-edit').show();
            $('#form-edit-2').show();
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
        new Cleave('.dollarpph', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        new Cleave('.dollark', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
          </script>
@endsection
