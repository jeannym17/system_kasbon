
    
    <style>
        .left {
            text-align: left;
         
        }
        .left {
            text-align: left;
        }
        
    </style>
    <div class="modal fade bd-example-modal-lg multi-step" id="modalcek_{{$nonkasbon->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  >
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
                                <div class="table-responsive shopping-cart">
                                    <table class="table  table-bordered table-sm t1">
                                        <tbody>
                                        <tr>
                                            <th style="width: 70%">Dokumen</th>
                                            <th>Nominal</th>
                                            {{-- <th style="width: 0%" class="text-center"></th> --}}
                                        </tr>
                                        @foreach ($nonkasbon->dokumennk->dokumennkd as $item)
                                            
                                        
                                        <tr class="item">
                                            <td>{{$item->dokumen}}</td>
                                            <td>{{$nonkasbon->kurs->symbol}} {{number_format($item->nominal)}}</td>
                                            {{-- <td class="text-end"> --}}
                                                {{-- <button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td> --}}
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center"><strong>TOTAL NOMINAL</strong></th>
                                                    <th>
                                                        <div class="input-group">
                                                            <span class="input-group-text">{{$nonkasbon->kurs->symbol}}  {{number_format($nonkasbon->dokumennk->total)}}</span>
                                                       </th>
                                                    </div>
                                                    {{-- <th></th> --}}
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div><!--end re-table-->
                            </div>
                        </div>
                    {!! Form::model($nonkasbon, ['method' => 'PATCH','route' => ['vnk-atasan-verifikator-3.update', $nonkasbon->id],'class' => 'form-parsley form-control']) !!}
                <input value="{{$nonkasbon->id}}" class="text-muted mb-0" name="id" hidden>
                                {{ csrf_field() }}
                <div class="modal-body step-2" data-step="3">
                    <div class="row" style="margin-left:auto;margin-right:auto;">
                        <div class="col-md-6">
                            <div class="">
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
                            <div class="">
                                <label class="form-label">Catatan</label>
                               <textarea class="form-control" name="keterangan" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-danger step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Back</button>
                    <button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('#demo-modal-3', 2)">Next</button>
                    <button type="button" class="btn btn-danger step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Back</button>
                    <button type="submit" class="btn btn-primary step step-2" data-step="3" >Simpan</button>
                </div>
                {!! Form::close() !!} 
            </div>
        </div>
    </div><!--end modal-->
