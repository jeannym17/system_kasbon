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
            @slot('li_2') User @endslot
            @slot('li_3') List @endslot
            @slot('title') List User @endslot
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
                            <h4 class="card-title" style="display: inline;">User</h4>
                            <div class="mt-1 float-end">
                                <a class=" btn btn-sm btn-soft-primary"  href="{{ route('users.create') }}" role="button"><i class="fas fa-plus me-2"></i>New User</a>
                            </div>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>NIP</th>
                                    <th>Unit</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                    <tr>
                                        <td><i class="fas fa-user-circle fa-lg"></i> {{$user->name}}</td>
                                        <td>{{$user->jabatan->name ?? '-'}}</td>
                                        <td>{{$user->nip}}</td>
                                        <td>{{$user->unit->name}}</td>
                                        <td> @if(!empty($user->getRoleNames()))
                                          @foreach($user->getRoleNames() as $v)
                                          @if($v == "USER")
                                          <span class="badge badge-soft-info">{{ $v }}</span>
                                          @elseif($v == "ADMIN")
                                          <span class="badge badge-soft-purple">{{ $v }}</span>
                                          @elseif($v == "VERIFIKATOR")
                                          <span class="badge badge-soft-warning">{{ $v }}</span>
                                          @elseif($v == "ATASAN USER 1")
                                          <span class="badge badge-soft-primary">{{ $v }}</span>
                                          @elseif($v == "ATASAN USER 2")
                                          <span class="badge badge-soft-primary">{{ $v }}</span>
                                          @elseif($v == "ATASAN USER 3")
                                          <span class="badge badge-soft-primary">{{ $v }}</span>
                                          @elseif($v == "ATASAN VERIFIKATOR 1")
                                          <span class="badge badge-soft-success">{{ $v }}</span>
                                          @elseif($v == "ATASAN VERIFIKATOR 2")
                                          <span class="badge badge-soft-success">{{ $v }}</span>
                                          @elseif($v == "ATASAN VERIFIKATOR 3")
                                          <span class="badge badge-soft-success">{{ $v }}</span>
                                          @else
                                          <span class="badge badge-soft-success">{{ $v }}</span>
                                          @endif
                                          @endforeach
                                        @endif</td>
                                        <td class="text-end">
                                            <a href="{{ route('users.edit',$user->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <a type="submit" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#exampleModalDanger_{{$user->id}}" data-action="{{ route('users.destroy', $user->id) }}"><i class="las la-trash text-secondary font-16"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalDanger_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDanger1" aria-hidden="true">
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
                                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: inline">
                                                    
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
