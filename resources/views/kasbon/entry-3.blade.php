
<style>
    .hide {
  display: none;
}
</style>
<div class="row" id="form-entry-3">
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
                                        <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice1" value="ASLI" >
                                        <label class="form-check-label" for="dv_invoice1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice2" value="COPY">
                                        <label class="form-check-label" for="dv_invoice2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_invoice" id="dv_invoice2" value="-" >
                                        <label class="form-check-label" for="dv_invoice2">
                                            -
                                        </label>
                                    </div>
                                </div>
                               
                                <div class="col-md-2">
                                    <label class="form-label">KWITANSI</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_kwitansi1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi2" value="COPY">
                                        <label class="form-check-label" for="dv_kwitansi2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_kwitansi" id="dv_kwitansi2" value="-" >
                                        <label class="form-check-label" for="dv_kwitansi2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">PO VENDOR</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_povendor1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor2" value="COPY">
                                        <label class="form-check-label" for="dv_povendor2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_povendor" id="dv_povendor2" value="-" >
                                        <label class="form-check-label" for="dv_povendor2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">SJN VENDOR</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_sjnvendor1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor2" value="COPY">
                                        <label class="form-check-label" for="dv_sjnvendor2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_sjnvendor" id="dv_sjnvendor2" value="-" >
                                        <label class="form-check-label" for="dv_sjnvendor2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">PACKING LIST</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_packinglist1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist2" value="COPY">
                                        <label class="form-check-label" for="dv_packinglist2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_packinglist" id="dv_packinglist2" value="-" >
                                        <label class="form-check-label" for="dv_packinglist2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">TEST REPORT</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_testreport1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport2" value="COPY">
                                        <label class="form-check-label" for="dv_testreport2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_testreport" id="dv_testreport2" value="-" >
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
                                        <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_bapp1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp2" value="COPY">
                                        <label class="form-check-label" for="dv_bapp2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_bapp" id="dv_bapp2" value="-" >
                                        <label class="form-check-label" for="dv_bapp2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">LPBB</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_lppb1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb2" value="COPY">
                                        <label class="form-check-label" for="dv_lppb2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_lppb" id="dv_lppb2" value="-" >
                                        <label class="form-check-label" for="dv_lppb2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">KO</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_ko1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko2" value="COPY">
                                        <label class="form-check-label" for="dv_ko2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_ko" id="dv_ko2" value="-" >
                                        <label class="form-check-label" for="dv_ko2">
                                            -
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">SPP</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp1" value="ASLI" required>
                                        <label class="form-check-label" for="dv_spp1">
                                            ASLI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp2" value="COPY">
                                        <label class="form-check-label" for="dv_spp2">
                                            COPY
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dv_spp" id="dv_spp2" value="-" >
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
                                    <input class="form-check-input" type="radio" name="di_pib" id="di_pib1" value="ASLI" required>
                                    <label class="form-check-label" for="di_pib1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_pib" id="di_pib2" value="COPY">
                                    <label class="form-check-label" for="di_pib2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_pib" id="di_pib2" value="-" >
                                    <label class="form-check-label" for="di_pib2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">AWB</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_bl" id="di_bl1" value="ASLI" required>
                                    <label class="form-check-label" for="di_bl1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_bl" id="di_bl2" value="COPY">
                                    <label class="form-check-label" for="di_bl2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_bl" id="di_bl2" value="-" >
                                    <label class="form-check-label" for="di_bl2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">COM</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_com" id="di_com1" value="ASLI" required>
                                    <label class="form-check-label" for="di_com1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_com" id="di_com2" value="COPY">
                                    <label class="form-check-label" for="di_com2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_com" id="di_com2" value="-" >
                                    <label class="form-check-label" for="di_com2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">COO</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_coo" id="di_coo1" value="ASLI" required>
                                    <label class="form-check-label" for="di_coo1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_coo" id="di_coo2" value="COPY">
                                    <label class="form-check-label" for="di_coo2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_coo" id="di_coo2" value="-" >
                                    <label class="form-check-label" for="di_coo2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">INVOICE CUSTOM</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom1" value="ASLI" required>
                                    <label class="form-check-label" for="di_invoicecustom1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom2" value="COPY">
                                    <label class="form-check-label" for="di_invoicecustom2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_invoicecustom" id="di_invoicecustom2" value="-" >
                                    <label class="form-check-label" for="di_invoicecustom2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">SJN CUSTOM</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom1" value="ASLI" required>
                                    <label class="form-check-label" for="di_sjncustom1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom2" value="COPY">
                                    <label class="form-check-label" for="di_sjncustom2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="di_sjncustom" id="di_sjncustom2" value="-" >
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
                                    <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal1" value="ASLI" required>
                                    <label class="form-check-label" for="dc_memointernal1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal2" value="COPY">
                                    <label class="form-check-label" for="dc_memointernal2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_memointernal" id="dc_memointernal2" value="-" >
                                    <label class="form-check-label" for="dc_memointernal2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">SPPH</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph1" value="ASLI" required>
                                    <label class="form-check-label" for="dc_spph1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph2" value="COPY">
                                    <label class="form-check-label" for="dc_spph2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_spph" id="dc_spph2" value="-" >
                                    <label class="form-check-label" for="dc_spph2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">KO</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko1" value="ASLI" required>
                                    <label class="form-check-label" for="dc_ko1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko2" value="COPY">
                                    <label class="form-check-label" for="dc_ko2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_ko" id="dc_ko2" value="-" >
                                    <label class="form-check-label" for="dc_ko2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">LOI</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi1" value="ASLI" required>
                                    <label class="form-check-label" for="dc_loi1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi2" value="COPY">
                                    <label class="form-check-label" for="dc_loi2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_loi" id="dc_loi2" value="-" >
                                    <label class="form-check-label" for="dc_loi2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">PO CUSTOMER</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom1" value="ASLI" required>
                                    <label class="form-check-label" for="dc_invoicecustom1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom2" value="COPY">
                                    <label class="form-check-label" for="dc_invoicecustom2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_invoicecustom" id="dc_invoicecustom2" value="-" >
                                    <label class="form-check-label" for="dc_invoicecustom2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">SJN CUSTOMER</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom1" value="ASLI" required>
                                    <label class="form-check-label" for="dc_sjncustom1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom2" value="COPY">
                                    <label class="form-check-label" for="dc_sjncustom2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dc_sjncustom" id="dc_sjncustom2" value="-" >
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
                                    <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur1" value="ASLI" required>
                                    <label class="form-check-label" for="dp_kesesuaianfaktur1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur2" value="COPY">
                                    <label class="form-check-label" for="dp_kesesuaianfaktur2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_kesesuaianfaktur" id="dp_kesesuaianfaktur2" value="-" >
                                    <label class="form-check-label" for="dp_kesesuaianfaktur2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">PAJAK PENGHASILAN</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan1" value="ASLI" required>
                                    <label class="form-check-label" for="dp_pajakpenghasilan1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan2" value="COPY">
                                    <label class="form-check-label" for="dp_pajakpenghasilan2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_pajakpenghasilan" id="dp_pajakpenghasilan2" value="-" >
                                    <label class="form-check-label" for="dp_pajakpenghasilan2">
                                        -
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">SURAT NON PKB</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp1" value="ASLI" required>
                                    <label class="form-check-label" for="dp_suratnonpkp1">
                                        ASLI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp2" value="COPY">
                                    <label class="form-check-label" for="dp_suratnonpkp2">
                                        COPY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dp_suratnonpkp" id="dp_suratnonpkp2" value="-" >
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
                                    <input class="form-check-input" type="radio" name="dd_tickettransport" id="dd_tickettransport1" value="ADA" required>
                                    <label class="form-check-label" for="dd_tickettransport1">
                                        ADA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_tickettransport" id="dd_tickettransport2" value="TIDAK" >
                                    <label class="form-check-label" for="dd_tickettransport2">
                                        TIDAK
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">NOTA MAKAN</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_notamakan" id="dd_notamakan1" value="ADA" required>
                                    <label class="form-check-label" for="dd_notamakan1">
                                        ADA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_notamakan" id="dd_notamakan2" value="TIDAK">
                                    <label class="form-check-label" for="dd_notamakan2">
                                        TIDAK
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">BOARDING PASS</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_boardingpass" id="dd_boardingpass1" value="ADA" required>
                                    <label class="form-check-label" for="dd_boardingpass1">
                                        ADA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_boardingpass" id="dd_boardingpass2" value="TIDAK" >
                                    <label class="form-check-label" for="dd_boardingpass2">
                                        TIDAK
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">NOTA PENGINAPAN</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_notapenginapan" id="dd_notapenginapan1" value="ADA" required>
                                    <label class="form-check-label" for="dd_notapenginapan1">
                                        ADA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_notapenginapan" id="dd_notapenginapan2" value="TIDAK">
                                    <label class="form-check-label" for="dd_notapenginapan2">
                                        TIDAK
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">SPPD</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_sppd" id="dd_sppd1" value="ADA" required>
                                    <label class="form-check-label" for="dd_sppd1">
                                        ADA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_sppd" id="dd_sppd2" value="TIDAK" >
                                    <label class="form-check-label" for="dd_sppd2">
                                        TIDAK
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">LAPORAN DINAS</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_lapdinas" id="dd_lapdinas1" value="ADA" required>
                                    <label class="form-check-label" for="dd_lapdinas1">
                                        ADA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dd_lapdinas" id="dd_lapdinas2" value="TIDAK" >
                                    <label class="form-check-label" for="dd_lapdinas2">
                                        TIDAK
                                    </label>
                                </div>
                            </div>
                        </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
    </div> <!-- end row --> 

    <div class="row">
        <div class="col-sm-12 text-end">
            <a onclick="form2()"type="button" class="btn btn-danger px-4">Previous</a>    
            <a href="#" type="button" onclick="form4()" class="btn btn-primary px-4">Next</a>      
        </div>
    </div>
</div>