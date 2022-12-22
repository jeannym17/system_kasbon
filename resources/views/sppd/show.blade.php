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
                            <h4 class="card-title"></h4>
                        </div><!--end card-header-->
                        <div class="card-body bootstrap-select-1 form-wizard-wrapper">
                          
<div class="row"  id="form-entry-1">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group row">
                <label for="txtLastNameBilling" class="col-lg-4 col-form-label">No SPPD</label>
                    <div class="col-lg-4">
                        <input class="form-control" name="nokasbon" type="text" value="{{$sppd->no_sppd}}" disabled>
                    </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group row">
                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-lg-4">
                            <input class="form-control" name="tglmasuk" type="date" value="{{$sppd->tglmasuk->format('Y-m-d')}}" id="example-date-input">
                        </div>
                </div>
            </div>
        </div>
    <div>  
        <table class="table table-bordered table-sm t1">
                <tbody>
                
                <tr  style="text-align:center;" >
                    <th rowspan="2">NAMA</th>
                    <th rowspan="2">NIP</th>
                    <th rowspan="2">DEPARTEMEN</th>
                    <th rowspan="2">TUJUAN/INSTANSI</th>
                    <th rowspan="2">PROYEK</th>
                    <th rowspan="2">KETERANGAN</th>
                    <th rowspan="2">TGL BERANGKAT</th>
                    <th rowspan="2">TGL PULANG</th>
                    <th  style="width: 5%" rowspan="2">HARI</th>
                    <th  style="width: 10%" colspan="2">NILAI SPPD</th>
                    <th style="width: 10%"rowspan="2">UANG LUMPSUM</th>
                </tr>
                <tr class="item" style="text-align:center;" >
                    <td style="width: 5%">KURS</td>
                    <td style="width: 5%">RATE</td>
               </tr>
               @foreach ($detail as $details)
                <tr class="item" >
                    <td><input class="form-control" name="nama[]" value="{{$details->nama}}" required parsley/></td>
                    <td><input  class="form-control"  name="nip[]" value="{{$details->nip}}" required parsley /></td>
                    <td><input  class="form-control" name="departemen[]" value="{{$details->departemen}}" required parsley/></td>
                    <td><input  class="form-control" name="tujuan[]" value="{{$details->instansi}}" required parsley /></td>
                    <td><input  class="form-control" name="proyek[]" value="{{$details->proyek}}" required parsley/></td>
                    <td><input  class="form-control" name="keterangan[]" value="{{$details->keterangan}}" required parsley /></td>
                    <td><input type="date" class="amount form-control" value="{{$details->tglberangkat}}" id="startDate" name="startDate[]" required></td>
                    <td><input type="date" class="amount form-control" value="{{$details->tglpulang}}" id="endDate" name="endDate[]" required></td>
                    <td><input class="hari amount form-control" id="hari" name="hari[]" value="{{$details->hari}}"></td>
                    <td><select  class="form-control" name="kurs[]" required parsley > <option value="" disabled selected hidden></option>
                        @foreach ($kurs as $kurss)
                        @if(old('kurs', $details->id_kurs) == $kurss->id)
                        <option value="{{$kurss->id}}" selected>{{$kurss->name}}</option>
                        @else
                        <option  value="{{$kurss->id}}" >{{$kurss->name}}</option>
                        @endif
                        @endforeach
                    <td><select  class="rate amount form-control" name="rate[]" required parsley > <option value="" disabled selected hidden></option>
                        @foreach ($rate as $rates)
                        @if(old('rate', $details->id_rate) == $rates->harga)
                        <option value="{{$rates->harga}}" selected>{{$rates->name}}</option>
                        @else
                        <option  value="{{$rates->harga}}" >{{$rates->name}}</option>
                        @endif
                        @endforeach
                    <td><input  name="lumpsum[]" class="lumpsum amount form-control" id="lumpsum" value="{{$details->kurs->symbol}} {{number_format($details->uanglumpsum)}}" readonly="readonly" /></td>
                   
                </tr>
                    @endforeach
                <tfoot>
                        <tr>
                            <th class="text-center"  colspan="11"><strong>JUMLAH</strong></th>
                            <th><input id="netto" readonly="readonly" class="form-control"  name="total" type="text" value="{{$details->kurs->symbol}} {{number_format($sppd->jumlah)}}"></th>
                           
                        </tr>
                    </tbody>
                    </tfoot>
            </table>
            {{-- <a class="btn btn-success btn-sm addRow">Add New Row</a> --}}
            <br />
{{-- 
            <input type="submit" value="Submit">
            <input type="reset" value="Reset"> --}}
            <div class="row mt-3">
                <div class="col-sm-12 text-end">
                    <a href="{{route('sppd.index')}}" type="button" onclick="form1()" class="btn btn-danger px-4">Back</a>      
                    {{-- <button type="submit" class="btn btn-primary px-4">Simpan</button>    --}}
                </div>
            </div>
    </div>
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

{{-- <script>

    $(document).ready(function () {
    
        $(document).ready(function () {
        $('#example').DataTable({
            scrollX: true,
        });
    });
    
    // function for adding a new row
    var r = 1;
    $('.addRow').click(function () {
        r++;
        $('.t1').append('<tr id="row' + r + '" class="item"><td><input class="form-control" name="nama[]" required parsley/></td><td><input  class="form-control"  name="nip[]" required parsley /></td><td><input  class="form-control" name="departemen[]" required parsley/></td><td><input  class="form-control" name="tujuan[]" required parsley /></td><td><input  class="form-control" name="nokontrak[]" required parsley/></td><td><input  class="form-control" name="kasbondinas[]" required parsley /></td><td><input type="date" class="amount form-control" id="startDate" name="startDate[]" required></td><td><input type="date" class="amount form-control" id="endDate" name="endDate[]" required></td><td><input class="hari amount form-control" id="hari" name="hari[]"></td><td><select  class="form-control" name="kurs[]" required parsley > <option value="" disabled selected hidden></option>@foreach ($kurs as $k)<option  value="{{$k->id}}">{{$k->name}}</option>@endforeach</select></td><td><select  class="rate amount form-control" name="rate[]" required parsley > <option value="" disabled selected hidden></option>@foreach ($rate as $r)<option  value="{{$r->harga}}">{{$r->name}}</option>@endforeach</select></td><td><input  name="lumpsum[]" class="lumpsum amount form-control" id="lumpsum" value="" readonly="readonly" /></td><td class="text-end"><button type="button" name="remove" id="' + r + '" class="btn btn-sm btn-soft-danger btn-circle me-2" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td></tr>');
    });
    // remove row when X is clicked
    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    // calculate everything
    $(document).on("keyup",  calcAll);
    $(".amount").on("change", calcAll);
    });
    
    // function for calculating everything
    function calcAll() {
    // calculate total for one row
    
    $(".item").each(function () {
        var lumpsum = 0;
        var rate = 0;
        var hari = 0;
        var startDate = document.getElementById("startDate").value;
        var endDate = document.getElementById("endDate").value;
    
        if (!isNaN(parseFloat($(this).find(".hari").val()))) {
            hari = parseFloat($(this).find(".hari").val());
        }if (!isNaN(parseFloat($(this).find(".rate").val()))) {
            rate = parseFloat($(this).find(".rate").val());
        }
    
        var Difference_In_Time = new Date(endDate).getTime() - new Date(startDate).getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        document.getElementById("hari").value = Difference_In_Days;
    
        lumpsum = hari * rate ;
        $(this).find(".lumpsum").val(lumpsum.toFixed(2));
    
    
    
    });
    
                var sum = 0;
                $(".lumpsum").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                    }
                });
    
                $("#netto").val(sum.toFixed(2));
    
    }
    </script> --}}

@endsection


