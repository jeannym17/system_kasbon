
<style>
    .hide {
  display: none;
}
</style>
<div class="row" id="form-entry-4">
    <div class="col-xl-12">
        <input type="hidden" name="oldfile" value="{{$kasbon->file}}">
                <input type="file" id="input-file-now" class="dropify" name="file" data-default-file="{{ asset('storage/post-file/'.$kasbon->file, $kasbon->file) }}"  />              
    </div><!--end col-->
    <div class="row">
        <div class="col-sm-12 text-end">
            <a href="#" type="button" onclick="form3()" class="btn btn-danger px-4">Previous</a>    
            <button  type="submit"  class="btn btn-primary px-4">Simpan</button>      
        </div>
    </div>
</div>