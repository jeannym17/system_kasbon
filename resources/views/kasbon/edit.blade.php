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
                        {{-- @if(isset($kasbon->kelengkapan->keterangan))
                        
                        <div class="card-body"> 
                            <div class="alert alert-danger mb-0" role="alert">
                                <h4 class="alert-heading font-18">Catatan :</h4>
                                @foreach ($detail as $detail)
                                <p>{{$detail->keterangan}}</p>
                                @endforeach
                            </div>                                     
                        </div><!--end card-body-->  
                        @endif
                          @error('error')
                              <div class="alert">
                                  {{$message}}
                              </div>
                          @enderror --}}
                          @if(isset($kasbon->kelengkapan->keterangan))
                          <div class="alert alert-danger border-0" role="alert">
                            @foreach ($detail as $detail)
                            <strong>Catatan : </strong> {{$detail->keterangan ?? '-'}}
                            @endforeach
                            @endif
                        </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="card form-wizard-wrapper">
                              <div class="card-header">
                                  <h4 class="card-title" id="1-form-entry">Form Edit Rencana / Realisasi 1</h4>
                                  <h4 class="card-title" id="2-form-entry">Form Edit Rencana / Realisasi 2</h4>
                                  <h4 class="card-title" id="3-form-entry">Form Edit Rencana / Realisasi 3</h4>
                                  <h4 class="card-title" id="4-form-entry">Form Edit Rencana / Realisasi 4</h4>
                              </div><!--end card-header-->
                              <div class="card-body">
                                {!! Form::model($kasbon, ['method' => 'PATCH','route' => ['kasbon.update', $kasbon->id],'class' => 'form-parsley','enctype' => 'multipart/form-data']) !!}
                                      {{ csrf_field() }}
                                     @include('kasbon.edit-1')
                                     @include('kasbon.edit-2')
                                     @include('kasbon.edit-3')
                                     @include('kasbon.edit-4')
                                     {!! Form::close() !!}
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

<!-- Script -->
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
  $('#1-form-entry').show();
  $('#2-form-entry').hide();
  $('#3-form-entry').hide();
  $('#4-form-entry').hide();
  $('#form-entry-1').show();
  $('#form-entry-2').hide();
  $('#form-entry-3').hide();
  $('#form-entry-4').hide();
  function form1(){
      $('#form-entry-1').show();
      $('#form-entry-2').hide();
      $('#form-entry-3').hide();
      $('#form-entry-4').hide();
      $('#1-form-entry').show();
      $('#2-form-entry').hide();
      $('#3-form-entry').hide();
      $('#4-form-entry').hide();
  }
  function form2(){
      $('#form-entry-1').hide();
      $('#form-entry-2').show();
      $('#form-entry-3').hide();
      $('#form-entry-4').hide();
      $('#1-form-entry').hide();
      $('#2-form-entry').show();
      $('#3-form-entry').hide();
      $('#4-form-entry').hide();
  }
  function form3(){
      $('#form-entry-1').hide();
      $('#form-entry-2').hide();
      $('#form-entry-3').show();
      $('#form-entry-4').hide();
      $('#1-form-entry').hide();
      $('#2-form-entry').hide();
      $('#3-form-entry').show();
      $('#4-form-entry').hide();
  }
  function form4(){
      $('#form-entry-1').hide();
      $('#form-entry-2').hide();
      $('#form-entry-3').hide();
      $('#form-entry-4').show();
      $('#1-form-entry').hide();
      $('#2-form-entry').hide();
      $('#3-form-entry').hide();
      $('#4-form-entry').show();
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
new Cleave('.dollarppn', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
    </script>
<script>
    $(function() {
  $('#input1,#input2,#input3').on('input', function() {
    $('#Voltes5').val(
      $('#input1,#input2,#input3').map(function() {
        return $(this).val();
      }).get().join(';') /* added space */
    );
  });
});
</script> 
@endsection
