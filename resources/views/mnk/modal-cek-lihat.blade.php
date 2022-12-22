
    
    <style>
        .left {
            text-align: left;
         
        }
        .left {
            text-align: left;
        }
        
    </style>
    <div class="modal fade bd-example-modal-lg multi-step" id="modalceklihat_{{$nonkasbon->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl"  >
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title step-1" data-step="1">Non Kasbon {{$nonkasbon->no_nonkasbon}}</h4>
                    <h4 class="modal-title step-2" data-step="2">Verifikasi</h4>
                    <h4 class="modal-title step-3" data-step="3">Final Step</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body step-1" data-step="1" >
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive shopping-cart">
                                    <table class="table mb-0" style="text-align:justify" >
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">No. Non Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->no_nonkasbon}}</td>     
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Kode Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->kodekasbon}}</td> 
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Jenis Kasbon</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->jenis}}</td>                                           
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Tanggal Masuk</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->tglmasuk->format('m/d/Y')}}</td>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Kurs</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->kurs->code}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">No. Invoice</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->noinvoice}}</td>                                                     
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Jam Masuk</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->jammasuk}}</td> 
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nilai / DPP</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->iddpp)}}</td>     
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nama Vendor</p>
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->namavendor}}</td>                                                   
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">User</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->user->name}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">PPH</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>({{$nonkasbon->pph->name ?? '-'}}) {{number_format($nonkasbon->idpph ?? '-')}}</td>  
                                                <td >
                                                    <p class=" align-middle mb-0 product-name">Proyek</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td> {{$nonkasbon->proyek}}</td>  
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">NIP</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->user->nip}}</td>  
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">PPN</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->idppn) ?? '-'}}</td>     
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Tujuan Pembayaran</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td style="width:30%">{{$nonkasbon->tujuanpembayaran}}</td>        
                                            </tr>  
                                            <tr>
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Unit</p> 
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->user->unit->name}}</td>   
                                                <td>
                                                    <p class=" align-middle mb-0 product-name">Nominal Kasbon</p>
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>{{$nonkasbon->kurs->symbol}} {{number_format($nonkasbon->total)}}</td>
                                            </tr>                
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <b> Catatan : {{$nonkasbon->keterangannonkasbon->keterangan ?? '-'}} </b>
                                <div class="table-responsive shopping-cart">
                                    <table class="table  table-bordered table-sm t1">
                                        <tbody>
                                        <tr>
                                            <th style="width: 70%">Dokumen</th>
                                            <th>Nominal</th>
                                            {{-- <th style="width: 0%" class="text-center"></th> --}}
                                        </tr>
                                        @if (isset($nonkasbon->dokumennk->id)) 
                                        @foreach ($nonkasbon->dokumennk->dokumennkd as $item)
                                    <tr class="item">
                                        <td><input name="dokumen[]" class="form-control" value="{{$item->dokumen ?? ''}}" required parsley/></td></td>
                                        <td><input name="nominal[]" class="qnty amount form-control" value="{{$item->nominal ?? ''}}" required parsley /></td>
                                        <td class="text-end">
                                            <button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2 btn_remov" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td>
                                        </tr>
                                        @endforeach
                                        <tfoot>
                                            <tr>
                                                <th class="text-center"><strong>TOTAL NOMINAL</strong></th>
                                                <th><input id="netto" readonly="readonly" class="form-control"  name="total"  value="{{$nonkasbon->dokumennk->total ?? ''}}"></th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                            </tfoot>
                                            @else
                                           
                                            @endif
                                    </table>
                                </div><!--end re-table-->
                            </div>
                        </div>
                    </div>
                </div>
                 
                
            
            </div>
        </div>
    </div><!--end modal-->
