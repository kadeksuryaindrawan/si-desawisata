<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>
    <style>
        *{
            font-family:'Times New Roman', Times, serif
            margin: 0;
        }
        .container {
            margin: 0px auto;
            width: 100%;
        }
        .header {
            width: 100%;
            margin: 0rem;
        }
        .header img{
            width: 96%;
        }
        .content {
            width: 100%;
            margin: 5rem auto;
            text-align: center;
            font-size: 20px;
        }
        .content p {
            font-size: 14px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom: 1rem;
        }
        .content table, th, td {
            border: 1px black solid;
            border-collapse: collapse;
            padding: 0.5rem;
            font-size: 16px;
        }
        .content-mentor {
            margin-bottom: 1rem;
        }
        .content-contestant table {
            margin-top: 1rem;
        }
    </style>
  </head>
  <body>
        <!-- Start Page -->
    <div class="container">
        <!-- KOP report -->

        <center>        <hr>
            <h2>INVOICE HIDEMS
        </h2></center>
        <hr>
        <!-- Report Content -->
        <div class="content">
            <!-- Report Title Contestant Identity -->
            <div class="content-contestant">
                <!-- Table -->
                <table style="width: 100%;">
                <tr>
                    <th>KODE TRANSAKSI</th>
                    <th>NAMA PENGUNJUNG</th>
                    <th>NAMA WISATA</th>
                    <th>JUMLAH TIKET</th>
                    <th>TOTAL</th>
                    <th>STATUS</th>
                </tr>
                <tr>
                    <td>HIDEMS{{$item->id.$item->user_id.$item->objek_wisata_id}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->objekwisata->nama}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>Rp. {{ number_format($item->total,0,",",".") }}</td>
                    <td>{{$item->status}}</td>
                </tr>

            </table>
            </div>
        </div>

        <center>        <hr>
            <h2>TERIMAKASIH
        </h2></center>
        <hr>
    </div>

  </body>
</html>
