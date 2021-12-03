<form id="form_testi" class="forms-sample">
    <div class="form-group">
        <label for="image_">Gambar</label>
        <input type="file" class="form-control" name="image" id="image_">
        <small class="text-danger error-notif" id="image"></small>
    </div>
    <div class="form-group">
        <label for="nama_">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama_">
        <small class="text-danger error-notif" id="nama"></small>
    </div>
    <div class="form-group">
        <label for="text_">Text (Testi)</label>
        <input type="text" class="form-control" name="text" id="text_">
        <small class="text-danger error-notif" id="text"></small>
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="aktif">
                Aktif
                <i class="input-helper"></i></label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="tidak_aktif">
                Tidak Aktif
                <i class="input-helper"></i></label>
        </div>
        <small class="text-danger error-notif" id="status"></small>
    </div>

    <button type="button" class="btn btn-primary mr-2"
        onclick="store('owner/pengaturan-website/post_testimonial','tb_testi','form_testi')">Submit</button>
    <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
</form>