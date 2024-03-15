<!DOCTYPE html>
<html>
<head>
    <title>Invoice Transaksi #{{ $transactionsM->id_trans }}</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 0;
            width: 300px; /* adjusted width to match original receipt */
        }
        .container {
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #000; /* added border to match original receipt */
            border-radius: 5px; /* added border-radius for better appearance */
        }
        .header {
            text-align: center;
            border-bottom: 1px dashed #000; /* added dashed bottom border */
            padding-bottom: 5px; /* adjusted padding for spacing */
        }
        .content {
            margin-top: 10px; /* adjusted top margin for spacing */
            font-size: 12px; /* adjusted font size for better fit */
        }
        .footer {
            margin-top: 10px; /* adjusted top margin for spacing */
            text-align: center;
            font-size: 10px; /* adjusted font size for better fit */
            padding-top: 5px; /* adjusted padding for spacing */
        }
        .divider {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3 style="font-size: 18px;">STYLOMOTO</h3>
            <p style="font-size: 10px; margin: 0;">JL. ARIEF RAHMAN HAKIM NO.28, KEL.CIGADUNG KEC.SUBANG KAB.SUBANG, 41213</p>
        </div>
        <div class="content">
            <p style="font-size: 10px; margin-bottom: 3px;">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;: {{ date('m/d/Y H:i:s') }}</p>
            <p style="font-size: 10px; margin-bottom: 3px;">Pelanggan&nbsp;&nbsp;: {{ $transactionsM->nama_pelanggan }}</p>
            <p style="font-size: 10px; margin-bottom: 3px;">No. Faktur&nbsp;: {{ $transactionsM->nomor_unik  }}</p>
            <p style="font-size: 10px; margin-bottom: 3px;">Kasir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ Auth::user() ? Auth::user()->name : 'Guest' }}</p>
            <div class="divider"></div>

            {{-- <p style="font-size: 10px; margin-bottom: 3px;">Nama Produk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Harga </p> --}}
            @if($transactionsM->nama_produk)
                @php
                    $products = explode(',', $transactionsM->nama_produk);
                @endphp
            
                @foreach ($products as $product)
                    <p style="font-size: 10px; margin-bottom: 3px;">{{ $product }} - Rp. {{ number_format($transactionsM->harga_produk) }}</p>
                @endforeach
            @else
                <p style="font-size: 10px; margin-bottom: 3px;">No items available for this transaction.</p>
            @endif
            
            <div class="divider"></div>

            <p style="font-size: 10px; margin-bottom: 3px;">Total Harga&nbsp;&nbsp;: Rp.{{ number_format($transactionsM->harga_produk) }}</p>
            <p style="font-size: 10px; margin-bottom: 3px;">Uang Bayar&nbsp;&nbsp;&nbsp;: Rp.{{ number_format($transactionsM->uang_bayar) }}</p>
            <p style="font-size: 10px; margin-bottom: 3px;">Uang Kembali&nbsp;: Rp.{{ number_format($transactionsM->uang_kembali) }}</p>
        </div>
        <div class="footer">
            <div class="divider"></div>
            <p style="font-size: 10px; margin-bottom: 3px;">Terima Kasih</p>
            <p style="font-size: 10px; margin-bottom: 3px;">Silahkan Berkunjung Kembali!!</p>
        </div>
    </div>
</body>
</html>
