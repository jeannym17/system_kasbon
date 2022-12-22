@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Units @endslot
            @slot('li_3') List @endslot
            @slot('title') List Units @endslot
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
                            <h4 class="card-title" style="display: inline;">Unit</h4>
                            <div class="mt-1 float-end">
                                <a class=" btn btn-sm btn-soft-primary"  href="{{ route('units.create') }}" role="button"><i class="fas fa-plus me-2"></i>New Unit</a>
                            </div>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($unit as $units)
                                    <tr>
                                        <td><i class="fas fa-units-circle fa-lg"></i> {{$units->name}}</td>
                                        <td class="text-end">
                                            <a href="{{ route('units.edit',$units->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <a type="submit" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#exampleModalDanger_{{$units->id}}" data-action="{{ route('units.destroy', $units->id) }}"><i class="las la-trash text-secondary font-16"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalDanger_{{$units->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDanger1" aria-hidden="true">
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
                                                    <form action="{{ route('units.destroy',$units->id) }}" method="POST" style="display: inline">
                                                    
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
    <script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/jquery.datatable.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
