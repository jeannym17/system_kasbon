<div class="row" id="form-edit-2">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row" >
                <label for="txtNameCard" class="col-lg-4 col-form-label">Nilai / DPP</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text" id="myspan">{{$nonkasbon->kurs->name}}</span>
                    <input   id="iddpp" type="text" class="form-control dollar"  name="iddpp" value="{{number_format($nonkasbon->iddpp)}}" onkeyup="add_number()"  />
                    <input   id="iddpp1" type="text" class="form-control dollar1"  name="iddpp1" value="{{number_format($nonkasbon->iddpp)}}" onkeyup="add_number1()"  /> 
                    </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
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
                        <span class="input-group-text" id="myspan2">{{$nonkasbon->kurs->name}}</span>
                    <input  class="form-control dollarpph" type="text" id="idpph" class="form-control" value="{{number_format($nonkasbon->idpph)}}" name="idpph" onkeyup="add_number()"  />
                    <input  class="form-control" type="number" id="idpph1" class="form-control" value="{{number_format($nonkasbon->idpph)}}" name="idpph1" onkeyup="add_number1()"  />    
                </div>
                </div>
            </div><!--end form-group-->
        </div><!--end col-->
        <div class="col-md-6">
            <div class="form-group row">
                <label for="txtNameCard" class="col-lg-4 col-form-label">PPN</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text" id="myspan1">{{$nonkasbon->kurs->name}}</span>
                        <input  class="form-control" id="idppn" class="form-control"   name="idppn" value="{{number_format($nonkasbon->idppn)}}" />
                        <input  class="form-control" id="idppn1" class="form-control" type="number" name="idppn1" value="{{number_format($nonkasbon->idppn)}}" />
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-md-6" id="totalidr" >
            <div class="form-group row">
                <label for="txtNameCard" class="col-lg-4 col-form-label">Nominal Kasbon</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text" id="myspan3">{{$nonkasbon->kurs->name}}</span>
                    <input class="form-control" name="total" id="total" value="{{number_format($nonkasbon->otal)}}" disabled/>
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
                        <span class="input-group-text" id="myspan4">{{$nonkasbon->kurs->name}}</span>
                    <input class="form-control" name="total1" id="total1" value="{{number_format($nonkasbon->total)}}" disabled/>
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
        </div><!--end col-->
        <div class="col-md-6" id="hkonversi">
            <div class="form-group row">
                <label for="txtNameCard" class="col-lg-4 col-form-label">Hasil Konversi</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-text">Rp. </span>
                    <input class="form-control" id="ktotal" name="k_total" value="{{number_format($nonkasbon->k_total)}}" disabled/>
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
        <div class="row mt-3">
            <div class="col-sm-12 text-end">
                <button type="button" onclick="form1()" class="btn btn-danger px-4">Back</button>  
                <button type="submit" class="btn btn-primary px-4">Simpan</button>  
            </div>
        </div>
    </div>
</div>
