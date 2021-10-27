<form id="form_kategori" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode</label>
                      <input type="text" class="form-control" value="{{$data['kode']}}" name="kode" id="exampleInputUsername1" placeholder="Username" readonly>
                      <small class="text-danger error-notif" id="kode"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{$data['nama']}}" id="exampleInputEmail1" placeholder="Nama">
                      <small class="text-danger error-notif" id="nama"></small>
                    </div>
                    <button type="button" class="btn btn-primary mr-2" onclick="store('owner/kategori/update/{{$data['id']}}','tb_kategori','form_kategori')">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
</form>