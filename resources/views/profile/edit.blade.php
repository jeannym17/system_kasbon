@extends('layout.master')
@section('title') Dashboard @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') IMST @endslot
            @slot('li_2') User @endslot
            @slot('li_3') Input @endslot
            @slot('title') Input User @endslot
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
                                        <h4 class="card-title">Tambah User</h4>
                                        {{-- <p class="text-muted mb-0">Create beautifully simple form labels that float over your input fields.</p> --}}
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

                                            {{ csrf_field() }}
                                          <div class="row mt-3">
                                            <div class="form-floating mb-3 col-lg-4">
                                                <input required parsley-type="text" class="form-control" id="floatingInput"  name='name' placeholder="name@example.com" value="{{old('name', $user->name)}}">
                                                <label for="floatingInput" data-parsley-minlength="6">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3 col-lg-4">
                                                <input required parsley-type="text" data-parsley-minlength="6" class="form-control" id="floatingInput"  name='email'  placeholder="name@example.com" value="{{old('email', $user->email)}}">
                                                <label for="floatingInput">Username</label>
                                            </div>
                                            <div class="form-floating mb-3 col-lg-4">
                                                <input required parsley-type="text" class="form-control" id="floatingInput"  name='nip' placeholder="name@example.com" value="{{old('nip', $user->nip)}}">
                                                <label for="floatingInput">NIP</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-floating mb-3 col-lg-6">
                                                <select required parsley class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_unit">
                                                    <option value="" disabled selected hidden>Pilih Unit</option>
                                                    @foreach ($units as $units)
                                                    @if(old('unit', $user->id_unit) == $units->id)
                                                    <option value="{{$units->id}}" selected>{{$units->name}}</option>
                                                    @else
                                                    <option  value="{{$units->id}}" >{{$units->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <label class="form-label">Unit</label>
                                            </div>
                                            <div class="form-floating mb-3 col-lg-6">
                                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-select','multiple')) !!}
                                                    <label class="form-label" for="exampleFormControlSelect2">Role</label>
                                                </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/list-user" class="btn btn-danger">Cancel</a>
            
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


