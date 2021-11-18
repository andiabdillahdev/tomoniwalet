<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Label</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>Kode</td>
        <td>{{ $data['kode'] }}</td>
    </tr>
    <tr>
        <td>Staff</td>
        <td>{{ $data['staff']['name'] }}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>{{ $data['tanggal'] }}</td>
    </tr>
  </tbody>
</table>

@foreach($detail as $key => $value)
<table class="table table-striped">
  <thead>
    <tr colspan="2">
      <th scope="col">Item Produk Produk {{$key+1}}</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
        <td>Kode Produk</td>
        <td>{{ $value['produk']['kode'] }}</td>
    </tr>
    <tr>
        <td>Produk</td>
        <td>{{ $value['produk']['nama'] }}</td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>{{ number_format($value['produk']['harga']) }}</td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>{{ $value['kuantitas'] }}</td>
    </tr>
   
  </tbody>
</table> 
@endforeach

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Label</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>Total</td>
        <td>{{ number_format($data['total']) }}</td>
    </tr>
    <tr>
        <td>Uang Cash</td>
        <td>{{ number_format($data['cash']) }}</td>
    </tr>
    <tr>
        <td>Kembalian</td>
        <td>{{ number_format($data['kembalian']) }}</td>
    </tr>
  </tbody>
</table>