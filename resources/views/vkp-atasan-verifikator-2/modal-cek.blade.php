{!! Form::model($pertanggungan, ['method' => 'PATCH','route' => ['vkp-atasan-verifikator-2.update', $pertanggungan->id],'class' => 'form-parsley','id' => 'myForm']) !!}
{{ csrf_field() }}
<div class="modal fade bd-example-modal-lg multi-step" id="modalcek_{{$pertanggungan->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog"  >
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title step-1" data-step="1">Kasbon {{$pertanggungan->kasbon->nokasbon}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="myFunction()"></button>
                </div>
                <div class="modal-body step-1" data-step="1" >
                    <div class="row" style="margin-left:auto;margin-right:auto;">
                        <div class="col-md-12">
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
                        <div class="col-md-12">
                            <div class="mt-3">
                                <label class="form-label">Catatan</label>
                               <textarea class="form-control" name="keterangan">{{$pertanggungan->keterangan_pertanggungan->keterangan ?? '-'}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="submit" class="btn btn-primary step step-1" data-step="1" >Simpan</button>
                 </div>
            </div>
        </div>
    </div><!--end modal-->
    {!! Form::close() !!} 
