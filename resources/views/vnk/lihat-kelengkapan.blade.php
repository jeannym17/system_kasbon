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
        
                <div class="card-body" id="form1">
                  {!! Form::model($nonkasbon, ['method' => 'PATCH','route' => ['vnk.update', $nonkasbon->id],'class' => 'form-parsley','id' => 'myForm']) !!}
                  {{ csrf_field() }}
                  <input value="{{$nonkasbon->id}}" class="text-muted mb-0" name="id" hidden>
                  <div class="col-lg-12">
                                 <div class="row">
                                    <table class="table  table-bordered table-sm t1">
                                        <tbody>
                                        <tr>
                                            <th style="width: 70%;text-align:center">Dokumen</th>
                                            <th style="text-align:center">Nominal</th>
                                            <th style="width: 0%" class="text-center"></th>
                                        </tr>
                                        @if (isset($nonkasbon->dokumennk->id)) 
                                            @foreach ($nonkasbon->dokumennk->dokumennkd as $item)
                                        <tr class="item">
                                            <td><input name="dokumen[]" class="form-control" value="{{$item->dokumen ?? ''}}" required parsley/></td></td>
                                            <td><input name="nominal[]" class="qnty amount form-control" value="{{$item->nominal ?? ''}}" required parsley /></td>
                                            <td class="text-end">
                                                <button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2 delete" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td>
                                            </tr>
                                            @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center"><strong>TOTAL NOMINAL</strong></th>
                                                    <th><input id="netto" readonly="readonly" class="form-control"  name="total"  value="{{$nonkasbon->dokumennk->total ?? ''}}"></th>
                                                    <th></th>
                                                </tr>
                                            </tbody>
                                                </tfoot>
                                                @else
                                                <tr class="item">
                                                    <td><input name="dokumen[]" class="form-control"  required parsley/></td></td>
                                                    <td><input name="nominal[]" class="qnty amount form-control"  required parsley /></td>
                                                    <td class="text-end">
                                                        {{-- <button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2 btn_remove" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td> --}}
                                                        <button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2 delete"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                                    </tr>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-center"><strong>TOTAL NOMINAL</strong></th>
                                                            <th><input id="netto" readonly="readonly" class="form-control"  name="total" ></th>
                                                            <th></th>
                                                        </tr>
                                                    </tbody>
                                                        </tfoot>
                                                @endif
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <a class="btn btn-success btn-sm addRow">Add New Row</a>    
                                        </div>
                                    </div>
                                    
                                    <br />
                <div class="row ">
                    <div class="col-sm-12 text-end"> 
                           
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-end">
                        <button  type="submit"  class="btn btn-primary px-4">Simpan</button>   
                        <a href="{{ route('vnk.index') }}" type="button" class="btn btn-danger px-4">Back</a>
                    </div>
                </div>
              </div>

                
                {!! Form::close() !!}    
      
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

    $(document).ready(function () {
    
        // $('k').on('click','.addRow', function(){
        //     var tr = '<tr>'+
        //         '<td>'+
        //             '<label class="mb-1">Catatan</label>'+
        //             '<input type="text" name="kekurangan[]" id="kekurangan" class="form-control" required parsley></td>'+
        //         '<td>'+  
        //             '<a href="javascript:;" class="btn btn-outline-danger btn-sm deleteRow mt-3"> <span class="far fa-trash-alt me-1"></span>Delete</a></td>'+
        //     '</tr>';
        
        //     $('tbody').append(tr);
        // });
    // function for adding a new row
    var r = 1;
    $('.addRow').click(function () {
        r++;
        $('.t1').append('<tr id="row' + r + '" class="item"><td><input class="form-control" name="dokumen[]" required parsley /></td><td><input  required parsley class="qnty amount form-control" name="nominal[]" /></td><td class="text-end"></button><button type="button"type="button" name="remove" id="' + r + '" class="btn btn-sm btn-soft-danger btn-circle me-2 btn_remove "><i class="dripicons-trash" aria-hidden="true"></i></button></td></tr>');
    });
    // remove row when X is clicked
    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    
    $(".delete").click(function() {
    $(this).closest("tr").remove();
    });

    // calculate everything
    $(document).on("keyup", ".amount", calcAll);
    //$(".amount").on("change", calcAll);
    });
    
    // function for calculating everything
    function calcAll() {
    // calculate total for one row
    
    $(".item").each(function () {
        var qnty = 0;
       
        if (!isNaN(parseFloat($(this).find(".qnty").val()))) {
            qnty = parseFloat($(this).find(".qnty").val());
        }
    
        total = qnty;
        $(this).find(".qnty").val(total);
    });
    
    // sum all totals
    var sum = 0;
    $(".qnty").each(function () {
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }
    });
    // show values in netto, steuer, brutto fields
    $("#netto").val(sum.toFixed());
    }
    function formatThousands(n, dp) {
        var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
        while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
        return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
        }
        // document.getElementById("netto").value = formatThousands(ppn);
        </script>
        <script>

            new Cleave('.dollar', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
   
            
              </script>
@endsection
