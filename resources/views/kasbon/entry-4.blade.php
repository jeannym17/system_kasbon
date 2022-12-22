
<style>
    .hide {
  display: none;
}
</style>
<div class="row" id="form-entry-4">
    <div class="col-xl-12 mb-3">
                <input type="file" id="input-file-now" class="dropify" name="file" value="$kasbon->file"  accept="application/pdf, application/vnd.ms-excel" required/>              
                <p class="mt-0 mb-0" style="color: rgb(248, 55, 74)" id="fdemo"></p>
            </div><!--end col-->
    <div class="row ">
        <div class="col-sm-12 text-end">
            <a href="#" type="button" onclick="form3()" class="btn btn-danger px-4">Previous</a>    
            <button  type="submit"  class="btn btn-primary px-4">Simpan</button>      
        </div>
    </div>
</div>

<script>
    $('#input-file-now').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(5);
  if (numb > 5) {
    document.getElementById("fdemo").innerHTML = 'to big, maximum is 5MB. You file size is: ' + numb + ' MB';
    $('#input-file-now').val('');
  } else{
    document.getElementById("fdemo").innerHTML = "";
  }
});
</script>