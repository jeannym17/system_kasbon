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
            @slot('li_2') Verifikasi Kasbon @endslot
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
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        </style>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="display: inline;">Kasbon</h4>
                            <p class="text-muted mb-0">
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm">
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModalDefault" class="btn btn-sm btn-outline-primary">
                                        <i data-feather="download" class="align-self-center icon-xs"></i>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <select class="select2 form-control status-dropdown" >
                                        <option value=""> All</option>
                                        <option value="Terverifikasi"> Terverifikasi</option>
                                        <option value="Menunggu Verifikasi Atasan"> Menunggu Verifikasi Atasan</option>
                                        <option value="Terverifikasi"> Terverifikasi</option>
                                        <option value="Belum Proses"> Belum Proses</option>
                                        <option value="Menunggu Revisi"> Menunggu Revisi</option>
                                        
                                        <option value="Ditolak"> Ditolak</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 text-end">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span><input type="text" class="form-control pull-right datesearchbox"  id="datesearch" placeholder="Search by date range..">
                                    </div>
                                </div>
                            </div><!--end row-->
                            {{-- <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bd-example-modal-xl">
                                Launch demo modal
                            </button> --}}
                           
                            <table id="datatable2" class="table dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>Tanggal Masuk</th>
                                    <th>No Kasbon</th>
                                    <th>Kasbon</th>
                                    <th>Nominal Kasbon</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kasbon as $kasbon)
                                    @if(isset($kasbon->verifikasikasbon->vkb))
                                <tr>
                                    <td hidden>{{$kasbon->verifikasikasbon->updated_at}}</td>
                                    <td>{{$kasbon->tglmasuk->format('d/m/Y')}}</td>
                                    <td>{{$kasbon->nokasbon}}</td>
                                    <td>{{$kasbon->jeniskasbon}}</td>
                                    <td>{{$kasbon->kurs->symbol}} {{number_format($kasbon->total)}}</td>
                                    <td>
                                        @if($kasbon->verifikasikasbon->vkb == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Belum Proses</label>
                                        @elseif($kasbon->verifikasikasbon->vkb == "Terverifikasi")
                                        @if($kasbon->verifikasikasbon->status == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        <label class="badge rounded-pill bg-success">Menunggu Verifikasi Atasan</label>
                                        @endif
                                        @elseif($kasbon->verifikasikasbon->vkb == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                        @elseif($kasbon->verifikasikasbon->vkb == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Menunggu Revisi</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($kasbon->verifikasikasbon->id_vkb))
                                        @if($kasbon->verifikasikasbon->vkb == "Dalam Proses")
                                            @include('vkb.modal-cek')
                                            <a href="{{ route('vkb.show',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Kasbon"><i class="mdi mdi-information-outline" style="font-size: 150%;"></i></a>
                                            <a href="{{ route('vkb.kelengkapan_edit',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="List Kelengkapan"><i class="mdi mdi-file-document" style="font-size: 150%; "></i></a>
                                            <a href="{{ route('vkb.dokumen',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lampiran"><i class="mdi mdi-file-pdf" style="font-size: 150%; "></i></a>
                                           <a href="{{ route('vkb.printppk',$kasbon->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPK" ><i class="mdi mdi-printer"></i></a>
                                           <a type="button" data-bs-toggle="modal" data-bs-target="#modalcek_{{$kasbon->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Verifikasi"><i class="mdi mdi-checkbox-marked-outline" style="font-size: 150%; "></i></a>
                                           @else
                                            <a href="{{ route('vkb.show_v',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Kasbon"><i class="mdi mdi-information-outline" style="font-size: 150%;"></i></a>
                                            <a href="{{ route('vkb.kelengkapan_v',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="List Kelengkapan"><i class="mdi mdi-file-document" style="font-size: 150%; "></i></a>
                                            <a href="{{ route('vkb.dokumen',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lampiran"><i class="mdi mdi-file-pdf" style="font-size: 150%; "></i></a>
                                            <a href="{{ route('vkb.printppk',$kasbon->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPK" ><i class="mdi mdi-printer"></i></a>
                                            @endif
                                    @else
                                        @if($kasbon->verifikasikasbon->vkb == "Dalam Proses")
                                        @include('vkb.modal-cek')
                                            <a  href="{{ route('vkb.show',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Kasbon"><i class="mdi mdi-information-outline" style="font-size: 150%;"></i></a>
                                            <a href="{{ route('vkb.kelengkapan',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="List Kelengkapan"><i class="mdi mdi-file-document" style="font-size: 150%; "></i></a>
                                            <a href="{{ route('vkb.dokumen',$kasbon->id) }}"  target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lampiran"><i class="mdi mdi-file-pdf" style="font-size: 150%; "></i></a>
                                           <a href="{{ route('vkb.printppk',$kasbon->id) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Lembar PPK" ><i class="mdi mdi-printer"></i></a>
                                           <a type="button" data-bs-toggle="modal" data-bs-target="#modalcek_{{$kasbon->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Verifikasi"><i class="mdi mdi-checkbox-marked-outline" style="font-size: 150%; "></i></a>
                                           @endif
                                    @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
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
    function myFunction() {
            document.getElementById("myForm").reset();
        }
</script>
<script>
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

    +function($) {
    'use strict';

    var modals = $('.modal.multi-step');

    modals.each(function(idx, modal) {
        var $modal = $(modal);
        var $bodies = $modal.find('div.modal-body');
        var total_num_steps = $bodies.length;
        var $progress = $modal.find('.m-progress');
        var $progress_bar = $modal.find('.m-progress-bar');
        var $progress_stats = $modal.find('.m-progress-stats');
        var $progress_current = $modal.find('.m-progress-current');
        var $progress_total = $modal.find('.m-progress-total');
        var $progress_complete  = $modal.find('.m-progress-complete');
        var reset_on_close = $modal.attr('reset-on-close') === 'true';

        function reset() {
            $modal.find('.step').hide();
            $modal.find('[data-step]').hide();
        }

        function completeSteps() {
            $progress_stats.hide();
            $progress_complete.show();
            $modal.find('.progress-text').animate({
                top: '-2em'
            });
            $modal.find('.complete-indicator').animate({
                top: '-2em'
            });
            $progress_bar.addClass('completed');
        }

        function getPercentComplete(current_step, total_steps) {
            return Math.min(current_step / total_steps * 100, 100) + '%';
        }

        function updateProgress(current, total) {
            $progress_bar.animate({
                width: getPercentComplete(current, total)
            });
            if (current - 1 >= total_num_steps) {
                completeSteps();
            } else {
                $progress_current.text(current);
            }

            $progress.find('[data-progress]').each(function() {
                var dp = $(this);
                if (dp.data().progress <= current - 1) {
                    dp.addClass('completed');
                } else {
                    dp.removeClass('completed');
                }
            });
        }

        function goToStep(step) {
            reset();
            var to_show = $modal.find('.step-' + step);
            if (to_show.length === 0) {
                // at the last step, nothing else to show
                return;
            }
            to_show.show();
            var current = parseInt(step, 10);
            updateProgress(current, total_num_steps);
            findFirstFocusableInput(to_show).focus();
        }

        function findFirstFocusableInput(parent) {
            var candidates = [parent.find('input'), parent.find('select'),
                              parent.find('textarea'),parent.find('button')],
                winner = parent;
            $.each(candidates, function() {
                if (this.length > 0) {
                    winner = this[0];
                    return false;
                }
            });
            return $(winner);
        }

        function bindEventsToModal($modal) {
            var data_steps = [];
            $('[data-step]').each(function() {
                var step = $(this).data().step;
                if (step && $.inArray(step, data_steps) === -1) {
                    data_steps.push(step);
                }
            });

            $.each(data_steps, function(i, v) {
                window.addEventListener('next.m.' + v, function (evt) {
                    goToStep(evt.detail.step);
                }, false);
            });
        }

        function initialize() {
            reset();
            updateProgress(1, total_num_steps);
            $modal.find('.step-1').show();
            $progress_complete.hide();
            $progress_total.text(total_num_steps);
            bindEventsToModal($modal, total_num_steps);
            $modal.data({
                total_num_steps: $bodies.length,
            });
            if (reset_on_close){
                //Bootstrap 2.3.2
                $modal.on('hidden', function () {
                    reset();
                    $modal.find('.step-1').show();
                })
                //Bootstrap 3
                $modal.on('hidden.bs.modal', function () {
                    reset();
                    $modal.find('.step-1').show();
                })
            }
        }

        initialize();
    })
}(jQuery);
</script>
<script>
sendEvent = function(sel, step) {
    var sel_event = new CustomEvent('next.m.' + step, {detail: {step: step}});
    window.dispatchEvent(sel_event);
}
</script>
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
         //dataTable.column(5).search('\\s' + status + '\\s', true, false, true).draw();
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
