
    
    <style>
        .left {
            text-align: left;
         
        }
        .left {
            text-align: left;
        }
        
    </style>
                       
    <div class="modal fade bd-example-modal-lg multi-step" id="modalcekedit_{{$nonkasbon->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl"  >
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title step-1" data-step="1">Non Kasbon {{$nonkasbon->non_nonkasbon}}</h4>
                    <h4 class="modal-title step-2" data-step="2">Verifikasi</h4>
                    <h4 class="modal-title step-3" data-step="3">Final Step</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {!! Form::model($nonkasbon, ['method' => 'PATCH','route' => ['vnk.update', $nonkasbon->id],'class' => 'form-parsley form-control']) !!}
                {{ csrf_field() }}
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
                                </div><!--end re-table-->
                            </div>
                        </div>
                    </div>
                    <b> Catatan : {{$nonkasbon->keterangannonkasbon->keterangan}} </b>
                </div>
                <input value="{{$nonkasbon->id}}" class="text-muted mb-0" name="id" hidden>
                <div class="modal-body step-2" data-step="3">
                    <table class="table  table-bordered table-sm t1e">
                        <tbody>
                        <tr>
                            <th style="width: 70%">Dokumen</th>
                            <th>Nominal</th>
                            <th style="width: 0%" class="text-center"></th>
                            @foreach ($nonkasbon->dokumennk->dokumennkd as $iteme)
                        </tr>
                        <tr class="iteme">
                            <td><input name="dokumen[]" class="form-control" value="{{$iteme->dokumen}}" required parsley/></td></td>
                            <td><input name="nominal[]" class="qntye amounte form-control" value="{{$iteme->nominal}}" required parsley /></td>
                            <td class="text-end">
                                <button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th class="text-center"><strong>TOTAL NOMINAL</strong></th>
                                    <th><input id="nettoe" readonly="readonly" class="form-control"  name="total" type="text" value="{{number_format($nonkasbon->dokumennk->total)}}"></th>
                                    <th></th>
                                </tr>
                            </tbody>
                                </tfoot>
                    </table>
                    <a class="btn btn-success btn-sm addRowe">Add New Row</a>
                    <br />
                </div>

                <div class="modal-body step-3" data-step="2">
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
                            <div>
                                <label class="form-label">Catatan</label>
                               <textarea class="form-control" name="keterangan" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Back</button>
                    <button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('#demo-modal-3', 2)">Next</button>
                    <button type="button" class="btn btn-danger step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Back</button>
                    <button type="submit" class="btn btn-primary step step-3" data-step="3" >Simpan</button>
                    <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 3)">Next</button>
                </div>

            </div>
        </div>
    </div><!--end modal-->
                    {!! Form::close() !!} 
                    <script>

                        function add_number() {
                          var first_number = parseFloat(document.getElementById("iddpp").value);
                          if (isNaN(first_number)) first_number = 0;
                          var third_number = parseFloat(document.getElementById("idpph").value);
                          if (isNaN(third_number)) third_number = 0;
                          var ppn = (11/100)*first_number;
                          document.getElementById("idppn").value = ppn;
                          var result = first_number + ((11/100)*first_number) - third_number;
                          document.getElementById("total").value = result;
                        }
                      </script>
                    
                    <script>
                        function add_number1() {
                          var first_number = parseFloat(document.getElementById("iddpp1").value);
                          if (isNaN(first_number)) first_number = 0;
                          var third_number = parseFloat(document.getElementById("idpph1").value);
                          if (isNaN(third_number)) third_number = 0;
                          var second_number = parseFloat(document.getElementById("konversi").value);
                          if (isNaN(second_number)) second_number = 0;
                          var ppn = 0;
                          document.getElementById("idppn1").value = ppn;
                          var pph = 0;
                          document.getElementById("idpph1").value = ppn;
                          var result = (first_number*second_number) + ppn - third_number;
                          document.getElementById("total1").value = result;
                        }
                      </script>
       <script>

        $(document).ready(function () {
        
        var p = 1;
        $('.addRowe').click(function () {
            p++;
            $('.t1e').append('<tr id="rowe' + p + '" class="iteme"><td><input class="form-control" name="dokumen[]" required parsley /></td><td><input  required parsley class="qntye amounte form-control" name="nominal[]" /></td><td class="text-end"></button><button type="button" name="remove" id="' + p + '" class="btn btn-sm btn-soft-danger btn-circle me-2" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td></tr>');
        });
        // remove row when X is clicked
        $(document).on('click', '.btn_remove', function () {
            var button_ide = $(this).attr("id");
            $('#rowe' + button_ide + '').remove();
        });
        // calculate everything
        $(document).on("keyup", ".amounte", calcAlle);
        //$(".amounte").on("change", calcAlle);
        });
        
        // function for calculating everything
        function calcAlle() {
        // calculate total for one row
        
        $(".iteme").each(function () {
            var qntye = 0;
           
            if (!isNaN(parseFloat($(this).find(".qntye").val()))) {
                qntye = parseFloat($(this).find(".qntye").val());
            }
        
            totale = qntye;
            $(this).find(".qntye").val(totale);
        });
        
        // sum all totals
        var sum = 0;
        $(".qntye").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }
        });
        // show values in nettoe, steuer, brutto fields
        $("#nettoe").val(sum.toFixed());
        }
            </script>