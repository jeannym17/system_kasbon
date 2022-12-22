@extends('layout.master')
@section('title') Dashboard @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
@endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') Dastone @endslot
            @slot('li_2') Forms @endslot
            @slot('li_3') Wizard @endslot
            @slot('title') Wizard @endslot
        @endcomponent
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <div class="row">
        {{-- <div class="col-sm-12">
            <div class="card-body"> 
                <div class="alert alert-danger mb-0" role="alert">
                    <h4 class="alert-heading font-18">Catatan :</h4>
                    <p>{{$kelengkapan->keterangan->catatan}}</p>
                    <h4 class="alert-heading font-18">Kekurangan : </h4>
                    @foreach ($detail as $detail)
                        <label for="">{{$loop->iteration}}.</label>
                        <label for="">{{$detail->kekurangan}}</label><br>
                    @endforeach
                </div>                                     
            </div><!--end card-body-->   --}}
            <div class="col-sm-12">
                <div class="card form-wizard-wrapper">
                    <div class="card-header">
                        <h4 class="card-title">{{$nonkasbon->no_nonkasbon}}</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="tglmasuk" type="date" value="{{$nonkasbon->tglmasuk->format('Y-m-d')}}" id="example-date-input" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Jam Masuk</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="time" name="jammasuk" value="{{$nonkasbon->jammasuk}}" disabled>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtEmailAddressBilling" class="col-lg-4 col-form-label">No. Dokumen Sebelumnya</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$nonkasbon->doksebelumnya}}" aria-label="Disabled input example" name="doksebelumnya" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameShipping" class="col-lg-4 col-form-label">NIP</label>
                                    <div class="col-lg-8">
                                        <input id="employee_search" type="text" class="form-control" name="nip" value="{{$nonkasbon->user->nip}}" required>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" value="">User</label>
                                    <div class="col-lg-8">
                                        <input required parsley-type="text" class="form-control" value="{{$nonkasbon->user->name}}" id="username" name="username" disabled>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCompanyShipping" class="col-lg-4 col-form-label">Unit</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$nonkasbon->unit->name}}" aria-label="Disabled input example" nama="id_unit" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">Kode Nonkasbon</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$nonkasbon->kodekasbon}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col--> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityShipping" class="col-lg-4 col-form-label">Jenis Nonkasbon</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$nonkasbon->jenis}}" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Kurs</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$nonkasbon->kurs->code}} - {{$nonkasbon->kurs->name}}" disabled readonly>                                       
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Vendor</label>
                                    <div class="col-lg-8">
                                        <input  required parsley type="text" class="form-control" name ="namavendor" value="{{$nonkasbon->namavendor}}" disabled>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6 ">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">No. Invoice</label>
                                    <div class="col-lg-8">
                                        <input required parsley id="txtNameCard" name="noinvoice" type="text" class="form-control input-noi" data-parsley-minlength="10" value="{{$nonkasbon->noinvoice}}" disabled> 
                                        {{-- <script>
                                            var cleave = new Cleave('.input-noi', {
                                            delimiters: ['/'],
                                            blocks: [3, 1, 4],
                                            uppercase: true
                                        });
                                        </script> --}}
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row" >
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai / DPP</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-text" id="myspan">{{$nonkasbon->kurs->symbol}}</span>
                                        <input  class="form-control"value="{{number_format($nonkasbon->iddpp)}}" disabled/>
                                        </div>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PPH</label>
                                    <div class="col-lg-4">
                                            <input class="form-control" type="text" value="{{$nonkasbon->pph->name ?? '-'}}" aria-label="Disabled input example" disabled >
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-text" id="myspan2">{{$nonkasbon->kurs->symbol}}</span>
                                        <input  class="form-control"  class="form-control"  value="{{number_format($nonkasbon->idpph)}}" disabled/>
                                    </div>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PPN</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-text" id="myspan1">{{$nonkasbon->kurs->symbol}}</span>
                                            <input  class="form-control" id="idppn" class="form-control"   name="idppn" value="{{number_format($nonkasbon->idppn)}}" disabled />
                                       </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-text" id="myspan3">{{$nonkasbon->kurs->symbol}}</span>
                                            <input class="form-control" id="total" name="total" value="{{number_format($nonkasbon->total)}}" disabled/>
                                        </div>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Tujuan Pembayaran</label>
                                    <div class="col-lg-8">
                                        <input  required parsley type="text" class="form-control" name ="tujuanpembayaran" value="{{$nonkasbon->tujuanpembayaran}}" disabled>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Proyek</label>
                                    <div class="col-lg-8">
                                        <input  required parsley type="text" class="form-control" name ="tujuanpembayaran" value="{{$nonkasbon->proyek}}" disabled>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                
    <div class="row">
        <div class="col-sm-12 text-end mt-2" style="margin-top: -2rem">
            <a href="{{route('nonkasbon.index')}}" class="btn btn-danger">Back</a>    
        </div>
    </div> 
    </div>
<!-- </div> -->

    <!-- </div> -->
<!-- </div>
</div>
</div> -->
               
                             
@endsection
@section('script')
    <script src="{{ URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/jquery.form-wizard.init.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/cleave/dist/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/jquery.validation.init.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/cleave/dist/addons/cleave-phone.i18n.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
@endsection


