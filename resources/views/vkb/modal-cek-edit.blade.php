
    
    <style>
        .left {
            text-align: left;
         
        }
        .left {
            text-align: left;
        }
        
    </style>
     {!! Form::model($kasbon, ['method' => 'PATCH','route' => ['vkb.update', $kasbon->id],'class' => 'form-parsley','id' => 'myForm']) !!}
     {{ csrf_field() }}
     <div class="modal fade bd-example-modal-lg multi-step" id="modalcekedit_{{$kasbon->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl"  >
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title step-1" data-step="1">Kasbon {{$kasbon->nokasbon}}</h4>
                    <h4 class="modal-title step-2" data-step="2">Lembar Verifikasi</h4>
                    <h4 class="modal-title step-3" data-step="3">Lampiran</h4>
                    <h4 class="modal-title step-4" data-step="4">Verifikasi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="myFunction()"></button>
                </div>
                <div class="modal-body step-1" data-step="1" >
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive shopping-cart">
                                    
                                    <table class="table mb-0" style="text-align:justify" >
                                        <tbody >
                                            <tr >
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">No Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->nokasbon}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">NIP</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->user->nip}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nama Vendor</p>
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->namavendor}}</td>                                      
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Tanggal Masuk</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->tglmasuk->format('m/d/Y')}}</td>     
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">User</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->user->name}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Tgl JTT</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td><input class="form-control" name="tgltempo" type="date" style="width: 50%" required></td>                                                         
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Jam Masuk</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->jammasuk}}</td> 
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Unit</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->user->unit->name}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">No Invoice</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->noinvoice}}</td>                                             
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->jeniskasbon}} </td>    
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Kurs</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->kurs->code}}</td> 
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">SPPH/KOI/LOI</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->spph}}</td>   
                                            </tr>  
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Kode Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->kodekasbon->name}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nilai/DPP</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    @if($kasbon->kurs->id == "42")
                                                        <input id="iddpp" type="text" class="form-control dollar"  name="iddpp" value="{{($kasbon->iddpp)}}" onkeyup="add_number()">
                                                    @else
                                                    <div class="form-group row mt-3">
                                                        <div class="col-lg-6">
                                                            <input id="iddpp1" type="text" class="form-control dollar1"  name="iddpp1" value="{{($kasbon->iddpp)}}" onkeyup="add_number1()"  />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input class="form-control dollark" name="konversi" id="k_konversi" placeholder="konversi" onkeyup="add_number1()"/>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">SJN</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{ $kasbon->sjn ?? '-' }}</td>                                              
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Jenis Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->jenis->name}}</td>   
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">PPN</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    @if($kasbon->kurs->id == "42")
                                                    <input id="idppn" class="form-control dollarppn"  name="idppn" value="{{($kasbon->idppn)}}" onkeyup="add_number()">
                                                    @else
                                                    <input  class="form-control" id="idppn1" class="form-control " type="text" name="idppn1" disabled />
                                                    @endif
                                                </td>                                                  <td>
                                                    <p class=" align-middle mb-0 product-name">No. PI (FOCUS)</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{ $kasbon->sjn ?? '-' }}</td>                                                        
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">PO Vendor</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->po_vendor}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">PPH</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <div class="form-group row mt-3">
                                                        <div class="col-lg-7">
                                                            @if($kasbon->kurs->id == "42")
                                                            <select class="form-select" value="id_pph" name="id_pph">
                                                                <option value="" disabled selected hidden>Pilih PPH</option>
                                                                @foreach ($pph as $pph)
                                                                @if(old('pph', $kasbon->id_pph) == $pph->id)
                                                                <option value="{{$pph->id}}" selected>{{$pph->name}}</option>
                                                                @else
                                                                <option  value="{{$pph->id}}" >{{$pph->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                            @else
                                                            <select class="form-select" value="id_pph" name="id_pph" disabled>
                                                                <option value="" disabled selected hidden>Pilih PPH</option>
                                                                @foreach ($pph as $pph)
                                                                @if(old('pph', $kasbon->id_pph) == $pph->id)
                                                                <option value="{{$pph->id}}" selected>{{$pph->name}}</option>
                                                                @else
                                                                <option  value="{{$pph->id}}" >{{$pph->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="input-group">
                                                                @if($kasbon->kurs->id == "42")
                                                                <input  class="form-control dollarpph" type="text" id="idpph" class="form-control"  name="idpph" value="{{($kasbon->idpph)}}" onkeyup="add_number()"  />
                                                                @else
                                                                <input  class="form-control" type="text" id="idpph1" class="form-control"  name="idpph1" value="{{($kasbon->idpph)}}" onkeyup="add_number1()" disabled />   
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div><!--end form-group--></td>    
                                                <td>                                        
                                                    <p class=" align-middle mb-0 product-name">Proyek</p>
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td style="width:30%">{{$kasbon->proyek}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">PO Customer</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->po_customer}}</td>     
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nominal Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td> 
                                                    @if($kasbon->kurs->id == "42")
                                                        <input class="form-control" id="total" name="total"  value="{{(number_format($kasbon->total))}}" >
                                                    @else
                                                        <input class="form-control" id="total1" name="total1"  value="{{(number_format($kasbon->total))}}" >
                                                        <br>
                                                        <input class="form-control" id="ktotal" name="k_total" disabled/>
                                                    @endif
                                                </td> 
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Uraian</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->uraianpengguna}}</td>                                                     
                                            </tr> 
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Bank</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->id_bank ?? ''}}</td>    
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nama Rekening</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->namarek}}</td>    
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nomor Rekening</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$kasbon->norek}}</td>   
                                            </tr>               
                                        </tbody>
                                    </table>
                                </div><!--end re-table-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div>
                <input value="{{$kasbon->id}}" class="text-muted mb-0" name="id" hidden>
                <div class="modal-body step-2" data-step="3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dokumen Vendor</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <label class="form-label">INVOICE</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_invoice=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_invoice1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_invoice=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_invoice2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_invoice=="-")? "checked" : "" }} >
                                                        <label class="form-check-label" for="dv_invoice2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-2">
                                                    <label class="form-label">KWITANSI</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_kwitansi=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_kwitansi1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_kwitansi=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_kwitansi2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_kwitansi=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_kwitansi2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">PO VENDOR</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_povendor=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_povendor1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_povendor=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_povendor2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_povendor=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_povendor2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">SJN VENDOR</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_sjnvendor=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_sjnvendor1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_sjnvendor=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_sjnvendor2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_sjnvendor=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_sjnvendor2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">PACKING LIST</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_packcinglist=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_packinglist1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_packcinglist=="COPY")? "checked" : "" }}> 
                                                        <label class="form-check-label" for="dv_packinglist2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_packcinglist=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_packinglist2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">TEST REPORT</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_testreport=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_testreport1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_testreport=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_testreport2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_testreport=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_testreport2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <label class="form-label">BAPP/BAST</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_bapp=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_bapp1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_bapp=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_bapp2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_bapp=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_bapp2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">LPBB</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_lppb=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_lppb1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_lppb=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_lppb2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_lppb=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_lppb2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">KO</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_ko=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_ko1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_ko=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_ko2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_ko=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_ko2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">SPP</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp1" value="ASLI" {{ ($kasbon->kelengkapan->dvendor->dv_spp=="ASLI")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_spp1">
                                                            ASLI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp2" value="COPY" {{ ($kasbon->kelengkapan->dvendor->dv_spp=="COPY")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_spp2">
                                                            COPY
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp2" value="-" {{ ($kasbon->kelengkapan->dvendor->dv_spp=="-")? "checked" : "" }}>
                                                        <label class="form-check-label" for="dv_spp2">
                                                            -
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dokumen Impor</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="form-label">PIB</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_pib" id="di_pib1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_pib=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_pib1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_pib" id="di_pib2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_pib=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_pib2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_pib" id="di_pib2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_pib=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_pib2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">AWB</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_bl" id="di_bl1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_bl=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_bl1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_bl" id="di_bl2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_bl=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_bl2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_bl" id="di_bl2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_bl=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_bl2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">COM</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_com" id="di_com1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_com=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_com1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_com" id="di_com2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_com=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_com2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_com" id="di_com2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_com=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_com2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">COO</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_coo" id="di_coo1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_coo=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_coo1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_coo" id="di_coo2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_coo=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_coo2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_coo" id="di_coo2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_coo=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_coo2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">INVOICE CUSTOM</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_invoicecustom=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_invoicecustom1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_invoicecustom=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_invoicecustom2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_invoicecustom=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_invoicecustom2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">SJN CUSTOM</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom1" value="ASLI" {{ ($kasbon->kelengkapan->dimpor->di_sjncustom=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_sjncustom1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom2" value="COPY" {{ ($kasbon->kelengkapan->dimpor->di_sjncustom=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_sjncustom2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom2" value="-" {{ ($kasbon->kelengkapan->dimpor->di_sjncustom=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="di_sjncustom2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dokumen Customer</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="form-label">MEMO INTERNAL</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_memointernal=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_memointernal1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_memointernal=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_memointernal2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal2" value="-"  {{ ($kasbon->kelengkapan->dcustomer->dc_memointernal=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_memointernal2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">SPPH</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph1" value="ASLI"  {{ ($kasbon->kelengkapan->dcustomer->dc_spph=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_spph1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_spph=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_spph2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_spph=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_spph2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">KO</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_ko=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_ko1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_ko=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_ko2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_ko=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_ko2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">LOI</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_loi=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_loi1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_loi=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_loi2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_loi=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_loi2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">PO CUSTOMER</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_invoicecustom=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_invoicecustom1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_invoicecustom=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_invoicecustom2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_invoicecustom=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_invoicecustom2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">SJN CUSTOMER</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom1" value="ASLI" {{ ($kasbon->kelengkapan->dcustomer->dc_sjncustom=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_sjncustom1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom2" value="COPY" {{ ($kasbon->kelengkapan->dcustomer->dc_sjncustom=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_sjncustom2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom2" value="-" {{ ($kasbon->kelengkapan->dcustomer->dc_sjncustom=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dc_sjncustom2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dokumen Pajak</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">KESESUAIAN FAKTUR</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur1" value="ASLI" {{ ($kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_kesesuaianfaktur1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur2" value="COPY" {{ ($kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_kesesuaianfaktur2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur2" value="-" {{ ($kasbon->kelengkapan->dpajak->dp_kesesuaianfaktur=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_kesesuaianfaktur2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">PAJAK PENGHASILAN</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan1" value="ASLI" {{ ($kasbon->kelengkapan->dpajak->dp_pajakpenghasilan=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_pajakpenghasilan1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan2" value="COPY" {{ ($kasbon->kelengkapan->dpajak->dp_pajakpenghasilan=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_pajakpenghasilan2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan2" value="-" {{ ($kasbon->kelengkapan->dpajak->dp_pajakpenghasilan=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_pajakpenghasilan2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">SURAT NON PKB</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp1" value="ASLI" {{ ($kasbon->kelengkapan->dpajak->dp_suratnonpkp=="ASLI")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_suratnonpkp1">
                                                        ASLI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp2" value="COPY" {{ ($kasbon->kelengkapan->dpajak->dp_suratnonpkp=="COPY")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_suratnonpkp2">
                                                        COPY
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp2" value="-" {{ ($kasbon->kelengkapan->dpajak->dp_suratnonpkp=="-")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dp_suratnonpkp2">
                                                        -
                                                    </label>
                                                </div>
                                            </div>
                                          
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dokumen Dinas</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="form-label">TICKET TRANSPORT</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_tickettransport" id="dd_tickettransport1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_tickettransport=="ADA")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_tickettransport1">
                                                        ADA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_tickettransport" id="dd_tickettransport2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_tickettransport=="TIDAK")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_tickettransport2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">NOTA MAKAN</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_notamakan" id="dd_notamakan1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_notamakan=="ADA")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_notamakan1">
                                                        ADA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_notamakan" id="dd_notamakan2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_notamakan=="TIDAK")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_notamakan2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">BOARDING PASS</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_boardingpass" id="dd_boardingpass1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_boardingpass=="ADA")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_boardingpass1">
                                                        ADA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_boardingpass" id="dd_boardingpass2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_boardingpass=="TIDAK")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_boardingpass2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">NOTA PENGINAPAN</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_notapenginapan" id="dd_notapenginapan1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_notapenginapan=="ADA")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_notapenginapan1">
                                                        ADA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_notapenginapan" id="dd_notapenginapan2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_notapenginapan=="TIDAK")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_notapenginapan2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">SPPD</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_sppd" id="dd_sppd1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_sppd=="ADA")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_sppd1">
                                                        ADA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_sppd" id="dd_sppd2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_sppd=="TIDAK")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_sppd2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">LAPORAN DINAS</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_lapdinas" id="dd_lapdinas1" value="ADA" {{ ($kasbon->kelengkapan->ddinas->dd_lapdinas=="ADA")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_lapdinas1">
                                                        ADA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dd_lapdinas" id="dd_lapdinas2" value="TIDAK" {{ ($kasbon->kelengkapan->ddinas->dd_lapdinas=="TIDAK")? "checked" : "" }}>
                                                    <label class="form-check-label" for="dd_lapdinas2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                    </div> <!-- end row --> 
                <div class="modal-body step-4" data-step="4" >
                    <div class="row" style="margin-left:auto;margin-right:auto;">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value=""  selected hidden>Pilih</option>
                                    <option value="Revisi">Minta Revisi</option>
                                    <option value="Terverifikasi">Terverifikasi</option>
                                    <option value="Ditolak">Tolak Ajuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-3">
                                <label class="form-label">Catatan</label>
                               <textarea class="form-control" name="catatan">{{$kasbon->kelengkapan->keterangan->catatan ?? '-'}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Kekurangan</label>
                                @foreach ($kasbon->kelengkapan->keterangan->keterangan_detail as $details)
                                <p><b>{{$loop->iteration}}. {{$details->kekurangan ?? '-' }}</b></p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <table class="table table-borderless mt-0">
                                    <thead>
                                      <tr>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                   <qy > <tbody id="tbode">
                                    @foreach ($kasbon->kelengkapan->keterangan->keterangan_detail as $detail)
                                      <tr>
                                        <td>
                                            <label class="mb-1">Kekurangan</label>
                                            <input type="text" name="kekurangan[]" id="kekurangan" class="form-control" value="{{$detail->kekurangan}}">
                                        </td>
                                        <td>
                                            <label class="mb-1">Tgl Kelengkapan</label>
                                            <input type="date" name="tgl_kelengkapan[]" id="" class="form-control" value="{{$detail->tgl_kelengkapan}}" >
                                        </td>
                                        <td><a href="javascript:;" class="btn btn-outline-danger btn-sm deleteRow mt-3"> <span class="far fa-trash-alt me-1"></span>Delete</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody> </qy>
                                  </table>
                                  <c> <a href="javascript:;" class="btn btn-outline-secondary addRow btn-sm" >
                                    <span class="fas fa-plus"></span> Add </a></c>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body step-3" data-step="2" style="text-align: center">
                    <iframe src="{{asset('storage/post-file/'.$kasbon->file)}}" width="700" height="700" class="col-lg-12 col-md-12 col-sm-12"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Back</button>
                    <button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('#demo-modal-3', 2)">Next</button>

                    <button type="button" class="btn btn-danger step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Back</button>
                    <button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 4)">Next</button>

                    <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 3)">Next</button>

                    <button type="button" class="btn btn-danger step step-4" data-step="4"  onclick="sendEvent('#demo-modal-3', 3)" >Back</button>
                    <button type="submit" class="btn btn-primary step step-4" data-step="4" >Simpan</button>
                   </div>
             
            </div>
        </div>
    </div><!--end modal-->
    {!! Form::close() !!} 
    <script>
        $('c').on('click','.addRow', function(){
            var trc = '<tr>'+
                '<td>'+
                    '<label class="mb-1">Kekurangan</label>'+
                    '<input type="text" name="kekurangan[]" id="kekurangan" class="form-control" ></td>'+
                    '<td>'+
                    '<label class="mb-1">Tgl Kelengkapan</label>'+
                    '<input type="date" name="tgl_kelengkapan[]" id="" class="form-control" ></td>'+
                '<td>'+  
                    '<a href="javascript:;" class="btn btn-sm btn-outline-danger deleteRow mt-3"> <span class="far fa-trash-alt me-1"></span>Delete</a></td>'+
            '</tr>';
        
            $('#tbode').append(trc);
        });
        
        $('#tbode').on('click','.deleteRow', function(){
            $(this).parent().parent().remove();
        });
        
        </script>
    <script>
        new Cleave('.dollar', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
          </script>
          <script>
        new Cleave('.dollarppn', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
          </script>
          <script>
                new Cleave('.dollar1', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        
          </script>
          <script>
                new Cleave('.dollarpph', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
          </script>
          <script>
                new Cleave('.dollark', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
          </script>
          <script>
                new Cleave('.dollarppn', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
          </script>
    <script>
        function add_number() {
    
          var first = document.getElementById("iddpp").value;
          var first1 = first.replace(/,/g, '');
          var first_number = parseFloat(first1);
    
          var second = document.getElementById("idppn").value;
          var second1 = second.replace(/,/g, '');
          var second_number = parseFloat(second1);
    
          var third = document.getElementById("idpph").value;
          var third1 = third.replace(/,/g, '');
          var third_number = parseFloat(third1);
    
          if (isNaN(first_number)) first_number = 0;
          if (isNaN(third_number)) third_number = 0;
          if (isNaN(second_number)) second_number = 0;
        //   var ppn = (11/100)*first_number;
        //   document.getElementById("idppn").value = ppn;
          var result = first_number + second_number - third_number;
        
            function formatThousands(n, dp) {
            var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
            while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
            return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
            }
            // document.getElementById("idppn").value = formatThousands(ppn);
            document.getElementById("total").value = formatThousands(result);
        }
      </script>
    
    <script>
        function add_number1() {
          var first = document.getElementById("iddpp1").value;
          var first1 = first.replace(/,/g, '');
          var first_number = parseFloat(first1);
    
          var second = document.getElementById("k_konversi").value;
          var second1 = second.replace(/,/g, '');
          var second_number = parseFloat(second1);
    
          var third_number = parseFloat(document.getElementById("idpph1").value);
          if (isNaN(first_number)) first_number = 0;
          if (isNaN(second_number)) second_number = 0;
          if (isNaN(third_number)) third_number = 0;
          var ppn = 0;
          document.getElementById("idppn1").value = ppn;
          var result = first_number + ppn - third_number;
          var resultk = result * second_number;
          
          function formatThousands(n, dp) {
            var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
            while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
            return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
            }
            document.getElementById("idppn1").value = formatThousands(ppn);
            document.getElementById("total1").value = formatThousands(result);
            document.getElementById("ktotal").value = formatThousands(resultk);
        }
      </script>