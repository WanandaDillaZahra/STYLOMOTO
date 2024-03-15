@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Transaksi</h4>
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div style="max-height: 500px; overflow-y: auto;">
                        @if (Auth::user()->role == 'kasir')
                            <a href="{{ route('transactions.create') }}" class="btn btn-inverse-success btn-icon btn-md">
                                <i class="ti-plus"></i>
                            </a>
                        @endif
                        {{-- @if (Auth::user()->role == 'kasir' || Auth::user()->role == 'admin')
                            <a href="{{ url('transactions/pdf') }}" class="btn btn-inverse-info btn-icon btn-md">
                                <i class="ti-printer"></i>
                            </a>
                        <br><br>
                        @endif --}}
                        
                        {{-- @if (Auth::user()->role == 'owner')
                        <a href="{{ route('laporan.index') }}" class="btn btn-inverse-primary btn-icon">
                            <i></i>
                            Laporan Transaksi
                        </a>
                        @endif --}}
                    

                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Nomor Unik</th>
                                    <th class="text-center">Nama Pelanggan</th>
                                    <th class="text-center">Layanan Servis - Harga</th>
                                    <th class="text-center">Uang Bayar</th>
                                    <th class="text-center">Uang Kembali</th>
                                    <th class="text-center">Tanggal</th>
                                    @if (Auth::user()->role == 'kasir' || Auth::user()->role == 'admin')
                                        <th class="text-center"> Aksi </th>
                                    @endif
                                </tr>
                            </thead>

                            @if (count($transactionsM) > 0)
                                <tbody>
                                    @foreach ($transactionsM as $data)
                                        <tr>
                                            <td >{{ $data->nomor_unik }}</td>
                                            <td >{{ $data->nama_pelanggan }}</td>
                                            <td >{{ $data->nama_produk }} - Rp {{ number_format($data->harga_produk, 0, ',', '.') }}</td>
                                            <td >Rp {{ number_format($data->uang_bayar, 0, ',', '.') }}</td>
                                            <td >Rp {{ number_format($data->uang_kembali, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $data->tg_tran }}</td>
                                            @if (Auth::user()->role !== 'owner')
                                            <td class="text-center">
                                                <div class="btn-group" role="group"> 
                                                    @if (Auth::user()->role == 'kasir')
                                                    <a href="{{ route('transactions.pdf2', ['id' => $data->id_trans]) }}" class="btn btn-inverse-primary btn-icon">
                                                        <i class="ti-printer"></i>
                                                    </a>
                                                    @endif

                                                    @if (Auth::user()->role == 'admin')
                                                        <form action="{{ route('transactions.delete', $data->id_trans) }}" method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <a href="{{ route('transactions.edit', $data->id_trans) }}" class="btn btn-inverse-warning btn-icon">
                                                                <i class="ti-pencil"></i>
                                                            </a>
                                                            <mr-1>
                                                            <button type="submit" class="btn btn-inverse-danger btn-icon" title="Hapus" onclick="return confirm('Konfirmasi Hapus Data??')">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                            </div>
                                            </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

