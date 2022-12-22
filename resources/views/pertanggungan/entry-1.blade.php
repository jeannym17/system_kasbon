<div class="row" id="form-entry-1">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label  class="col-lg-4 col-form-label" name="nokasbon">No. Kasbon</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$kasbon->nokasbon}}" arial-label="Disable input example" disabled  readonly>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label  class="col-lg-4 col-form-label" name="user">User</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$kasbon->user->name}}" arial-label="Disable input example" disabled readonly>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCompanyBilling" class="col-lg-4 col-form-label" name="id_kodekasbon">Kode Kasbon</label>
                <div class="col-lg-8">
                    <input  type="text" class="form-control" value="{{$kasbon->kodekasbon->name}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label  class="col-lg-4 col-form-label" name="jeniskasbon">Jenis Kasbon</label>
                <div class="col-lg-8">
                    <input  type="text" class="form-control" value="{{$kasbon->jeniskasbon}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label  class="col-lg-4 col-form-label" name="namavendor">Nama Vendor</label>
                <div class="col-lg-8">
                    <input  type="text" class="form-control" value="{{$kasbon->namavendor}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label  class="col-lg-4 col-form-label" name="nip">NIP</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$kasbon->nip}}" arial-label="Disable input example" disabled readonly>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCityBilling" class="col-lg-4 col-form-label" name="po_vendor">Po Vendor</label>
                <div class="col-lg-8">
                    <input id="txtCityBilling" name="txtCityBilling" type="text" class="form-control" value="{{$kasbon->po_vendor}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtStateProvinceBilling" class="col-lg-4 col-form-label" name="proyek">Proyek</label>
                <div class="col-lg-8">
                    <input id="txtStateProvinceBilling" name="txtStateProvinceBilling" type="text" class="form-control" value="{{$kasbon->proyek}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCompanyBilling" class="col-lg-4 col-form-label">Unit</label>
                <div class="col-lg-8">
                    <input  type="text" class="form-control" value="{{$kasbon->unit->name}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtFaxBilling" class="col-lg-4 col-form-label" name="po_customer">Po Customer</label>
                <div class="col-lg-8">
                    <input id="txtFaxBilling" name="txtFaxBilling" type="text" class="form-control" value="{{$kasbon->po_customer}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCompanyBilling" class="col-lg-4 col-form-label" name="noinvoice">No. Invoice</label>
                <div class="col-lg-8">
                    <input  type="text" class="form-control" value="{{$kasbon->noinvoice}}" disabled >
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtAddress2Billing" class="col-lg-4 col-form-label" name="uraian_penggunaan">Uraian Penggunaan</label>
                <div class="col-lg-8">
                    <textarea required parsley-type="text" rows="4" class="form-control"  value="" name="proyek" disabled >{{$kasbon->uraianpengguna}}</textarea>    
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
    </div><!-- end row -->
    <div class="row mt-3">
        <div class="col-sm-12 text-end">
            <a type="button" onclick="form2()" class="btn btn-primary px-4">Next</a>      
        </div>
    </div>
</div>