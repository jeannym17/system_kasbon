
<div class="row" id="form-entry-1">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtEmailAddressBilling" class="col-lg-4 col-form-label">No. Dokumen Sebelumnya</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$kasbon->doksebelumnya}}" name="doksebelumnya" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtLastNameBilling" class="col-lg-4 col-form-label">No Kasbon</label>
                <div class="col-lg-8">
                    <input class="form-control" name="nokasbon" type="text" value="{{$kasbon->nokasbon}}" disabled>
                </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
            <div class="col-lg-4">
                <input class="form-control" name="tglmasuk" type="date" value="{{$kasbon->tglmasuk->format('Y-m-d')}}" >
            </div>
            <div class="col-lg-4">
                <input class="form-control" type="time" name="jammasuk"  value="{{$kasbon->jammasuk}}" >
            </div>
        </div><!--end form-group-->
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group row POC">
            <label for="txtNameCard" class="col-lg-4 col-form-label">Jatuh Tempo</label>
            <div class="col-lg-8">
            <div class="input-group">
                    <input   type="number" class="form-control" name="haritempo" value="{{$kasbon->haritempo}}" data-parsley-errors-messages-disabled>
                    <span class="input-group-text" id="basic-addon2">hari</span>
                </div>
            </div>
            
           <div class="col-lg-4">
                <input  parsley-type="text" class="form-control"  type="date" value="{{$dueDate}}" id="example-date-input" name="tgltempo">    
            </div> 
            </div><!--end form-group-->
        </div><!--end col-->  --}}
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameShipping" class="col-lg-4 col-form-label">NIP</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$kasbon->nip}}" name="nip" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Kasbon Rencana / Realisasi</label>
                <div class="col-lg-8">
                    <select required parsley class="form-select" aria-label="Default select example"  id="jeniskasbon"  name="jeniskasbon" >
                        <option value="KASBON RENCANA" {{old('jeniskasbon', $kasbon->jeniskasbon) == 'KASBON RENCANA' ? 'selected': ''}}>Kasbon Rencana</option>
                        <option value="KASBON REALISASI" {{old('jeniskasbon', $kasbon->jeniskasbon) == 'KASBON REALISASI' ? 'selected': ''}}>Kasbon Realisasi</option>
                    </select>
                </div>                
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtFirstNameShipping" class="col-lg-4 col-form-label" value="">User</label>
                <div class="col-lg-8">
                    <input required parsley-type="text" class="form-control" value="{{$kasbon->user->name}}" id="username" name="username" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtEmailAddressShipping" class="col-lg-4 col-form-label">Kode Kasbon</label>
            <div class="col-lg-8">
                <select required parsley class="form-select" name="kodekasbon">
                    <option value="" disabled selected hidden>Pilih Kode Kasbon</option>
                    @foreach ($kodekasbon as $kodekasbon)
                    @if(old('kodekasbon', $kasbon->id_kodekasbon) == $kodekasbon->id)
                    <option value="{{$kodekasbon->id}}" selected>{{$kodekasbon->name}}</option>
                    @else
                    <option  value="{{$kodekasbon->id}}" >{{$kodekasbon->name}}</option>
                    @endif
                    @endforeach
                </select>

                
            </div>
        </div><!--end form-group-->
    </div><!--end col--> 
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCompanyShipping" class="col-lg-4 col-form-label">Unit</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{$kasbon->unit->name}}" nama="id_unit" disabled>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="txtCityShipping" class="col-lg-4 col-form-label">Jenis Kasbon</label>
            <div class="col-lg-8">
                <select required parsley class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_jenis">
                    <option value="" disabled selected hidden>Pilih Kasbon</option>
                    @foreach ($jenis as $jenis)
                    @if(old('jenis', $kasbon->id_jenis) == $jenis->id)
                    <option value="{{$jenis->id}}" selected>{{$jenis->name}}</option>
                    @else
                    <option  value="{{$jenis->id}}" >{{$jenis->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div><!--end form-group-->
    </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtCityShipping" class="col-lg-4 col-form-label">Proyek</label>
                <div class="col-lg-8">
                    <input id="proyek" name="proyek" type="text" class="form-control" value="{{$kasbon->proyek}}" required>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtStateProvinceShipping" class="col-lg-4 col-form-label">Kurs</label>
                <div class="col-lg-8">
                    <select required class="form-select" id="Name"  name="id_kurs">
                        <option value="" disabled selected hidden>Pilih Kurs</option>
                        @foreach ($kurs as $kurs)
                        @if(old('kurs', $kasbon->id_kurs) == $kurs->id)
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
                <label for="txtAddress1Billing" class="col-lg-4 col-form-label">Uraian Penggunaan</label>
                <div class="col-lg-8">
                    <textarea id="uraianpengguna" name="uraianpengguna" rows="4" class="form-control" required parsley value="">{{$kasbon->uraianpengguna}}</textarea>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-sm-12 text-end">
            <a href="{{route('kasbon.index')}}" type="button" class="btn btn-danger px-4">Back</a>      
            <a href="#" type="button" onclick="form2()" class="btn btn-primary px-4">Next</a>      
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
        $('#k_konversi').removeAttr("required");
     }else
     {
        $('#idppn').attr("hidden", "hidden"),
        $('#totalidr').attr("hidden", "hidden"),
        $('#iddpp').attr("hidden", "hidden"),
        $('#idpph').attr("hidden", "hidden"),
        $('#k_konversi').attr("required", "required"),

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
        $('#idpph1').attr("disabled", "disabled");
        $('#id_pph').attr("disabled", "disabled");
      
     }
   })
 })
 </script>
 <script>
     $(document).ready(function () {
         $("#nopi").attr("disabled", "disabled"),
         $("#sjn").attr("disabled", "disabled"),
         $("#harga_jual").attr("disabled", "disabled");
        
     toggleFields(); 
     $("#jeniskasbon").change(function () {
         toggleFields();
     });
     $("#idppn").change(function () {
         toggleFields();
     });
 
 });
 
 function toggleFields() {
     if ($("#jeniskasbon").val() === "KASBON REALISASI")
         $("#nopi").removeAttr("disabled"),
         $("#harga_jual").removeAttr("disabled"),
         $("#sjn").removeAttr("disabled");
     else
         $("#nopi").val(""),
         $("#sjn").val(""),
         $("#harga_jual").val(""),
         $("#nopi").attr("disabled", "disabled"),
         $("#sjn").attr("disabled", "disabled"),
         $("#harga_jual").attr("disabled", "disabled");
 }
 
 </script>