@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Layanan Servis</h4>
                <div>  
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                    @endif
                    
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('products.create') }}" class="btn btn-inverse-success btn-icon">
                                <i class="ti-plus"></i>
                            </a>
                        @endif
                            <mr-1>
                        @if (Auth::user()->role == 'owner')
                            <a href="{{ url('products/pdf') }}" class="btn btn-inverse-info btn-icon">
                                <i class="ti-printer"></i>
                            </a>
                        @endif

                        <br><br>
                        <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center"> Layanan Servis </th>
                                <th class="text-center"> Harga  </th>
                                <th class="text-center"> Tanggal </th>
                                @if (Auth::user()->role == 'admin')
                                    <th class="text-center"> Aksi </th>
                                @endif
                            </tr>
                        </thead>
                            <tbody>
                                @if (count($products) > 0)
                                @foreach ($products as $products)
                                    <tr>
                                        <td >{{ $products->nama_produk }}</td>
                                     
                                        <td >Rp {{ number_format($products->harga_produk, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $products->created_at }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('products.destroy', $products->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="{{ route('products.edit', $products->id) }}"
                                                            class="btn btn-inverse-warning btn-icon">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        <mr-1>
                                                            <button type="submit"
                                                                class="btn btn-inverse-danger btn-icon" title="Hapus"
                                                                onclick="return confirm('Konfirmasi Hapus Data??')">
                                                                <i class="ti-trash"></i>
                                                            </button>

                                                    </form>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
