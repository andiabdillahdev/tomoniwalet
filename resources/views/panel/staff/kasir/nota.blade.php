


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Kecil</title>
    <style>
        body {
            text-transform: uppercase;
        }
    </style>
    <?php
    $style = '
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        table td {
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }

        @media print {
            @page {
                margin: 0;
                size: 75mm
    ';
    ?>
    <?php
    $style .=
        ! empty($_COOKIE['innerHeight'])
            ? $_COOKIE['innerHeight'] .'mm; }'
            : '}';
    ?>
    <?php
    $style .= '
            html, body {
                width: 70mm;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
    ';
    ?>

    {!! $style !!}
</head>
{{-- onload="window.print()" --}}
<body>
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h6 style="margin-bottom: 5px;">Tomoniwalet</h6>
        <p style="font-size:12px">Alamat : Tomoni, Kabupaten Luwu Timur, Sulawesi Selatan </p>
        <p style="font-size:12px">Telp. 08xxxxxxx</p>
        <p class="text-center">===================================</p>
    </div>
    <br>
    <div>
        <p style="float: left;">{{ date('d-m-Y') }}</p>
        <!-- <p style="float: right">Nama Kasir</p> -->
    </div>

    <p class="text-center">===================================</p>

    <br>
    <table width="100%" style="border: 0;">
        
            <tr>
                <td colspan="3">Nama Produk</td>
            </tr>
            <tr>
                <td> 1 * 10.000</td>
                <td></td>
                <td class="text-right">20.000</td>
            </tr>
        
    </table>
    <p class="text-center">===================================</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga:</td>
            <td class="text-right">10.000</td>
        </tr>
        <tr>
            <td>Total Item:</td>
            <td class="text-right">10.000</td>
        </tr>
        <tr>
            <td>Diskon:</td>
            <td class="text-right">10.000</td>
        </tr>
        <tr>
            <td>Total Bayar:</td>
            <td class="text-right">10.000</td>
        </tr>
        <tr>
            <td>Diterima:</td>
            <td class="text-right">10.000</td>
        </tr>
        <tr>
            <td>Kembali:</td>
            <td class="text-right">10.000</td>>
        </tr>
    </table>

    <p class="text-center">===================================</p>
    <p class="text-center">TERIMA KASIH<br> BARANG YANG SUDAH DIBELI <br>TIDAK DAPAT DIKEMBALIKAN</p>

    <script type="text/javascript">
        window.print();
        window.onfocus=function(){ window.close();}
        // window.onfocus=function(){ window.location.replace("/transaksi/baru");}
    </script>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
                body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight
            );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight="+ ((height + 50) * 0.264583);
    </script>
</body>
</html>
