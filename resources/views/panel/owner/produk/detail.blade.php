<table class="table table-bordered">
    <thead>
        <tr>
          <th>Item</th>
          <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Kategori</td>
            <td>{{ $data['kategori']['nama'] }}</td>
        </tr>
        <tr>
            <td>Kode</td>
            <td>{{ $data['kode'] }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $data['nama'] }}</td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>{{ number_format($data['harga']) }}</td>
        </tr>
        <tr>
            <td>Estimasi Pengiriman</td>
            <td> {{$data['estimasi_pengiriman']}} </td>
        </tr>
        <tr>
            <td>Garansi</td>
            <td>{{$data['garansi']}}</td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>{{$data['deskripsi']}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{$data['status']}}</td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td>
                @foreach($data['gambar_detail'] as $value)
                    <img src="{{ asset('uploads/produk/'.$value['gambar']) }}" style="width:100px;height:100px">
                @endforeach
            </td>
        </tr>
    </tbody>
</table>