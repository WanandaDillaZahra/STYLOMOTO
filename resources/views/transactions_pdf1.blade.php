<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Transaksi</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        h3, h4 {
            text-align: center;
            background-color: #1f3bb3;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #1f3bb3;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .additional-info {
            text-align: center;
            font-size: 14px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 80px; /* Set the desired height */
        }

        .divider {
            border: none;
            height: 2px; /* Set the desired thickness */
            width: 50%; /* Set the desired width */
            background-color: #000; /* Set the desired color */
            margin: 10px 0; /* Adjust the margin as needed */
        }

        .signature {
            text-align: center;
            margin-top: 20px; /* Adjust the top margin as needed */
        }

        .total {
            margin-top: 20px;
            text-align: left;
            padding: 10px;
            font-size: 18px;
            background-color: #1f3bb3;
            color: #fff;
        }
    </style>
</head>
<body>
    <h3>LAPORAN KEUANGAN - STYLOMOTO</h3>
    <h4>Dari Tanggal: {{ $startDate }} - {{ $endDate }}</h4>
    <table id="myTable">
        <thead>
            <tr>
                <th class="text-center">Nomor Unik</th>
                <th>Nama Pelanggan</th>
                <th class="text-center">Layanan Servis - Harga</th>
                <th class="text-center">Uang Bayar</th>
                <th class="text-center">Uang Kembali</th>
                <th class="text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHarga = 0;
            @endphp
            @foreach ($transactionsM as $data)
            <tr>
                <td>{{ $data->nomor_unik }}</td>
                <td>{{ $data->nama_pelanggan }}</td>
                <td>{{ $data->nama_produk }} - Rp {{ number_format($data->harga_produk, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($data->uang_bayar, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($data->uang_kembali, 0, ',', '.') }}</td>
                <td>{{ $data->created_at }}</td>
            </tr>
            @php
                $totalHarga += $data->harga_produk;
            @endphp
            @endforeach
        </tbody>
    </table>
    <p class="total">Total Harga : Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>

    <!-- Additional Information -->
    <div class="additional-info" >
        <p  style="margin-top: 5px;">STYLOMOTO</p>
    </div>

    <!-- Signature -->
    <div class="signature">
        <p style="margin-bottom: 5px" ><u>{{ Auth::user() ? Auth::user()->name : 'Guest' }}</u></p>
        <p  style="margin-top: 5px;">CEO STYLOMOTO</p>
    
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
