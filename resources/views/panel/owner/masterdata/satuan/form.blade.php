<form id="form_satuan" class="forms-sample">
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama">
                      <small class="text-danger error-notif" id="nama"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" id="exampleInputEmail1" placeholder="Keterangan">
                      <small class="text-danger error-notif" id="keterangan"></small>
                    </div>
                    <button type="button" class="btn btn-primary mr-2" onclick="store('owner/satuan/store','tb_satuan','form_satuan')">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
</form>