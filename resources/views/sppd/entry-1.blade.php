
<div class="row"  id="form-entry-1">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group row">
                <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Dokumen Sebelumya</label>
                    <div class="col-lg-4">
                        <input class="form-control" name="nokasbon" type="text" value="{{$terakhir}}" disabled>
                    </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group row">
                    <label for="txtLastNameBilling" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-lg-4">
                            <input class="form-control" name="tglmasuk" type="date" value="{{$tglmasuk}}" id="example-date-input">
                        </div>
                </div>
            </div>
        </div>
    <div>  
        <table class="table table-bordered table-sm t1">
                <tbody>
                <tr  style="text-align:center;" >
                    <th rowspan="2">NAMA</th>
                    <th rowspan="2">NIP</th>
                    <th rowspan="2">DEPARTEMEN</th>
                    <th rowspan="2">TUJUAN/INSTANSI</th>
                    <th rowspan="2">PROYEK</th>
                    <th rowspan="2">KETERANGAN</th>
                    <th rowspan="2">TGL BERANGKAT</th>
                    <th rowspan="2">TGL PULANG</th>
                    <th  style="width: 5%" rowspan="2">HARI</th>
                    <th  style="width: 10%" colspan="2">NILAI SPPD</th>
                    <th style="width: 10%"rowspan="2">UANG LUMPSUM</th>
                    <th rowspan="2" style="width: 0%" class="text-center"></th>
                </tr>
                <tr class="item" style="text-align:center;" >
                    <td style="width: 5%">KURS</td>
                    <td style="width: 5%">RATE</td>
               </tr>
                <tr class="item" >
                    <td><input class="form-control" name="nama[]" required parsley/></td>
                    <td><input  class="form-control"  name="nip[]" required parsley /></td>
                    <td><input  class="form-control" name="departemen[]" required parsley/></td>
                    <td><input  class="form-control" name="tujuan[]" required parsley /></td>
                    <td><input  class="form-control" name="proyek[]" required parsley/></td>
                    <td><input  class="form-control" name="keterangan[]" required parsley /></td>
                    <td><input type="date" class="amount form-control" id="startDate" name="startDate[]" required></td>
                    <td><input type="date" class="amount form-control" id="endDate" name="endDate[]" required></td>
                    {{-- <td><input class="hari amount form-control" id="hari" name="hari[]"></td> --}}
                    <td><input class="hari form-control" name="hari[]"></td>
                    <td><select  class="form-control" name="kurs[]" required parsley > <option value="" disabled selected hidden></option>
                        @foreach ($kurs as $k)
                        <option  value="{{$k->id}}">{{$k->name}}</option>
                        @endforeach</select></td>
                    <td><select  class="rate amount form-control" name="rate[]" required parsley > <option value="" disabled selected hidden></option>
                        @foreach ($rate as $r)
                        <option  value="{{$r->harga}}">{{$r->name}}</option>
                        @endforeach</select></td>
                    <td><input  name="lumpsum[]" class="lumpsum amount form-control" id="lumpsum" value="" readonly="readonly" /></td>
                    <td class="text-end"><button type="button" name="remove"  class="btn btn-sm btn-soft-danger btn-circle me-2" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td>
                </tr>
                    
                

                <tfoot>
                        <tr>
                            <th class="text-center" colspan="11"><strong>JUMLAH</strong></th>
                            <th><input id="netto" readonly="readonly" class="form-control"  name="total" type="text" value=""></th>
                            <th></th>
                        </tr>
                    </tbody>
                    </tfoot>
            </table>
            <a class="btn btn-success btn-sm addRow">Add New Row</a>
            <br />
{{-- 
            <input type="submit" value="Submit">
            <input type="reset" value="Reset"> --}}
            <div class="row mt-3">
                <div class="col-sm-12 text-end">   
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>   
                </div>
            </div>
    </div>
{{--     
    <label for="startDate">Start Date:</label>
   
    <label for="endDate">End Date:</label>
   <br><br>
  
  
    
  
  
  <button onclick="calculateDate()">Calculate</button> --}}

<script>

$(document).ready(function () {

    $(document).ready(function () {
    $('#example').DataTable({
        scrollX: true,
    });
});

// function for adding a new row
var r = 1;
$('.addRow').click(function () {
    r++;
    $('.t1').append('<tr id="row' + r + '" class="item"><td><input class="form-control" name="nama[]" required parsley/></td><td><input  class="form-control"  name="nip[]" required parsley /></td><td><input  class="form-control" name="departemen[]" required parsley/></td><td><input  class="form-control" name="tujuan[]" required parsley /></td><td><input  class="form-control" name="nokontrak[]" required parsley/></td><td><input  class="form-control" name="kasbondinas[]" required parsley /></td><td><input type="date" class="amount form-control" id="startDate" name="startDate[]" required></td><td><input type="date" class="amount form-control" id="endDate" name="endDate[]" required></td><td><input class="hari amount form-control" id="hari" name="hari[]"></td><td><select  class="form-control" name="kurs[]" required parsley > <option value="" disabled selected hidden></option>@foreach ($kurs as $k)<option  value="{{$k->id}}">{{$k->name}}</option>@endforeach</select></td><td><select  class="rate amount form-control" name="rate[]" required parsley > <option value="" disabled selected hidden></option>@foreach ($rate as $r)<option  value="{{$r->harga}}">{{$r->name}}</option>@endforeach</select></td><td><input  name="lumpsum[]" class="lumpsum amount form-control" id="lumpsum" value="" readonly="readonly" /></td><td class="text-end"><button type="button" name="remove" id="' + r + '" class="btn btn-sm btn-soft-danger btn-circle me-2" onclick="rowElim(this);"><i class="dripicons-trash" aria-hidden="true"></i></button></td></tr>');
});
// remove row when X is clicked
$(document).on('click', '.btn_remove', function () {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
});
// calculate everything
$(document).on("keyup",  calcAll);
$(".amount").on("change", calcAll);
});

// function for calculating everything
function calcAll() {
// calculate total for one row

$(".item").each(function () {
    var lumpsum = 0;
    var rate = 0;
    var hari = 0;
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    if (!isNaN(parseFloat($(this).find(".hari").val()))) {
        hari = parseFloat($(this).find(".hari").val());
    }if (!isNaN(parseFloat($(this).find(".rate").val()))) {
        rate = parseFloat($(this).find(".rate").val());
    }

    var Difference_In_Time = new Date(endDate).getTime() - new Date(startDate).getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    document.getElementById("hari").value = Difference_In_Days;

    lumpsum = hari * rate ;
    $(this).find(".lumpsum").val(lumpsum.toFixed(2));



});

            var sum = 0;
            $(".lumpsum").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });

            $("#netto").val(sum.toFixed(2));

}
</script>
    
</div>
    
                        

