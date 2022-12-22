<div class="row" id="form-edit-1">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameBilling" class="col-lg-4 col-form-label">No NonKasbon</label>
                <div class="col-lg-8">
                    <input class="form-control" name="nokasbon" type="text" value="{{$nonkasbon->no_nonkasbon}}" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtEmailAddressBilling" class="col-lg-4 col-form-label">No Dokumen Sebelumnya </label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$nonkasbon->doksebelumnya}}" aria-label="Disabled input example" name="doksebelumnya" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->    
       
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                    <div class="col-lg-8">
                        <div class="input-group">                                            
                            <span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
                        <input class="form-control" name="tglmasuk" type="date" value="{{$nonkasbon->tglmasuk->format('Y-m-d')}}" id="example-date-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Jam Masuk</label>
                <div class="col-lg-8">
                    <div class="input-group">                                            
                        <span class="input-group-text"><i class="ti ti-alarm-clock font-16"></i></span>
                    <input class="form-control" type="time" name="jammasuk" value="{{$nonkasbon->jammasuk}}" id="example-time-input" disabled>
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameShipping" class="col-lg-4 col-form-label">NIP</label>
                <div class="col-lg-8">
                    <input id="employee_search" type="text" class="form-control" name="nip" value="{{$nonkasbon->user->nip}}" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" value="">User</label>
                <div class="col-lg-8">
                    <input required parsley-type="text" class="form-control" value="{{$nonkasbon->user->name}}" id="username" name="username" disabled>
                    <input  value="{{$nonkasbon->user->jabatan->id}}" id="jabatan" hidden>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCompanyShipping" class="col-lg-4 col-form-label">Unit</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$nonkasbon->unit->name}}" aria-label="Disabled input example" nama="id_unit" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">Kode NonKasbon</label>
                <div class="col-lg-8">
                    <select class="form-control" id="tagskk" name="kodekasbon">
                        <option  selected >{{$nonkasbon->kodekasbon}}</option>
                        @foreach ($kodekasbon as $kodekasbon)
                        <option  value="{{$kodekasbon->name}}">{{$kodekasbon->name}}</option>
                        @endforeach
                      </select>
                      <script>
                      $("#tagskk").select2({
                        tags: true
                      });
                    </script>
                </div>
            </div><!--end form-group-->
        </div><!--end col--> 
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCityShipping" class="col-lg-4 col-form-label">Jenis NonKasbon</label>
                <div class="col-lg-8">
                    <select class="form-control" id="tagsj" name="jenis">
                        <option  selected >{{$nonkasbon->jenis}}</option>
                        @foreach ($jenis as $jenis)
                        <option  value="{{$jenis->name}}">{{$jenis->name}}</option>
                        @endforeach
                      </select>
                      <script>
                      $("#tagsj").select2({
                        tags: true
                      });
                    </script>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Kurs</label>
                <div class="col-lg-8">
                    <select required class="form-select" id="Name"  name="id_kurs">
                        <option value="" disabled selected hidden>Pilih Kurs</option>
                        @foreach ($kurs as $kurs)
                        @if(old('kurs', $nonkasbon->id_kurs) == $kurs->id)
                        <option value="{{$kurs->id}}" data-name="{{$kurs->symbol}}" selected>{{$kurs->code}} - {{$kurs->name}}</option>
                        @else
                        <option  value="{{$kurs->id}}" data-name="{{$kurs->symbol}}" >{{$kurs->code}} - {{$kurs->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtNameCard" class="col-lg-4 col-form-label">Nama Vendor</label>
                <div class="col-lg-8">
                    <select class="form-control" id="tags" name="namavendor">
                        <option  selected >{{$nonkasbon->namavendor}}</option>
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
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">No Invoice</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$nonkasbon->noinvoice}}" aria-label="Disabled input example"  name="noinvoice" >
                </div>
            </div><!--end form-group-->
        </div><!--end col--> 
    </div>
      
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCityShipping" class="col-lg-4 col-form-label">Tujuan Pembayaran</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" value="{{$nonkasbon->tujuanpembayaran}}" name="tujuanpembayaran" required parsley>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCityShipping" class="col-lg-4 col-form-label">Proyek</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" value="{{$nonkasbon->proyek}}" name="proyek" required parsley>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->

    <div class="row">
        <div class="col-sm-12 text-end">
            <a href="{{route('nonkasbon.index')}}" type="button" class="btn btn-danger px-4">Back</a> 
            <button type="button" onclick="form2()" class="btn btn-primary px-4">Next</button>      
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var cekkurs = document.getElementById("Name").value;
   
   if(cekkurs==42)
    {
        
       $('#idppn1').attr("hidden", "hidden"),
       $('#totalvls').attr("hidden", "hidden"),
       $('#iddpp1').attr("hidden", "hidden"),
       $('#idpph1').attr("hidden", "hidden"),
       $('#hkonversi').attr("hidden", "hidden"),

       $('#idppn').removeAttr("hidden"),
       $('#totalidr').removeAttr("hidden"),
       $('#iddpp').removeAttr("hidden"),
       $('#idpph').removeAttr("hidden");
       $('#id_pph').removeAttr("disabled");
    }else
    {
       $('#idppn').attr("hidden", "hidden"),
       $('#totalidr').attr("hidden", "hidden"),
       $('#iddpp').attr("hidden", "hidden"),
       $('#idpph').attr("hidden", "hidden"),

       document.getElementById("idppn1").value = 0,
       document.getElementById("idpph1").value = 0,
       $('#idppn1').removeAttr("hidden"),
       $('#totalvls').removeAttr("hidden"),
       $('#iddpp1').removeAttr("hidden"),
       $('#idpph1').removeAttr("hidden"),
       $('#hkonversi').removeAttr("hidden"),
       $('#idppn1').attr("disabled", "disabled"),
       $('#idpph1').attr("disabled", "disabled");
       $('#id_pph').attr("disabled", "disabled");
     
    }
     $('#Name').select2();
     $('#namavendor').select2();
     $('#Name').change(function(){
    
     var val = $(this).val();
     var valn = $(this).find(':selected').data("name");
 
     var span = document.getElementById('myspan');
     span.innerText = span.textContent = valn;
 
     var span1 = document.getElementById('myspan1');
     span1.innerText = span1.textContent = valn;
 
     var span2 = document.getElementById('myspan2');
     span2.innerText = span2.textContent = valn;
 
     var span3 = document.getElementById('myspan3');
     span3.innerText = span3.textContent = valn;

     var span4 = document.getElementById('myspan4');
    span4.innerText = span4.textContent = valn;

    

    if(val==42)
    {
        $('#idppn1').attr("hidden", "hidden"),
        $('#totalvls').attr("hidden", "hidden"),
        $('#iddpp1').attr("hidden", "hidden"),
        $('#idpph1').attr("hidden", "hidden"),
        $('#hkonversi').attr("hidden", "hidden"),

        $('#idppn').removeAttr("hidden"),
        $('#totalidr').removeAttr("hidden"),
        $('#iddpp').removeAttr("hidden"),
        $('#idpph').removeAttr("hidden");
        $('#id_pph').removeAttr("disabled");
    }else
    {
        $('#idppn').attr("hidden", "hidden"),
        $('#totalidr').attr("hidden", "hidden"),
        $('#iddpp').attr("hidden", "hidden"),
        $('#idpph').attr("hidden", "hidden"),

        document.getElementById("idppn1").value = 0,
        document.getElementById("idpph1").value = 0,
        $('#idppn1').removeAttr("hidden"),
        $('#totalvls').removeAttr("hidden"),
        $('#iddpp1').removeAttr("hidden"),
        $('#idpph1').removeAttr("hidden"),
        $('#hkonversi').removeAttr("hidden"),
        $('#idppn1').attr("disabled", "disabled"),
        $('#idpph1').attr("disabled", "disabled"),
        $('#id_pph').attr("disabled", "disabled");
     
    }
   })
 })
 </script>
 
 <script>
 function add_number() {

var first = document.getElementById("iddpp").value;
var first1 = first.replace(/,/g, '');
var first_number = parseFloat(first1);

var third = document.getElementById("idpph").value;
var third1 = third.replace(/,/g, '');
var third_number = parseFloat(third1);

if (isNaN(first_number)) first_number = 0;
if (isNaN(third_number)) third_number = 0;
var ppn = (11/100)*first_number;
document.getElementById("idppn").value = ppn;
var result = first_number + ((11/100)*first_number) - third_number;

  function formatThousands(n, dp) {
  var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
  while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
  return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
  }
  document.getElementById("idppn").value = formatThousands(ppn);
  document.getElementById("total").value = formatThousands(result);


let x = document.getElementById("jabatan").value;
let y = result;
if ( x == "1" && y > 10000000) {
  document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 10,000,000 , masukkan user yang sesuai.";
  return false;
}  if ( x == "2" && y > 20000000) {
  document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 20,000,000 , masukkan user yang sesuai.";
  return false;
}  if ( x == "3" && y > 25000000) {
  document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 25,000,000 , masukkan user yang sesuai.";
  return false;
}  if ( x == "4" && y > 100000000) {
  document.getElementById("demo").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 100,000,000 , masukkan user yang sesuai.";
  return false;
 } else {
  document.getElementById("demo").innerHTML = "";
}
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

      let x = document.getElementById("jabatan").value;
      let y = resultk;
      if ( x == "1" && y > 10000000) {
        document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 10,000,000 , masukkan user yang sesuai.";
        return false;
      }  if ( x == "2" && y > 20000000) {
        document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 20,000,000 , masukkan user yang sesuai.";
        return false;
      }  if ( x == "3" && y > 25000000) {
        document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 25,000,000 , masukkan user yang sesuai.";
        return false;
      }  if ( x == "4" && y > 100000000) {
        document.getElementById("demo1").innerHTML = "User tidak boleh mengajukan melebihi nominal Rp. 100,000,000 , masukkan user yang sesuai.";
        return false;
       } else {
        document.getElementById("demo1").innerHTML = "";
      }
    }
  </script>