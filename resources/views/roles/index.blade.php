@extends('layout.master')
@section('title') Dashboard @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Roles @endslot
            @slot('li_3') List @endslot
            @slot('title') List Roles @endslot
        @endcomponent
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <strong>Well Done 👍</strong>{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="display: inline;">Roles</h4>
                                <div class="mt-1 float-end">
                                    <a class=" btn btn-sm btn-soft-primary"  href="{{ route('roles.create') }}" role="button"><i class="fas fa-plus me-2"></i>New Role</a>
                                </div>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th style="width:70%">Permissions</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $roles)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$roles->name}}</td>
                                        <td>@if(!empty($roles->getPermissionNames()))
                                            @foreach($roles->getPermissionNames() as $v)
                                            <label class="badge rounded-pill bg-primary">{{ $v }}</label>
                                            @endforeach
                                            @endif</td>
                                        <td class="text-end">
                                            <a href="{{ route('roles.edit',$roles->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <a type="submit" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#exampleModalDanger_{{$roles->id}}" data-action="{{ route('roles.destroy', $roles->id) }}"><i class="las la-trash text-secondary font-16"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalDanger_{{$roles->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDanger1" aria-hidden="true">
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
                                                    <form action="{{ route('roles.destroy',$roles->id) }}" method="POST" style="display: inline">
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
                                    
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col -->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col -->
            </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
