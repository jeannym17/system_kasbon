@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') @endslot
            @slot('title') PT INKA MULTI SOLUSI TRADING @endslot
        @endcomponent

        <div class="card">
            <div class="card-body">                                                    
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhSLbGIre2UybEEvsRoV0ZAHYYK4LiACS1pg5QBebRi_jCfN2KxPbuQj-Otdj_590Q1Zugf0FLHtpJFKJnmIVlS5yQQ9TU1A4IdcsJr0ZYsHZfaa4hPjwqvYNQqkbjKp03h-o4PUd4SCh1lSJqFB9q9_IZlJFPHD8FHStXZWHi7JzDJRersKQjT6x7PvA/s2400/6-2-1024x573%20(1).jpg" style="width:5000px;height:300px" class="img-fluid">
                <div class="post-title mt-4">
                    <div class="row">
        </div>

        {{-- <div class="row">
            <div class="col-lg-12" id="tblksb">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Kasbon</h4>
                            </div><!--end col-->
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">Tgl Masuk</th>
                                        <th class="border-top-0">No Kasbon</th>
                                        <th class="border-top-0">Nominal</th>
                                        <th class="border-top-0">Status</th>
                                    </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    @foreach ($kasbons as $ksb)
                                    <tr>
                                        <td>{{ $ksb->tglmasuk ? $ksb->tglmasuk->format('m/d/Y')  : '-' }}</td>
                                        <td>{{$ksb->nokasbon}}</td>
                                        <td>{{$kasbon->kurs->symbol ?? ''}} {{number_format($ksb->total)}}</td>
                                        <td>
                                            @if(isset($ksb->verifikasikasbon->id))
                                            @if($ksb->verifikasikasbon->status == "Dalam Proses")
                                                <label class="badge rounded-pill bg-primary">Dalam Proses</label>
                                            @elseif($ksb->verifikasikasbon->status == "Revisi")
                                                <label class="badge rounded-pill bg-warning">Revisi</label>
                                            @elseif($ksb->verifikasikasbon->status == "Ditolak")
                                                <label class="badge rounded-pill bg-danger">Ditolak</label>
                                            @elseif($ksb->verifikasikasbon->status == "Terverifikasi")
                                                <label class="badge rounded-pill bg-success">Terverifikasi</label>
                                            @endif
                                            @endif
                                        </td>
                                    </tr><!--end tr-->
                                    @endforeach
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <a href="{{ route('kasbon.index') }}">View More <i data-feather="arrow-right-circle" class="icon-sm" style="width: 16px; height: 16px;"></i></a></td>
                                    </tfoot>
                                </tbody>
                            </table> <!--end table-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col--> --}}
            
        </div>

@endsection
@section('script')

<script>
    var year = <?php echo $year; ?>;
    var kasbon = <?php echo $kasbon; ?>;
    var nonkasbon = <?php echo $nonkasbon; ?>;
    var pertanggungan = <?php echo $pertanggungan; ?>;
</script>
<script>
    $(document).ready(function () {
        $("#nonkasbon").attr("hidden", "hidden"),
        $("#pertanggungan").attr("hidden", "hidden"),
        $("#jpertanggungan").attr("hidden", "hidden"),
        $("#jnkasbon").attr("hidden", "hidden"),
        $("#jmlnksb").attr("hidden", "hidden"),
        $("#jmlptj").attr("hidden", "hidden"),
        $("#totalnksb").attr("hidden", "hidden"),
        $("#totalptj").attr("hidden", "hidden"),
    toggleFields(); 
    $("#pilihan").change(function () {
        toggleFields();
    });

});

function toggleFields() {
    if ($("#pilihan").val() === "ononkasbon")
        $("#nonkasbon").removeAttr("hidden"),
        $("#jnkasbon").removeAttr("hidden"),
        $("#pertanggungan").attr("hidden", "hidden"),
        $("#jpertanggungan").attr("hidden", "hidden"),
        $("#jkasbon").attr("hidden", "hidden"),
        $("#kasbon").attr("hidden", "hidden"),
        $("#jmlnksb").removeAttr("hidden"),
        $("#totalnksb").removeAttr("hidden"),
        $("#jmlptj").attr("hidden", "hidden"),
        $("#totalptj").attr("hidden", "hidden"),
        $("#jmlksb").attr("hidden", "hidden"),
        $("#totalksb").attr("hidden", "hidden"),
        $("#tblksb").attr("hidden", "hidden");

    if ($("#pilihan").val() === "okasbon")
    $("#jkasbon").removeAttr("hidden"),
    $("#jpertanggungan").attr("hidden", "hidden"),
    $("#jnkasbon").attr("hidden", "hidden"),
    $("#kasbon").removeAttr("hidden"),
    $("#pertanggungan").attr("hidden", "hidden"),
    $("#nonkasbon").attr("hidden", "hidden"),
    $("#jmlnksb").attr("hidden", "hidden"),
    $("#totalnksb").attr("hidden", "hidden"),
    $("#jmlptj").attr("hidden", "hidden"),
    $("#totalptj").attr("hidden", "hidden"),
    $("#jmlksb").removeAttr("hidden"),
    $("#totalksb").removeAttr("hidden"),
    $("#tblksb").removeAttr("hidden");

    if ($("#pilihan").val() === "opertanggungan")
    $("#jpertanggungan").removeAttr("hidden"),
    $("#jkasbon").attr("hidden", "hidden"),
    $("#jnkasbon").attr("hidden", "hidden"),
    $("#pertanggungan").removeAttr("hidden"),
    $("#nonkasbon").attr("hidden", "hidden"),
    $("#kasbon").attr("hidden", "hidden"),
    $("#jmlnksb").attr("hidden", "hidden"),
    $("#totalnksb").attr("hidden", "hidden"),
    $("#jmlptj").removeAttr("hidden"),
    $("#totalptj").removeAttr("hidden"),
    $("#jmlksb").attr("hidden", "hidden"),
    $("#totalksb").attr("hidden", "hidden"),
    $("#tblksb").attr("hidden", "hidden");
}

</script>
        <script src="{{ URL::asset('assets/plugins/apex-charts/apexcharts.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/jquery.sales_dashboard.init.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection