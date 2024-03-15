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

        td.date-column {
        text-align: center;
        }

        th {
            background-color: #1f3bb3;
            color: #fff;
            text-align: center;
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
    <h3>DATA LAYANAN SERVIS - STYLOMOTO</h3>
    <table id="myTable">
        <thead>
            <tr>
                <th class="text-center">Layanan Servis</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHarga = 0;
            @endphp
        @foreach($products as $product)
        <tr>
            <td>{{ $product->nama_produk }}</td>
            <td class="text-center">Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</td>
            <td class="date-column">{{ $product->updated_at }}</td>
        </tr>
            @php
                $totalHarga += $product->harga_produk;
            @endphp
            @endforeach
        </tbody>
    </table>
    <p class="total">Total Harga : Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>

    {{-- <!-- Additional Information -->
    <div class="additional-info" >
        <p>DISETUJUI OLEH CEO STYLOMOTO</p>
        
    </div>

    <!-- Signature -->
    <div class="signature">
        <p>________________________</p>
        <p>{{ Auth::user() ? Auth::user()->name : 'Guest' }}</p>
    
    </div> --}}

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
