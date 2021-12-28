<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin:0;
            padding:0; 
        }
        #company{
            font-weight:bold;
        }

        #table_header{
            border: none;
            width: 100%;      
            border-collapse: collapse;
        }

        #table_item{
            border-collapse: collapse;
            width: 100%;
        }

        #table_item td, th {
            border: 1px solid #999;
            padding: 0.5rem;
            text-align: left;
            font-size : 12px;
        }

        ul{
            list-style: none;
            font-size : 12px;
        }

        .head_doc{
            font-size : 26px;
            font-weight:bold;
            text-align:center;
        }

        .address{
            font-size : 12px;
        }

        .cust_data li{
            margin-top: 4px;
            font-weight:500;
        }
    </style>
</head>
<body>
    <p id="company">Tomoniwalet</p>

    <table id="table_header">
        <tr>
        <td style="width:15rem"> <p class="address">Jl Trans Sulawesi ,Kec. Tomoni, <br> Kab. Luwu Timur, Prov. Sulawesi Selatan</p> 
         </td>
            <td> <div class="head_doc">Delivery Order</div></td>
            <td>
                <ul>
                    <li>Do No &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; {{ $data['kode'] }}</li>
                    <li>Do Date &nbsp; : &nbsp; {{ $data['tanggal'] }}</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                <ul class="cust_data">
                    <li>Phone : &nbsp; -</li>
                    <li>Customer Name &nbsp; : &nbsp; {{ $data['user']['name'] }}</li>
                    <li>Address &nbsp; : &nbsp; -</li>
                </ul>
            </td>
        </tr>
    </table>

    <table id="table_item">
        <thead>
            <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail as $key => $value)
            <tr>
                <td>{{$value['produk']['kode']}}</td>
                <td>{{$value['produk']['nama']}}</td>
                <td>{{$value['jumlah']}}</td>
               <td>{{$value['satuan']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>