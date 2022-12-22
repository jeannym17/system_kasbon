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
            <div class="col-sm-12">
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
                </div><!--end card-body-->  
                            {!! Form::model($kasbon, ['method' => 'PATCH','route' => ['kasbons.update', $kasbon->id]]) !!}
                            {{ csrf_field() }}
                            <div class="col-sm-12">
                                <div class="card form-wizard-wrapper">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Entry Kasbon Rencana</h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" name="tglmasuk" type="date" value="{{$kasbon->tglmasuk}}" id="example-date-input" disabled>
                                            </div>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Jam Masuk</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="time" name="jammasuk" value="{{$kasbon->jammasuk}}" disabled>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Kasbon Rencana / Realisasi</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="jeniskasbon" value="{{$kasbon->jeniskasbon}}" disabled>
                                    </div>                
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" value="">User</label>
                                        <div class="col-lg-8">
                                            <input required parsley-type="text" class="form-control" value="{{$kasbon->username}}" id="username" name="username" disabled>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameShipping" class="col-lg-4 col-form-label">NIP</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$kasbon->nip}}" aria-label="Disabled input example" nama="nip" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtCompanyShipping" class="col-lg-4 col-form-label">Unit</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$kasbon->unit->name}}" aria-label="Disabled input example" nama="id_unit" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtEmailAddressBilling" class="col-lg-4 col-form-label">No. Dokumen Sebelumnya</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$kasbon->doksebelumnya}}" aria-label="Disabled input example" name="doksebelumnya" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">Kode Kasbon</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$kasbon->kodekasbon->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col--> 
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Kurs</label>
                                        <div class="col-lg-8">
                                            <select class="form-select"  id="floatingSelect" aria-label="Floating label select example" name="id_kurs" required parsley>
                                                <option value="" disabled selected hidden>Pilih Kurs</option>
                                                @foreach ($kurs as $kurs)
                                                @if(old('kurs', $kasbon->id_kurs) == $kurs->id)
                                                <option value="{{$kurs->id}}" selected>{{$kurs->name}}</option>
                                                @else
                                                <option  value="{{$kurs->id}}" >{{$kurs->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtCityShipping" class="col-lg-4 col-form-label">Proyek</label>
                                        <div class="col-lg-8">
                                            <input id="proyek" name="proyek" type="text" class="form-control" value="{{$kasbon->proyek}}" required>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtAddress1Billing" class="col-lg-4 col-form-label">Uraian Penggunaan</label>
                                        <div class="col-lg-8">
                                            <textarea id="uraianpengguna" name="uraianpengguna" rows="4" class="form-control" required parsley value="">{{$kasbon->uraianpengguna}}</textarea>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtCityShipping" class="col-lg-4 col-form-label">Jenis Kasbon</label>
                                        <div class="col-lg-8">
                                            <select required parsley class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_jenis">
                                                <option value="" disabled selected hidden>Pilih Kasbon</option>
                                                @foreach ($jenis as $jenis)
                                                @if(old('jenis', $kasbon->id_jenis) == $jenis->id)
                                                <option value="{{$jenis->id}}" selected>{{$jenis->name}}</option>
                                                @else
                                                <option  value="{{$jenis->id}}" >{{$jenis->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                            </div>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                                <div class="card form-wizard-wrapper">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row" >
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai / DPP</label>
                                                <div class="col-lg-8">
                                                    <input  required parsley id="iddpp" type="number" class="form-control"  name="iddpp" onkeyup="add_number()" value="{{$kasbon->iddpp}}" />
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">PPN</label>
                                                <div class="col-lg-8">
                                                    <input required parsley class="form-control input-numera" type="number" id="idppn" class="form-control"  name="idppn" value="{{$kasbon->idppn}}" onkeyup="add_number()"/>
                                                        {{-- <script>
                                                            var cleaveNumeral = new Cleave('.input-numera', {
                                                            numeral: true,
                                                            numeralThousandsGroupStyle: 'thousand'
                                                            });
                                                        </script> --}}
                                                    </div>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PPH</label>
                                                    <div class="col-lg-4">
                                                        <select required parsley class="form-select" id="floatingSelect" aria-label="Floating label select example" value="id_pph" name="id_pph">
                                                        <option value="" disabled selected hidden>Pilih PPH</option>
                                                        @foreach ($pph as $pph)
                                                        @if(old('pph', $kasbon->id_jenis) == $pph->id)
                                                        <option value="{{$pph->id}}" selected>{{$pph->name}}</option>
                                                        @else
                                                        <option  value="{{$pph->id}}" >{{$pph->name}}</option>
                                                        @endif
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input required parsley class="form-control input-numera" type="number" id="idpph" class="form-control"  name="idpph" value="{{$kasbon->idpph}}" onkeyup="add_number()"/>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control input-numer" id="total" name="total" disabled value="{{$kasbon->total}}"/>
                                                            {{-- <script>
                                                                var cleaveNumeral = new Cleave('.input-numer', {
                                                                numeral: true,
                                                                numeralThousandsGroupStyle: 'thousand'
                                                                });
                                                            </script> --}}
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">SJN</label>
                                                    <div class="col-lg-8">
                                                        <input required parsley id="txtNameCard" name="sjn" type="text" class="form-control input-sj" data-parsley-minlength="17" value="{{$kasbon->sjn}}">
                                                        {{-- <script>
                                                            var cleave = new Cleave('.input-sj', {
                                                            prefix: 'SJIMST',
                                                            delimiter: '/',
                                                            blocks: [6, 4, 5],
                                                            uppercase: true
                                                        });
                                                        </script> --}}
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Harga Jual Ke Customer</label>
                                                    <div class="col-lg-8">
                                                        <input required parsley class="form-control input-num" name="harga_jual" value="{{$kasbon->harga_jual}}" />
                                                        <script>
                                                            var cleaveNumeral = new Cleave('.input-num', {
                                                            numeral: true,
                                                            numeralThousandsGroupStyle: 'thousand'
                                                            });
                                                        </script>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PO Vendor</label>
                                                    <div class="col-lg-8">
                                                        <input required parsley id="txtNameCard" name="po_vendor" type="text" class="form-control input-v" data-parsley-minlength="17" value="{{$kasbon->po_vendor}}">
                                                        {{-- <script>
                                                            var cleave = new Cleave('.input-v', {
                                                            prefix: 'POIMST',
                                                            delimiter: '/',
                                                            blocks: [6, 4, 5],
                                                            uppercase: true
                                                        });
                                                        </script> --}}
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PO Customer</label>
                                                    <div class="col-lg-8">
                                                        <input required parsley id="po_customer" name="po_customer" type="text" required parsley class="form-control" value="{{$kasbon->po_customer}}">
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <div class="col-sm-12">
                                <div class="card form-wizard-wrapper">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Vendor</label>
                                                <div class="col-lg-8">
                                                    <input  required parsley type="text" class="form-control" name ="namavendor" value="{{$kasbon->namavendor}}">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row POC">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Tanggal Jatuh Tempo</label>
                                                {{-- <div class="col-lg-4">
                                                    <input id="txtNameCard"  type="number" class="form-control" name="haritempo">
                                                </div> --}}
                                                <div class="col-lg-8">
                                                    <input required parsley-type="text" class="form-control"  type="date"  id="example-date-input" name="tgltempo" value="{{ $kasbon->tgltempo ? \Carbon\Carbon::parse($kasbon->tgltempo)->format('Y-m-d') : '' }}">    
                                                </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">No. Invoice</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="txtNameCard" name="noinvoice" type="text" class="form-control input-noi" data-parsley-minlength="10" value="{{$kasbon->noinvoice}}"> 
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
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">SPPH/KOI/LOI</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="txtNameCard" name="spph" type="text" class="form-control input-koi" data-parsley-minlength="20" value="{{$kasbon->spph}}">
                                                    {{-- <script>
                                                        var cleave = new Cleave('.input-koi', {
                                                        prefix: 'SISDMIMST',
                                                        delimiter: '/',
                                                        blocks: [9, 4, 5],
                                                        uppercase: true
                                                    });
                                                    </script> --}}
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Perkiraan Barang Datang</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="txtNameCard" name="barang_datang" type="date" class="form-control" required parsley value="{{$kasbon->barang_datang}}">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">No. PI (FOCUS)</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="txtNameCard" name="nopi" type="text" class="form-control input-pi" data-parsley-minlength="17" value="{{$kasbon->nopi}}">
                                                    {{-- <script>
                                                        var cleave = new Cleave('.input-pi', {
                                                        prefix: 'PIIMST',
                                                        delimiter: '/',
                                                        blocks: [6, 4, 5],
                                                        uppercase: true
                                                    });
                                                    </script> --}}
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Transfer Ke</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="transferke" name="transferke" type="text" required parsley class="form-control" value="{{$kasbon->transferke}}">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Bank</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="bank" name="bank" type="text" required parsley class="form-control" value="{{$kasbon->id_bank ?? ''}}">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Rekening</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="namarek" name="namarek" type="text" required parsley class="form-control" value="{{$kasbon->namarek}}">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Nomor Rekening</label>
                                                <div class="col-lg-8">
                                                    <input required parsley id="norek" name="norek" type="text" required parsley class="form-control" value="{{$kasbon->norek}}">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                    </div>
                                    </div>
                                </div>
                             </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="row">
                        <div class="col-sm-12 text-end mt-2" style="margin-top: -2rem">
                            <button type="button" class="btn btn-danger">Cancel</button>    
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </div> 
                    </div>
                    {!! Form::close() !!}
                </div><!--end card-->
            </div>
        </div>
        
      
        

        <script>
            function add_number() {
              var first_number = parseFloat(document.getElementById("iddpp").value);
              if (isNaN(first_number)) first_number = 0;
              var second_number = parseFloat(document.getElementById("idppn").value);
              if (isNaN(second_number)) second_number = 0;
              var third_number = parseFloat(document.getElementById("idpph").value);
              if (isNaN(third_number)) third_number = 0;
              var result = first_number + second_number + third_number;
              document.getElementById("total").value = result;
            }
          </script>
               
                             
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

@include('kasbons.script')

