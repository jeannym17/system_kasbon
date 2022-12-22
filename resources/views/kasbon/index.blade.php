@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection


    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Kasbon @endslot
            @slot('li_3') List @endslot
            @slot('title') List Kasbon @endslot
        @endcomponent
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <strong>Well Done 👍</strong>{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
       
    <style>
 .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__rendered, .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 35px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 35px;
}
    </style>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="display: inline;">Kasbon</h4>
                <div class="mt-1 float-end">
                    <a class=" btn btn-sm btn-soft-primary"  href="{{ route('kasbon.create') }}" role="button"><i class="fas fa-plus me-2"></i>New Kasbon</a>
                </div>
                <p class="text-muted mb-0">
                </p>
            </div><!--end card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm">
                            {{-- <a data-bs-toggle="modal" data-bs-target="#exampleModalDefault" class="btn btn-sm btn-outline-primary">
                                <i data-feather="download" class="align-self-center icon-xs"></i>
                            </a> --}}
                        </div>
                        <div class="col-sm-2">
                               <select class="select2 form-control status-dropdown"> 
                                    <option value=""> All</option>
                                    <option value="Terverifikasi"> Terverifikasi</option>
                                    <option value="Dalam Proses"> Dalam Proses</option>
                                    <option value="Revisi"> Revisi</option>
                                    <option value="Ditolak"> Ditolak</option>
                                </select>
                        </div>
                        <div class="col-sm-3 text-end">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span><input type="text" class="form-control pull-right datesearchbox"  id="datesearch" placeholder="Search by date range..">
                            </div>
                        </div>
                    </div><!--end row-->
                <table id="datatable2" class="table dt-responsive"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th hidden></th>
                        <th>Tanggal Masuk</th>
                        <th>No Kasbon</th>
                        <th>Kasbon</th>
                        <th>Nominal Kasbon</th>
                        <th>Status</th>
                        {{-- <th  style="text-align: center">Pemberitahuan</th> --}}
                        <th>Action</th>
                        
                    </tr>
                    </thead>
              
                    <tbody>
                        @foreach ($kasbon as $kasbons)
                    <tr>
                        <td hidden>{{$kasbons->verifikasikasbon->updated_at ?? ''}}</td>
                        {{-- @if($kasbons->file)
                        <td>{{ link_to_asset('storage/post-file/'.$kasbons->file, $kasbons->file) }}</td>
                        @endif --}}
                        <td>{{ $kasbons->tglmasuk ? $kasbons->tglmasuk->format('d/m/Y')  : '-' }}</td>
                        <td>{{$kasbons->nokasbon}}</td>
                        <td>{{$kasbons->jeniskasbon}}</td>
                        <td>{{$kasbons->kurs->symbol}} {{number_format($kasbons->total)}}</td>
                        <td>
                            @if(isset($kasbons->verifikasikasbon->id))
                            @if($kasbons->verifikasikasbon->status == "Dalam Proses")
                                <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                            @elseif($kasbons->verifikasikasbon->status == "Revisi")
                                <label class="badge rounded-pill bg-warning">Revisi</label>
                            @elseif($kasbons->verifikasikasbon->status == "Ditolak")
                                <label class="badge rounded-pill bg-danger">Ditolak</label>
                            @elseif($kasbons->verifikasikasbon->status == "Terverifikasi")
                                <label class="badge rounded-pill bg-success">Terverifikasi</label>
                            @endif
                            @endif
                        </td>
                        
                       <td class="text-end">
                            @if(isset($kasbons->verifikasikasbon->id))
                                @if($kasbons->verifikasikasbon->status == "Dalam Proses")
                                <a href="{{ route('vkb.printppk',$kasbons->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPK" class="btn btn-danger btn-sm"><i class="mdi mdi-printer"></i></a>
                                <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                @elseif($kasbons->verifikasikasbon->status == "Revisi")
                                    <a href="{{ route('kasbon.edit',$kasbons->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                @elseif($kasbons->verifikasikasbon->status == "Ditolak")
                                    <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                    <a type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalDanger_{{$kasbons->id}}" data-action="{{ route('kasbon.destroy', $kasbons->id) }}"><i class="las la-trash font-16"></i></a>
                                @elseif($kasbons->verifikasikasbon->status == "Terverifikasi")
                                @if($kasbons->jeniskasbon == "KASBON RENCANA")
                                        @if(isset($kasbons->pertanggungan->id))
                                        <a href="{{ route('vkb.printppk',$kasbons->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPk" class="btn btn-danger btn-sm"><i class="mdi mdi-printer"></i></a>
                                            <a href="{{ route('pertanggungan.show',$kasbons->pertanggungan->id) }} " data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Pertanggungan" class="btn btn-success btn-sm"><i class="mdi mdi-information-outline"></i></a> 
                                            <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                        @else
                                        <a href="{{ route('vkb.printppk',$kasbons->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPK" class="btn btn-danger btn-sm"><i class="mdi mdi-printer"></i></a>
                                            <a href="{{ route('pertanggungan.insert',$kasbons->id) }} " data-bs-toggle="tooltip" data-bs-placement="top" title="Ajukan Pertanggungan" class="btn btn-success btn-sm"><i class="mdi mdi-send"></i></a> 
                                            <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                        @endif
                                @else
                                @if(isset($kasbons->pertanggungan->id))
                                <a href="{{ route('vkb.printppk',$kasbons->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPk" class="btn btn-danger btn-sm"><i class="mdi mdi-printer"></i></a>
                                    <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                @else
                                <a href="{{ route('vkb.printppk',$kasbons->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPk" class="btn btn-danger btn-sm"><i class="mdi mdi-printer"></i></a>
                                    <a href="{{ route('kasbon.show',$kasbons->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                @endif
                                @endif
                            @endif
                            @endif
                             @if($kasbons->file)
                            <a href="{{ 'storage/post-file/'.$kasbons->file }}"class="btn btn-sm"><i class="mdi mdi-file-document"></i></a>
                             @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModalDanger_{{$kasbons->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDanger1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <div class="modal-body">
                                        <div class="col-lg-12" style="text-align: center;">
                                            <h4>Are You Sure Want To Delete ?</h4> 
                                        </div><!--end col-->                                                 
                                </div><!--end modal-body-->
                                <div class="modal-footer">  
                                    <form action="{{ route('kasbon.destroy',$kasbons->id) }}" method="POST" style="display: inline">
                                    
                                        @method('delete')
                                        {{ csrf_field() }}                                                  
                                        <button type="submit" class="btn btn-soft-danger btn-sm">Yes</button>
                                    </form>  
                                    <button type="button" class="btn btn-soft-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                </div><!--end modal-footer-->
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div><!--end modal-->
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="modal fade" id="exampleModalDefault" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Pilih Tanggal</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!--end modal-header-->
                <form method="GET" action="{{route('kasbonexport')}}" >
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            From: <input type="text" name="reg_start_date" class="datepicker first" />
                          </div>
                          <div class="col-md-6">
                            To: <input type="text" name="reg_end_date" class="datepicker second" />
                          </div>
                    </div><!--end row-->                                       
                </div><!--end modal-body-->
          
                <div class="modal-footer">                                                    
                    <button type="submit" class="btn btn-soft-primary btn-sm">Download</button>
                    <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div><!--end modal-footer-->
            </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->
       
    

@endsection
@section('script')
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/huebee/huebee.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.datatable.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="assets/plugins/tippy/tippy.all.min.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript"> 
$('.second').datepicker({
    dateFormat: "yy/mm/dd" 
});

$(".first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.second').datepicker("option", "minDate", newDate);
  }
});

   var start_date;
   var end_date;
   var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
      var dateStart = parseDateValue(start_date);
      var dateEnd = parseDateValue(end_date);
      //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
      //nama depan = 0
      //nama belakang = 1
      //tanggal terdaftar =2
      var evalDate= parseDateValue(aData[1]);
        if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
             ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
             ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
             ( dateStart <= evalDate && evalDate <= dateEnd ) )
        {
            return true;
        }
        return false;
  });

  // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
  function parseDateValue(rawDate) {
      var dateArray= rawDate.split("/");
      var parsedDate= new Date(dateArray[1], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
      return parsedDate;
  }    

  $( document ).ready(function() {
    
  //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
   var $dTable = $('#datatable2').DataTable({
    order: [[0, 'desc']],
    columnDefs: [
            {
                "targets": [5],
                "visible": true
            }
        ],
    "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>"
   });

   //menambahkan daterangepicker di dalam datatables
//    $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"><i class="ti ti-calendar"></i></div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

$('.filter-checkbox').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      $dTable.column(1).search(searchTerms.join('|'), true, false, true).draw();
    });
  
    $('.status-dropdown').on('change', function(e){
      var status = $(this).val();
      $('.status-dropdown').val(status)
      console.log(status)
      //dataTable.column(4).search('\\s' + status + '\\s', true, false, true).draw();
      $dTable.column(5).search(status).draw();
    })  

   document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

   //konfigurasi daterangepicker pada input dengan id datesearch
   $('#datesearch').daterangepicker({
      autoUpdateInput: false
    });

   //menangani proses saat apply date range
    $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
       $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
       start_date=picker.startDate.format('DD/MM/YYYY');
       end_date=picker.endDate.format('DD/MM/YYYY');
       $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
       $dTable.draw();
    });

    $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      start_date='';
      end_date='';
      $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
      $dTable.draw();
    });
  });
</script>
@endsection
