<div class="row" id="form-entry-2">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtNameCard" class="col-lg-4 col-form-label" >Tanggal Jatuh Tempo</label>
                {{-- <div class="col-lg-4">
                    <input id="txtNameCard"  type="number" class="form-control" name="haritempo" value="{{$kasbon->haritempo}}" disabled>
                </div> --}}
                <div class="col-lg-8">
                    <div class="input-group">                                            
                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                    <input class="form-control"  id="example-date-input" name="tgltempo" value="{{ $kasbon->tgltempo ? $kasbon->tgltempo->format('m/d/Y')  : '-' }}" disabled>    
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameShipping" class="col-lg-4 col-form-label" >No VKB Kasbon</label>
                <div class="col-lg-8">
                    <input  parsley-type="text" class="form-control" value="{{$kasbon->nopi}}" name="novkbkasbon">    
                    <!-- <input id="txtLastNameShipping" name="txtLastNameShipping" type="text" class="form-control"> -->
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" >Nominal Kasbon</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                    <input required parsley class="form-control dollar" id="nominalkasbon" class="form-control"  name="nominalkasbon"  value="{{$kasbon->total}}" disabled/>
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Nilai Pertanggung Jawaban</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                    <input required parsley class="form-control dollar1" type="text" id="nilaiptj" name="nilaiptj" class="form-control" onkeyup="add_number()"/>
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCompanyShipping" class="col-lg-4 col-form-label" >Tgl Pertanggung Jawaban</label>
                <div class="col-lg-8">
                    <div class="input-group">                                            
                        <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                    <input id="form-control" class="form-control" type="date" id="example-date-input" name="tglptj" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtFirstNameBilling" class="col-lg-4 col-form-label" >Selisih Pertanggung Jawaban</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                    <input class="form-control" id="selisihptj" name="selisihptj" disabled/>
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtStateProvinceBilling" class="col-lg-4 col-form-label">Nilai Pembayaran Selisih Pertanggung Jawaban</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text">{{$kasbon->kurs->symbol}}</span>
                    <input  name="nilaiselisihptj" type="text" class="form-control dollarselisih">
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
    </div>
    <div class="row mt-3">
        <div class="col-sm-12 text-end">
            <a href="#" type="button" onclick="form1()" class="btn btn-danger px-4">Previous</a> 
            <button type="submit" class="btn btn-primary px-4">Simpan</button>      
        </div>
    </div>
</div><!-- end row -->
<input type="date" name="tgl_sp1"  value="" hidden>    
<input type="date" name="tgl_sp2" value=""   hidden>  
<input type="date" name="tgl_sp3"  value="" hidden>  
<input type="date" name="tgl_mts"  value="" hidden>  
<input type="date" name="tgl_pbsdm" value=""  hidden>  
<script>
    function add_number() {
      
        var first = document.getElementById("nilaiptj").value;
        var first1 = first.replace(/,/g, '');
        var first_number = parseFloat(first1);

        var third = document.getElementById("nominalkasbon").value;
        var third1 = third.replace(/,/g, '');
        var third_number = parseFloat(third1);

      if (isNaN(first_number)) first_number = 0;
      if (isNaN(third_number)) third_number = 0;
      var result = first_number - third_number ;

      function formatThousands(n, dp) {
  var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
  while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
  return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
  }
  document.getElementById("selisihptj").value = formatThousands(result);

    }
  </script>