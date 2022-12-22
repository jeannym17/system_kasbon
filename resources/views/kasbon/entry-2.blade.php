<div class="row" id="form-entry-2">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row" >
                <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai / DPP</label>
                <div class="col-lg-8">
                <div class="input-group">
                    <span class="input-group-text" id="myspan"></span>
                    <input   id="iddpp" type="text" class="form-control dollar"  name="iddpp" onkeyup="add_number()"  />
                    <input   id="iddpp1" type="text" class="form-control dollar1"  name="iddpp1" onkeyup="add_number1()"  />       
                </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtNameCard" class="col-lg-4 col-form-label">PPN</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text" id="myspan1"></span>
                    <input type="text" id="idppn" class="form-control dollarppn" name="idppn" onkeyup="add_number()"  />
                    <input  class="form-control" id="idppn1" class="form-control" type="number" name="idppn1" />
                        {{-- <script>
                            var cleaveNumeral = new Cleave('.input-numera', {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand'
                            });
                        </script> --}}
                    </div>
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">PPH</label>
                    <div class="col-lg-4">
                        <select  class="form-select" id="id_pph" aria-label="Floating label select example" name="id_pph" >
                        <option value="" disabled selected hidden>Pilih PPH</option>
                        @foreach ($pph as $pph)
                        <option  value="{{$pph->id}}">{{$pph->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-text" id="myspan2"></span>
                        <input  class="form-control dollarpph" type="text" id="idpph" class="form-control"  name="idpph" onkeyup="add_number()"  />
                        <input  class="form-control" type="number" id="idpph1" class="form-control"  name="idpph1" onkeyup="add_number1()"  />    
                    </div>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6" id="totalidr" >
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <span class="input-group-text" id="myspan3"></span>
                        <input class="form-control" name="total" id="total" disabled/>
                        <p class="mt-0 mb-0" style="color: rgb(248, 55, 74)" id="demo"></p>
                        </div>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6" id="totalvls" >
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-text" id="myspan4"></span>
                        <input class="form-control" name="total1" id="total1" disabled/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                        <input class="form-control dollark" name="konversi" id="k_konversi" placeholder="masukkan konversi" onkeyup="add_number1()"/>
                        </div>
                    </div>
                        <p class="mt-0 mb-0" style="color: rgb(248, 55, 74)" id="demo1"></p>
                </div><!--end form-group-->
            </div><!--end col-->
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">SJN</label>
                    <div class="col-lg-8">
                        <input id="sjn" name="sjn" type="text" class="form-control input-sj" >
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6" id="hkonversi">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Hasil Konversi</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                        <input class="form-control" id="ktotal" name="k_total" disabled/>
                            {{-- <script>
                                var cleaveNumeral = new Cleave('.input-numer', {
                                numeral: true,
                                numeralThousandsGroupStyle: 'thousand'
                                });
                            </script> --}}
                        </div>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">PO Vendor</label>
                    <div class="col-lg-8">
                        <input required parsley id="txtNameCard" name="po_vendor" type="text" class="form-control input-v" >
                        {{-- <script>
                            var cleave = new Cleave('.input-v', {
                            prefix: 'POIMST',
                            delimiter: '/',
                            blocks: [6, 4, 5],
                            uppercase: true
                        });
                        </script> --}}
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">PO Customer</label>
                    <div class="col-lg-8">
                        <input required parsley id="po_customer" name="po_customer" type="text" required parsley class="form-control">
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Vendor</label>
                    <div class="col-lg-8">
                        <select style="width: 100%" id="tags" name="namavendor" required>
                            <option value="" disabled selected hidden>Pilih Nama Vendor</option>
                            @foreach ($namavendor as $namavendor)
                            <option  value="{{$namavendor->name}}">{{$namavendor->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            $("#tags").select2({
                                tags: true
                            });
                        </script>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6 ">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">No. Invoice</label>
                    <div class="col-lg-8">
                        <input required parsley id="txtNameCard" name="noinvoice" type="text" class="form-control input-noi" > 
                        {{-- <script>
                            var cleave = new Cleave('.input-noi', {
                            delimiters: ['/'],
                            blocks: [3, 1, 4],
                            uppercase: true
                        });
                        </script> --}}
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">SPPH/KOI/LOI</label>
                    <div class="col-lg-8">
                        <input required parsley id="txtNameCard" name="spph" type="text" class="form-control input-koi" >
                        {{-- <script>
                            var cleave = new Cleave('.input-koi', {
                            prefix: 'SISDMIMST',
                            delimiter: '/',
                            blocks: [9, 4, 5],
                            uppercase: true
                        });
                        </script> --}}
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">No. VKB Kasbon</label>
                    <div class="col-lg-8">
                        <input id="novkb" name="novkb" type="text" class="form-control input-pi" >
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
        </div>
        <div class="row">
           
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">No. PI (FOCUS)</label>
                    <div class="col-lg-8">
                        <input id="nopi" name="nopi" type="text" class="form-control input-pi" >
                        {{-- <script>
                            var cleave = new Cleave('.input-pi', {
                            prefix: 'PIIMST',
                            delimiter: '/',
                            blocks: [6, 4, 5],
                            uppercase: true
                        });
                        </script> --}}
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Bank</label>
                    <div class="col-lg-8">
                            <select name="id_bank" id="bank" style="width: 100%"required>
                                <option value="" disabled selected hidden>Pilih Bank</option>
                                @foreach ($bank as $bank)
                                <option  value="{{$bank->name}}" >{{$bank->name}}</option>
                                @endforeach
                              </select>
                              <script>
                                $("#bank").select2({
                                    tags: true
                                });
                            </script>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
        </div>
        <div class="row">
           
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Rekening</label>
                    <div class="col-lg-8">
                        <input id="namarek" name="namarek" type="text" class="form-control input-pi" required>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNameCard" class="col-lg-4 col-form-label">Nomor Rekening</label>
                    <div class="col-lg-8">
                        <input id="norek" name="norek" type="number" class="form-control input-pi" required>
                    </div>
                </div><!--end form-group-->
            </div><!--end col-->
        </div>
        <div class="row">
            <div class="col-sm-12 text-end">
                <a href="#" type="button" onclick="form1()" class="btn btn-danger px-4">Previous</a> 
                <a href="#" type="button" onclick="form3()" class="btn btn-primary px-4">Next</a> 
            </div>
        </div>
</div>

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


      let x = document.forms["myform"]["jabatan"].value;
      let y = result;
    //   if ( x == "1" && y > 10000000) {
    //     document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 10,000,000 , masukkan user yang sesuai.";
    //     return false;
    //   }  if ( x == "2" && y > 20000000) {
    //     document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 20,000,000 , masukkan user yang sesuai.";
    //     return false;
    //   }  if ( x == "3" && y > 25000000) {
    //     document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 25,000,000 , masukkan user yang sesuai.";
    //     return false;
    //   }  if ( x == "4" && y > 100000000) {
    //     document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 100,000,000 , masukkan user yang sesuai.";
    //     return false;
    //    } else {
    //     document.getElementById("demo").innerHTML = "";
    //   }
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

      let x = document.forms["myform"]["jabatan"].value;
      let y = resultk;
    //   if ( x == "1" && y > 10000000) {
    //     document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 10,000,000 , masukkan user yang sesuai.";
    //     return false;
    //   }  if ( x == "2" && y > 20000000) {
    //     document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 20,000,000 , masukkan user yang sesuai.";
    //     return false;
    //   }  if ( x == "3" && y > 25000000) {
    //     document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 25,000,000 , masukkan user yang sesuai.";
    //     return false;
    //   }  if ( x == "4" && y > 100000000) {
    //     document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 100,000,000 , masukkan user yang sesuai.";
    //     return false;
    //    } else {
    //     document.getElementById("demo1").innerHTML = "";
    //   }
    }
  </script>