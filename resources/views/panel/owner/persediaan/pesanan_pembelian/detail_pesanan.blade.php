
<div class="col-md-3">
<div class="form-group">
        <label for="kategori_">Kategori Produk</label>
        {{ Form::select('kategori_id',$kategori,null, ['title' => 'Pilih Kategori Produk','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_','onchange'=>'dataTableDetailModal("owner/produk/getByKategori","tb_detail_persediaan","produk",this)']) }}
        <!-- <select name="" class="form-control" title>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select> -->
        <small class="text-danger error-notif" id="kategori_id"></small>
</div>

</div>
<table id="tb_detail_persediaan" class="table" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="getDataDetail()">Send message</button>
</div>