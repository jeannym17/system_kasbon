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
            @slot('li_3') Profile @endslot
            @slot('title') Profile User @endslot
        @endcomponent

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <strong>Well Done 👍</strong>{{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

       
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">                      
                                                <h4 class="card-title">Personal Information</h4>                      
                                            </div><!--end col-->                                                       
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body">                       
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Nama</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Username</label>
                                            <div class="col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control" value="{{$user->email}}" placeholder="Email" aria-describedby="basic-addon1">
                                      
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">NIP</label>
                                            <div class="col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control" value="{{$user->nip}}" placeholder="Email" aria-describedby="basic-addon1">
                                        
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Unit</label>
                                            <div class="col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control" value="{{$user->unit->name}}" placeholder="Email" aria-describedby="basic-addon1">
                                             
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">Cancel</button>
                                            </div>
                                        </div>                                                     --}}
                                    </div>                                            
                                </div>
                            </div> <!--end col--> 
                            {{-- <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Change Password</h4>
                                    </div><!--end card-header-->
                                    <div class="card-body"> 
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Current Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="Password">
                                                <a href="#" class="text-primary font-12">Forgot password ?</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">New Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Confirm Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="Re-Password">
                                                <span class="form-text text-muted font-12">Never share your password.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Change Password</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">Cancel</button>
                                            </div>
                                        </div>   
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->                                                                               --}}
                        </div><!--end row-->
                    </div><!--end tab-pane-->
                </div><!--end tab-content-->
            </div><!--end col-->
        </div><!--end row-->

            
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
