<div class="row" id="form-entry-cek">
                            <div class="col-sm-12">
                                <div class="card form-wizard-wrapper">
                                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">                                            
                                                    <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                <input class="form-control" name="tglmasuk" type="date" value="{{$pertanggungan->kasbon->tglmasuk->format('d-m-Y')}}" id="example-date-input" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Jam Masuk</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">                                            
                                        <span class="input-group-text"><i class="ti ti-alarm-clock font-16"></i></span>
                                        <input class="form-control" type="time" name="jammasuk" value="{{$pertanggungan->kasbon->jammasuk}}" disabled>
                                        </div>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Kasbon Rencana / Realisasi</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="jeniskasbon" value="{{$pertanggungan->kasbon->jeniskasbon}}" disabled>
                                    </div>                
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" value="">User</label>
                                        <div class="col-lg-8">
                                            <input-type="text" class="form-control" value="{{$pertanggungan->kasbon->user->name}}" id="username" name="username" disabled>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameShipping" class="col-lg-4 col-form-label">NIP</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$pertanggungan->kasbon->nip}}" aria-label="Disabled input example" nama="nip" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtCompanyShipping" class="col-lg-4 col-form-label">Unit</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->unit->name}}" aria-label="Disabled input example" nama="id_unit" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtEmailAddressBilling" class="col-lg-4 col-form-label">No. Dokumen Sebelumnya</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{$pertanggungan->kasbon->doksebelumnya}}" aria-label="Disabled input example" name="doksebelumnya" disabled readonly>
                                    </div>
                                </div><!--end form-group-->
                            </div><!--end col-->
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">Kode Kasbon</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->kodekasbon->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col--> 
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Kurs</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->kurs->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled readonly>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtCityShipping" class="col-lg-4 col-form-label">Proyek</label>
                                        <div class="col-lg-8">
                                            <input id="proyek" name="proyek" type="text" class="form-control" value="{{$pertanggungan->kasbon->proyek}}" disabled>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtAddress1Billing" class="col-lg-4 col-form-label">Uraian Penggunaan</label>
                                        <div class="col-lg-8">
                                            <textarea id="uraianpengguna" name="uraianpengguna" rows="4" class="form-control" disabled>{{$pertanggungan->kasbon->uraianpengguna}}</textarea>
                                        </div>
                                    </div><!--end form-group-->
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtCityShipping" class="col-lg-4 col-form-label">Jenis Kasbon</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="{{$pertanggungan->kasbon->jeniskasbon}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled >
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
                                                    <div class="input-group">
                                                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                    <input  id="iddpp" class="form-control"  name="iddpp" value="{{number_format($pertanggungan->kasbon->iddpp)}}" disabled>
                                                    </div>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">PPN</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                    <input class="form-control input-numera" id="idppn" class="form-control"  name="idppn" value="{{number_format($pertanggungan->kasbon->idppn)}}" disabled>
                                                    </div>   
                                                </div>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PPH</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" type="text" value="{{$pertanggungan->kasbon->pph->name}}" aria-label="Disabled input example" id="kodekasbon" name="kodekasbon" disabled >
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control input-numera"id="idpph" class="form-control"  name="idpph" value="{{number_format($pertanggungan->kasbon->idpph)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control input-numer" id="total" name="total" disabled value="{{number_format($pertanggungan->kasbon->total)}}">
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">SJN</label>
                                                    <div class="col-lg-8">
                                                        <input id="txtNameCard" name="sjn" type="text" class="form-control input-sj"  value="{{$pertanggungan->kasbon->sjn}}" disabled> 
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Harga Jual Ke Customer</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control input-num" name="harga_jual" value="{{number_format($pertanggungan->kasbon->harga_jual)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PO Vendor</label>
                                                    <div class="col-lg-8">
                                                        <input id="txtNameCard" name="po_vendor" type="text" class="form-control input-v" data-parsley-minlength="17" value="{{$pertanggungan->kasbon->po_vendor}}" disabled>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">PO Customer</label>
                                                    <div class="col-lg-8">
                                                        <input id="po_customer" name="po_customer" type="text" class="form-control" value="{{$pertanggungan->kasbon->po_customer}}" disabled>
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
                                                    <input  type="text" class="form-control" name ="namavendor" value="{{$pertanggungan->kasbon->namavendor}}" disabled>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row POC">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Tanggal Jatuh Tempo</label>
                                                <div class="col-lg-4">
                                                    <input id="txtNameCard"  class="form-control" name="haritempo" value="{{$pertanggungan->kasbon->haritempo}}" disabled>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="input-group">                                            
                                                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                    <input-type="text" class="form-control"  type="date"  id="example-date-input" name="tgltempo" value="{{$pertanggungan->kasbon->tgltempo}}" disabled>    
                                                    </div>
                                                </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">No. Invoice</label>
                                                <div class="col-lg-8">
                                                    <input id="txtNameCard" name="noinvoice" type="text" class="form-control input-noi" data-parsley-minlength="10" value="{{$pertanggungan->kasbon->noinvoice}}" disabled> 
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">SPPH/KOI/LOI</label>
                                                <div class="col-lg-8">
                                                    <input id="txtNameCard" name="spph" type="text" class="form-control input-koi" data-parsley-minlength="20" value="{{$pertanggungan->kasbon->spph}}" disabled>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Perkiraan Barang Datang</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">                                            
                                                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                    <input id="txtNameCard" name="barang_datang" type="date" class="form-control" value="{{$pertanggungan->kasbon->barang_datang}}" disabled>
                                                    </div>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">No. PI (FOCUS)</label>
                                                <div class="col-lg-8">
                                                    <input id="txtNameCard" name="nopi" type="text" class="form-control input-pi" data-parsley-minlength="17" value="{{$pertanggungan->kasbon->nopi}}" disabled>
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
                                            <div class="form-group row" >
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">No VKB Kasbon</label>
                                                <div class="col-lg-8">
                                                    <input   class="form-control"  value="{{$pertanggungan->novkbkasbon}}" disabled>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtNameCard" class="col-lg-4 col-form-label">Tgl Bayar ke User</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                    <input class="form-control" type="date" class="form-control"  name="idppn" value="{{$pertanggungan->tglbayarkeuser}}" disabled>
                                                    </div>   
                                                </div>
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai Pertanggungjawaban</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control"class="form-control" value="{{number_format($pertanggungan->nilaiptj)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Tanggal Pertanggungjawaban</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                                                        <input class="form-control" type="date" class="form-control" value="{{$pertanggungan->tglptj}}" disabled>
                                                        </div>  
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Selisih Pertanggungjawaban</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control" type="date" class="form-control" value="{{number_format($pertanggungan->selisihptj)}}" disabled>
                                                        </div>  
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">No VKB Selisih PTJ</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input class="form-control" value="{{$pertanggungan->novkbselisihptj}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai Selisih PTJ</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input  type="text" class="form-control" value="{{number_format($pertanggungan->nilaiselisihptj)}}" disabled>
                                                    </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="txtNameCard" class="col-lg-4 col-form-label">Selisih PTJ Akhir</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                                                        <input type="text" class="form-control" value="{{number_format($pertanggungan->selisihptjakhir)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div><!--end form-group-->
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <div class="row mt-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{route('vkb.index')}}" class="btn btn-danger">Cancel</a>  
                                    <a href="#" type="button" onclick="form2()" class="btn btn-primary px-4">Next</a>      
                                </div>
                            </div>
                        </div>
                        </div>