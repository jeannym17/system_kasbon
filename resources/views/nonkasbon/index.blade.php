@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Non Kasbon @endslot
            @slot('li_3') List @endslot
            @slot('title') List Non Kasbon @endslot
        @endcomponent

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <strong>Well Done 👍</strong>{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">                    
                        <div class="card-header">
                            <h4 class="card-title" style="display: inline;">Non Kasbon</h4>
                             <div class="mt-1 float-end">
                                <a class=" btn btn-sm btn-soft-primary" href="{{route('nonkasbon.create')}}" role="button"><i class="fas fa-plus me-2"></i>New Non Kasbon</a>
                            </div> 
                            <p class="text-muted mb-0">
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm">
                                    {{-- <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i data-feather="download" class="align-self-center icon-xs"></i>
                                    </a> --}}
                                </div>
                                <div class="col-sm-2">
                                    <select class="select2 form-control status-dropdown" >
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
                            <table id="datatable2" class="table dt-responsive" style="border-collapse: collapse; border-spacing: 0;">
                                <thead>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <th>No Non Kasbon</th>
                                    <th>User</th>
                                    <th>Nominal Non Kasbon</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($nonkasbon as $nonkasbon)
                                @if(isset($nonkasbon->verifikasinonkasbon->status))
                                <tr>
                                    <td>{{$nonkasbon->tglmasuk->format('d/m/Y')}}</td>
                                    <td>{{$nonkasbon->no_nonkasbon}}</td>
                                    <td>{{$nonkasbon->user->name}}</td>
                                    <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->total)}}</td>
                                    <td>
                                    @if($nonkasbon->verifikasinonkasbon->status == "Dalam Proses")
                                            <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                        @elseif($nonkasbon->verifikasinonkasbon->status == "Revisi")
                                            <label class="badge rounded-pill bg-warning">Revisi</label>
                                        @elseif($nonkasbon->verifikasinonkasbon->status == "Ditolak")
                                            <label class="badge rounded-pill bg-danger">Ditolak</label>
                                        @elseif($nonkasbon->verifikasinonkasbon->status == "Terverifikasi")
                                            <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                    @endif
                                    </td>
                                    <td class="text-end">
                                        @if($nonkasbon->verifikasinonkasbon->status == "Dalam Proses")
                                        {{-- <a href="{{ route('nonkasbon.show',$nonkasbon->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a> --}}
                                        <a  href="{{ route('nonkasbon.show',$nonkasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Non Kasbon"><i class="mdi mdi-information-outline" style="font-size: 150%;"></i>
                                        <a href="{{ route('nonkasbon.edit',$nonkasbon->id) }}" ><i class="mdi mdi-square-edit-outline" style="font-size: 150%;"></i></a>
                                        <a href="{{ route('vnk.kelengkapan',$nonkasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="List Kelengkapan"><i class="mdi mdi-file-document" style="font-size: 150%; "></i>
                                            @if(isset($nonkasbon->dokumennk))
                                            <a href="{{ route('nonkasbon.generatePDF',$nonkasbon->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" style="font-size: 150%; "><i class="mdi mdi-printer"></i></a>
                                            @endif
                                            @elseif($nonkasbon->verifikasinonkasbon->status == "Revisi")
                                        <a href="{{ route('nonkasbon.edit',$nonkasbon->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="{{ route('nonkasbon.show',$nonkasbon->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                        @elseif($nonkasbon->verifikasinonkasbon->status == "Ditolak")
                                        <a href="{{ route('nonkasbon.show',$nonkasbon->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                        <a type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalDanger_{{$nonkasbon->id}}" data-action="{{ route('nonkasbon.destroy', $nonkasbon->id) }}"><i class="las la-trash font-16"></i></a>
                                        @elseif($nonkasbon->verifikasinonkasbon->status == "Terverifikasi")
                                        <a href="{{ route('nonkasbon.generatePDF',$nonkasbon->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" class="btn btn-danger btn-sm"><i class="mdi mdi-printer"></i></a>
                                        <a href="{{ route('nonkasbon.show',$nonkasbon->id) }}"class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <div class="modal fade" id="exampleModalDanger_{{$nonkasbon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDanger1" aria-hidden="true">
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
                                                <form action="{{ route('nonkasbon.destroy',$nonkasbon->id) }}" method="POST" style="display: inline">
                                                
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
            </div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="assets/plugins/tippy/tippy.all.min.js"></script>
<script type="text/javascript"> 
 var start_date;
   var end_date;
   var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
      var dateStart = parseDateValue(start_date);
      var dateEnd = parseDateValue(end_date);
      //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
      //nama depan = 0
      //nama belakang = 1
      //tanggal terdaftar =2
      var evalDate= parseDateValue(aData[0]);
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
                   "targets": [4],
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
      $dTable.column(4).search(status).draw();
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

