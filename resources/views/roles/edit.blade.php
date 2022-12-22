@extends('layout.master')
@section('title') Dashboard @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') Role @endslot
            @slot('li_3') Edit @endslot
            @slot('title') Edit Role @endslot
        @endcomponent
        @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

                            <div class="col-lg-6 mx-auto">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tambah role</h4>
                                        {{-- <p class="text-muted mb-0">Create beautifully simple form labels that float over your input fields.</p> --}}
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                                          <div class="row mt-3">
                                            <div class="form-floating mb-3 col-lg-12">
                                                <input required parsley-type="text" class="form-control" id="floatingInput"  name='name' placeholder="name@example.com" value="{{old('name', $role->name)}}">
                                                <label for="floatingInput" data-parsley-minlength="6">Nama</label>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                                <label class="col-md-3 my-2 form-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="form-check">
                                                        @foreach($permission as $value)
                                                     <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                        {{ $value->name }}</label>
                                                     <br/>  
                                                     @endforeach
                                                    </div>
                                                </div>
                                        </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancel</a>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                    {!! Form::close() !!}
                                </div><!--end col-->
            
            
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection