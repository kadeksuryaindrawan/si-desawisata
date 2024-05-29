<!DOCTYPE html>
<html>
<head>
    <title>Export Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .container {
            width: 90%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Semua Kabupaten</h1>
        <table>
            <thead>
                <tr>
                    <th>Kabupaten</th>
                    <th>Jumlah Desa Wisata</th>
                    <th>Jumlah Potensi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>*Semua Kabupaten*</strong></td>
                    <td>{{ $totalObjekWisata }}</td>
                    <td>
                        @foreach($jenisPotensis as $jenisPotensi)
                            {{ $jenisPotensi->nama_jenis_potensi }} ({{ $totalPotensiCounts[$jenisPotensi->id] ?? 0 }})<br>
                        @endforeach
                    </td>
                </tr>
                @foreach($datas as $kabupaten)
                    <tr>
                        <td>{{ $kabupaten->nama_kabupaten }}</td>
                        <td>{{ $kabupaten->objekWisata->count() }}</td>
                        <td>
                            @php
                                $jenisPotensiCounts = [];
                                foreach ($kabupaten->objekWisata as $objekWisata) {
                                    foreach ($objekWisata->potensi as $potensi) {
                                        if (!isset($jenisPotensiCounts[$potensi->jenis_potensi->id])) {
                                            $jenisPotensiCounts[$potensi->jenis_potensi->id] = 0;
                                        }
                                        $jenisPotensiCounts[$potensi->jenis_potensi->id]++;
                                    }
                                }
                            @endphp

                            @foreach($jenisPotensis as $jenisPotensi)
                                {{ $jenisPotensi->nama_jenis_potensi }} ({{ $jenisPotensiCounts[$jenisPotensi->id] ?? 0 }})<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
