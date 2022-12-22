<div class="row" id="form-entry-3">
    <div class="row">
        <div class="col-md-6">
            <label class="mt-3">PIB</label>
            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="di_pib" required parsley> 
                <option value="" disabled selected hidden>Pilih</option>
                    <option value="-" >-</option>
                    <option value="ASLI">ASLI</option>
                    <option value="COPY">COPY</option>
            </select>
        </div> <!-- end col -->
        <div class="col-md-6">
            <label class="mt-3">BILL OF LADING / AWB</label>
            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="di_bl" required parsley>
                <option value="" disabled selected hidden>Pilih</option>
                    <option value="-" >-</option>
                    <option value="ASLI">ASLI</option>
                    <option value="COPY">COPY</option>
            </select>
        </div> <!-- end col -->
        <div class="col-md-6">
            <label class="mt-3">COM</label>
            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="di_com" required parsley>
                <option value="" disabled selected hidden>Pilih</option>
                    <option value="-" >-</option>
                    <option value="ASLI">ASLI</option>
                    <option value="COPY">COPY</option>
            </select>
        </div> <!-- end col -->
        <div class="col-md-6">
            <label class="mt-3">COO</label>
            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="di_coo" required parsley>
                <option value="" disabled selected hidden>Pilih</option>
                    <option value="-" >-</option>
                    <option value="ASLI">ASLI</option>
                    <option value="COPY">COPY</option>
            </select>
        </div> <!-- end col -->
        <div class="col-md-6">
            <label class="mt-3">INVOICE CUSTOM</label>
            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="di_invoicecustom" required parsley>
                <option value="" disabled selected hidden>Pilih</option>
                    <option value="-" >-</option>
                    <option value="ASLI">ASLI</option>
                    <option value="COPY">COPY</option>
            </select>
        </div> <!-- end col -->
        <div class="col-md-6">
            <label class="mt-3">INVOICE FREIGHT</label>
            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="di_sjncustom" required parsley>
                <option value="" disabled selected hidden>Pilih</option>
                    <option value="-" >-</option>
                    <option value="ASLI">ASLI</option>
                    <option value="COPY">COPY</option>
            </select>
        </div> <!-- end col -->
    </div>
    <div class="row mt-3">
        <div class="col-sm-12 text-end">
            <a href="#" type="button" onclick="form3()" class="btn btn-danger px-4">Previous</a> 
            <a href="#" type="button" onclick="form5()" class="btn btn-primary px-4">Next</a>      
        </div>
    </div>
</div>