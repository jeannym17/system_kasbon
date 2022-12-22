<style>
    .left {
        text-align: left;
        
    }
    .left {
        text-align: left;
    }
    
</style>
<div class="modal fade bd-example-modal-lg multi-step" id="modalcekedit_{{$nonkasbon->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title step-1" data-step="1">Kasbon {{$nonkasbon->nokasbon}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body step-1" data-step="1" >
            {!! Form::model($nonkasbon, ['method' => 'PATCH','route' => ['vnk-atasan-verifikator-1.update', $nonkasbon->id],'class' => 'form-parsley']) !!}
            <input value="{{$nonkasbon->id}}" class="text-muted mb-0" name="id" hidden>
                            {{ csrf_field() }}
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
                                        <textarea class="form-control" name="keterangan">{{ $nonkasbon->keterangannonkasbon->keterangan ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
            <div class="modal-footer"> 
                <button type="submit" class="btn btn-primary step step-1" data-step="1" >Simpan</button>
           </div>
            {!! Form::close() !!} 
        </div>
    </div>
</div><!--end modal-->
