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
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
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
        <div class="col-sm-12">
            <div class="card form-wizard-wrapper">
                <div class="card-header">
                    <h4 class="card-title">Lihat Kasbon</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    {!! Form::model($kasbon, ['method' => 'PATCH','route' => ['vkb.update', $kasbon->id],'class' => 'form-parsley','id' => 'myForm']) !!}
                        {{ csrf_field() }}
                        <input value="{{$kasbon->id}}" class="text-muted mb-0" name="id" hidden> 
                        <div class="col-xl-12 mb-3">
                            <table class="table mb-0" style="text-align:justify" >
                                <tbody >
                                    <tr >
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->nokasbon}}</td>  
                                        <td >
                                            <p class=" align-middle mb-0 product-name">NIP</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="width:20%">{{$kasbon->user->nip}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nama Vendor</p>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->namavendor}}</td>                                      
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Tanggal Masuk</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->tglmasuk->format('m/d/Y')}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">User</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->user->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Tgl JTT</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td><input class="form-control" name="tgltempo" type="date" style="width: 50%" value="{{ $kasbon->tgltempo ? $kasbon->tgltempo->format('Y-m-d')  : '-' }}" required></td>                                                         
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Jam Masuk</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->jammasuk}}</td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Unit</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->user->unit->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">No Invoice</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->noinvoice}}</td>                                             
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->jeniskasbon}} </td>    
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kurs</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kurs->code}}</td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">SPPH/KOI/LOI</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->spph}}</td>   
                                    </tr>  
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Kode Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->kodekasbon->name}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nilai/DPP</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                            @if($kasbon->kurs->id == "42")
                                            <div class="input-group">
                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                <input id="iddpp" type="text" class="form-control dollar"  name="iddpp" value="{{($kasbon->iddpp)}}" onkeyup="add_number()">
                                            </div>
                                                @else
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                    <input id="iddpp1" type="text" class="form-control dollar1"  name="iddpp1" value="{{($kasbon->iddpp)}}" onkeyup="add_number1()"  />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp. </span>
                                                    <input class="form-control dollark" name="konversi" id="k_konversi" placeholder="konversi" onkeyup="add_number1()" value="{{($kasbon->konversi)}}"/>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">SJN</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{ $kasbon->sjn ?? '-' }}</td>                                              
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Jenis Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->jenis->name}}</td>   
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PPN</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                            @if($kasbon->kurs->id == "42")
                                            <div class="input-group">
                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                            <input id="idppn" class="form-control dollarppn"  name="idppn" value="{{($kasbon->idppn)}}" onkeyup="add_number()">
                                            </div>
                                            @else
                                            <input  class="form-control" id="idppn1" class="form-control " type="text" name="idppn1" disabled />
                                            @endif
                                        </td>                                                  <td>
                                            <p class=" align-middle mb-0 product-name">No. PI (FOCUS)</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{ $kasbon->sjn ?? '-' }}</td>                                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PO Vendor</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->po_vendor}}</td>  
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PPH</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                                <div class="col-lg-12">
                                                    @if($kasbon->kurs->id == "42")
                                                    <select class="form-select" value="id_pph" name="id_pph">
                                                        <option value="" disabled selected hidden>Pilih PPH</option>
                                                        @foreach ($pph as $pph)
                                                        @if(old('pph', $kasbon->id_pph) == $pph->id)
                                                        <option value="{{$pph->id}}" selected>{{$pph->name}}</option>
                                                        @else
                                                        <option  value="{{$pph->id}}" >{{$pph->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @else
                                                    <select class="form-select" value="id_pph" name="id_pph" disabled>
                                                        <option value="" disabled selected hidden>Pilih PPH</option>
                                                        @foreach ($pph as $pph)
                                                        @if(old('pph', $kasbon->id_pph) == $pph->id)
                                                        <option value="{{$pph->id}}" selected>{{$pph->name}}</option>
                                                        @else
                                                        <option  value="{{$pph->id}}" >{{$pph->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        @if($kasbon->kurs->id == "42")
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input  class="form-control dollarpph" type="text" id="idpph" class="form-control"  name="idpph" value="{{($kasbon->idpph)}}" onkeyup="add_number()"  />
                                                        </div>
                                                        @else
                                                        <input  class="form-control" type="text" id="idpph1" class="form-control"  name="idpph1" value="{{($kasbon->idpph)}}" onkeyup="add_number1()" disabled />   
                                                        @endif
                                                    </div>
                                                </div></td>    
                                        <td>                                        
                                            <p class=" align-middle mb-0 product-name">Proyek</p>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="width:30%">{{$kasbon->proyek}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">PO Customer</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->po_customer}}</td>     
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nominal Kasbon</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td> 
                                            @if($kasbon->kurs->id == "42")
                                            <div class="input-group">
                                                <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                <input class="form-control" id="total" name="total"  value="{{(number_format($kasbon->total))}}" >
                                            </div>
                                                @else
                                                <div class="input-group">
                                                    <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                <input class="form-control" id="total1" name="total1"  value="{{(number_format($kasbon->total))}}" >
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp. </span>
                                                <input class="form-control" id="ktotal" name="k_total"  value="{{(number_format($kasbon->k_total))}}" disabled/>
                                                </div>
                                            @endif
                                        </td> 
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Uraian</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->uraianpengguna}}</td>                                                     
                                    </tr> 
                                    <tr>
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Bank</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->id_bank ?? ''}}</td>    
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nama Rekening</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->namarek}}</td>    
                                        <td>
                                            <p class=" align-middle mb-0 product-name">Nomor Rekening</p> 
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>{{$kasbon->norek}}</td>   
                                    </tr>               
                                </tbody>
                            </table>
                        </div><!--end col-->
                <div class="row ">
                    <div class="col-sm-12 text-end"> 
                        <button  type="submit"  class="btn btn-primary px-4">Simpan</button>      
                    </div>
                </div>
                {!! Form::close() !!}  
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="row">
            <div class="col-sm-12 text-end">
                <a href="{{ route('vkb.index') }}" type="button" class="btn btn-danger px-4">Back</a>
            </div>
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
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.datatable.init.js') }}"></script>
<script src="assets/plugins/tippy/tippy.all.min.js"></script>
<script src="{{ URL::asset('assets/js/jquery.core.js') }}"></script>
<script>
new Cleave('.dollar', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
  </script>
  <script>
new Cleave('.dollarppn', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
  </script>
  <script>
        new Cleave('.dollar1', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});

  </script>
  <script>
        new Cleave('.dollarpph', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
  </script>
  <script>
        new Cleave('.dollark', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
  </script>
  <script>
        new Cleave('.dollarppn', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
  </script>
<script>
function add_number() {

  var first = document.getElementById("iddpp").value;
  var first1 = first.replace(/,/g, '');
  var first_number = parseFloat(first1);

  var second = document.getElementById("idppn").value;
  var second1 = second.replace(/,/g, '');
  var second_number = parseFloat(second1);

  var third = document.getElementById("idpph").value;
  var third1 = third.replace(/,/g, '');
  var third_number = parseFloat(third1);

  if (isNaN(first_number)) first_number = 0;
  if (isNaN(third_number)) third_number = 0;
  if (isNaN(second_number)) second_number = 0;
//   var ppn = (11/100)*first_number;
//   document.getElementById("idppn").value = ppn;
  var result = first_number + second_number - third_number;

    function formatThousands(n, dp) {
    var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
    while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
    return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
    }
    // document.getElementById("idppn").value = formatThousands(ppn);
    document.getElementById("total").value = formatThousands(result);
}
</script>

<script>
function add_number1() {
  var first = document.getElementById("iddpp1").value;
  var first1 = first.replace(/,/g, '');
  var first_number = parseFloat(first1);

  var second = document.getElementById("k_konversi").value;
  var second1 = second.replace(/,/g, '');
  var second_number = parseFloat(second1);

  var third_number = parseFloat(document.getElementById("idpph1").value);
  if (isNaN(first_number)) first_number = 0;
  if (isNaN(second_number)) second_number = 0;
  if (isNaN(third_number)) third_number = 0;
  var ppn = 0;
  document.getElementById("idppn1").value = ppn;
  var result = first_number + ppn - third_number;
  var resultk = result * second_number;
  
  function formatThousands(n, dp) {
    var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
    while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
    return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
    }
    document.getElementById("idppn1").value = formatThousands(ppn);
    document.getElementById("total1").value = formatThousands(result);
    document.getElementById("ktotal").value = formatThousands(resultk);
}
</script>
@endsection
