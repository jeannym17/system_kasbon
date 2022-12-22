@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Verifikasi Non Kasbon @endslot
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
                            <h4 class="card-title" style="display: inline;">Kasbon</h4>
                            <p class="text-muted mb-0">
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm">
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i data-feather="download" class="align-self-center icon-xs"></i>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <select class="select2 form-control status-dropdown" >
                                        <option value=""> All</option>
                                        <option value="Terverifikasi"> Terverifikasi</option>
                                        <option value="Belum DiProses"> Dalam Proses</option>
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
                            <table id="datatable2" class="table dt-responsive"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead style="text-align: center">
                                <tr>
                                    <th hidden></th>
                                    <th rowspan="2">No Non Kasbon</th>
                                    <th rowspan="2">Tanggal Masuk</th>
                                    <th colspan="2">Atasan User 1</th>
                                    <th colspan="2">Atasan User 2</th>
                                    <th colspan="2">Atasan User 3</th>
                                    <th colspan="2">Verifikator</th>
                                    <th colspan="2">Atasan Verifikator 1</th>
                                    <th colspan="2">Atasan Verifikator 2</th>
                                    <th colspan="2">Atasan Verifikator 3</th>
                                    {{-- <th  style="text-align: center">Pemberitahuan</th> --}}
                                    <th rowspan="2" style="width:0%">Action</th>
                                </tr>
                                <tr>
                                    <th hidden></th>
                                    {{-- <th>No Kasbon</th> --}}
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    {{-- <th  style="text-align: center">Pemberitahuan</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nonkasbon as $nonkasbon)
                                <tr  style="text-align: center">
                                    <td hidden>{{$nonkasbon->created_at}}</td>
                                    <td>{{$nonkasbon->no_nonkasbon}}</td>
                                    <td>{{$nonkasbon->tglmasuk->format('m/d/Y')}}</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk_a_1 ? $nonkasbon->verifikasinonkasbon->tgl_vnk_a_1->format('m/d/Y')  : '-' }}</td>
                                    <td> @if($nonkasbon->verifikasinonkasbon->vnk_a_1 == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">{{$nonkasbon->verifikasinonkasbon->vnk_a_1 ?? '-'}}</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_1 == "Revisi")
                                        <label class="badge rounded-pill bg-warning">{{$nonkasbon->verifikasinonkasbon->vnk_a_1 ?? '-'}}</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_1 == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">{{$nonkasbon->verifikasinonkasbon->vnk_a_1 ?? '-'}}</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_1 == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">{{$nonkasbon->verifikasinonkasbon->vnk_a_1 ?? '-'}}</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk_a_12 ? $nonkasbon->verifikasinonkasbon->tgl_vnk_a_12->format('m/d/Y')  : '-' }}</td>
                                    <td>@if($nonkasbon->verifikasinonkasbon->vnk_a_12 == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_12 == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Revisi</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_12 == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_12 == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk_a_13 ? $nonkasbon->verifikasinonkasbon->tgl_vnk_a_13->format('m/d/Y')  : '-' }}</td>
                                    <td>@if($nonkasbon->verifikasinonkasbon->vnk_a_13 == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_13 == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Revisi</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_13 == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_13 == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk ? $nonkasbon->verifikasinonkasbon->tgl_vnk->format('m/d/Y')  : '-' }}</td>
                                    <td>@if($nonkasbon->verifikasinonkasbon->vnk == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Revisi</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk_a_2 ? $nonkasbon->verifikasinonkasbon->tgl_vnk_a_2->format('m/d/Y')  : '-' }}</td>
                                    <td>@if($nonkasbon->verifikasinonkasbon->vnk_a_2 == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_2 == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Revisi</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_2 == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_2 == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk_a_3 ? $nonkasbon->verifikasinonkasbon->tgl_vnk_a_3->format('m/d/Y')  : '-' }}</td>
                                    <td>@if($nonkasbon->verifikasinonkasbon->vnk_a_3 == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_3 == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Revisi</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_3 == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_3 == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>{{$nonkasbon->verifikasinonkasbon->tgl_vnk_a_4 ? $nonkasbon->verifikasinonkasbon->tgl_vnk_a_4->format('m/d/Y')  : '-' }}</td>
                                    <td>@if($nonkasbon->verifikasinonkasbon->vnk_a_4 == "Dalam Proses")
                                        <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_4 == "Revisi")
                                        <label class="badge rounded-pill bg-warning">Revisi</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_4 == "Ditolak")
                                        <label class="badge rounded-pill bg-danger">Ditolak</label>
                                    @elseif($nonkasbon->verifikasinonkasbon->vnk_a_4 == "Terverifikasi")
                                        <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                        @else
                                        -
                                    @endif</td>
                                    <td>  @include('mnk.modal-cek-lihat') <a data-bs-toggle="modal" data-bs-target="#modalceklihat_{{$nonkasbon->id}}" class="btn btn-primary btn-sm"><i class="mdi mdi-information-outline"></i></a> </td>
                                    @endforeach
                                </tr>
                           
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
           
         
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
<script src="{{ URL::asset('assets/js-pdf/jspdf.min.js') }}"></script>
<script src="{{ URL::asset('assets/js-pdf/html2canvas.min.js') }}"></script>
<script src="{{ URL::asset('assets/js-pdf/main.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/huebee/huebee.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.datatable.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script>
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
       order: [[1, 'desc']],
       columnDefs: [
               {
                   "targets": [6],
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
         //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
         $dTable.column(6).search(status).draw();
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
