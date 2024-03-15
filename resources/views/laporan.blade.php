@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Transaksi</h4>
                <div>
                    <form action="{{ route('laporan.filter') }}" method="GET" class="row" id="laporanForm">
                        <div class="form-group col-md-5">
                            <label for="startDate">Tanggal Awal:</label>
                            <input type="date" name="startDate" id="startDate" class="form-control" value="{{ request('startDate') }}">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="endDate">Sampai</label>
                            <input type="date" name="endDate" id="endDate" class="form-control" value="{{ request('endDate') }}">
                        </div>
                        <div class="form-group col-md-2">
                            <br>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary" onclick="searchData()">
                                  <i class="mdi mdi-magnify"></i>
                                </button>
                                <a href="{{ route('laporan.index') }}" class="btn btn-primary">
                                    <i class="mdi mdi-cached"></i>
                                  </a>      
                              </div>
                        </div>
                        <div>
                            @if(request()->has('startDate') && request()->has('endDate'))
                                <a href="{{ route('laporan.export', ['startDate' => request('startDate'), 'endDate' => request('endDate')]) }}" class="btn btn-inverse-primary btn-icon">
                                    <i class="mdi mdi-file-pdf"></i> Cetak PDF
                                </a>
                            @endif
                        </div>
                    </form>
                    <div class="d-flex justify-content-between align-items-center col-md-4">
                        <!-- ... (additional content if needed) ... -->
                    </div>
                    <br>
                                            @if (Auth::user()->role == 'owner')
                            <a href="{{ url('transactions/pdf') }}" class="btn btn-inverse-info btn-icon btn-md">
                                <i class="ti-printer"></i>
                            </a>
                        <br><br>
                        @endif
    
                    @if (count($transactionsM) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nomor Unik</th>
                                        <th class="text-center">Nama Pelanggan</th>
                                        <th class="text-center">Layanan Servis - Harga</th>
                                        <th class="text-center">Uang Bayar</th>
                                        <th class="text-center">Uang Kembali</th>
                                        <th class="text-center">Tanggal</th>
                                    </tr>
                                </thead>
                                @if (count($transactionsM) > 0)
                                    <tbody>
                                        @php
                                            $totalHarga = 0;
                                        @endphp
                                        @foreach ($transactionsM as $data)
                                            <tr>
                                                <td>{{ $data->nomor_unik }}</td>
                                                <td>{{ $data->nama_pelanggan }}</td>
                                                <td >
                                                    {{ $data->nama_produk }} - Rp {{ number_format($data->harga_produk, 0, ',', '.') }}
                                                </td>
                                                <td >Rp {{ number_format($data->uang_bayar, 0, ',', '.') }}</td>
                                                <td >Rp {{ number_format($data->uang_kembali, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ $data->created_at }}</td>
                                            </tr>
                                            @php
                                                $totalHarga += $data->harga_produk;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-center"><strong>Total Harga :</strong></td>
                                            <td colspan="3" class="text-center"><strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    @else
                        <p class="mt-3">Tidak ada data transaksi.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function searchData() {
        document.getElementById('laporanForm').submit();
    }
</script>

@endsection
