<form id="form_supplier" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode</label>
                      <input type="text" class="form-control" value="{{$number}}" name="kode" id="exampleInputUsername1" placeholder="Username" readonly>
                      <small class="text-danger error-notif" id="kode"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Nama">
                      <small class="text-danger error-notif" id="nama"></small>
                    </div>
                    <div class="form-group">
                      <label for="telepon_">Telepon</label>
                      <input type="text" class="form-control" id="telepon_" name="telepon" placeholder="Telepon">
                      <small class="text-danger error-notif" id="telepon"></small>
                    </div>
                    <div class="form-group">
                      <label for="email_">E-Mail</label>
                      <input type="email" class="form-control" id="email_" name="email" placeholder="Email">
                      <small class="text-danger error-notif" id="email"></small>
                    </div>
                    <div class="form-group">
                      <label for="npwp_">NPWP</label>
                      <input type="email" class="form-control" id="npwp_" name="npwp" placeholder="NPWP">
                      <small class="text-danger error-notif" id="npwp"></small>
                    </div>
                    <div class="form-group">
                      <label for="ktp_">KTP</label>
                      <input type="text" class="form-control" id="ktp_" name="ktp" placeholder="KTP">
                      <small class="text-danger error-notif" id="ktp"></small>
                    </div>
                    <div class="form-group">
                      <label for="alamat_">Alamat</label>
                      <input type="text" class="form-control" id="alamat_" name="alamat" placeholder="Alamat">
                      <small class="text-danger error-notif" id="alamat"></small>
                    </div>
                    <div class="form-group">
                      <label for="bank_">Bank</label>
                      <input type="text" class="form-control" id="bank_" name="bank" placeholder="Bank">
                      <small class="text-danger error-notif" id="bank"></small>
                    </div>
                    <div class="form-group">
                      <label for="rekening_">Rekening</label>
                      <input type="text" class="form-control" name="rekening" id="rekening_" placeholder="Rekening">
                      <small class="text-danger error-notif" id="rekening"></small>
                    </div>
                    <button type="button" class="btn btn-primary mr-2" onclick="store('owner/supplier/store','tb_supplier','form_supplier')">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
</form>