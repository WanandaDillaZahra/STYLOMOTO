@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Data Transaksi</h4>
          <div class="">
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-striped">
              <a href="{{ route('transactions.index') }}" class="btn btn-inverse-success">Kembali</a>
              <br><br>
              <form action="{{route('transactions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label >Nomor Unik</label>
                  <input name="nomor_unik" type="number" class="form-control" placeholder="" value="{{ random_int(1000000000, 9999999999) }}" readonly>
                  @error('nomor_unik')
                  <p>{{$message}}</p>     
                  @enderror
                </div>
                <div class="form-group">
                    <label >Nama Pelanggan</label>
                    <input name="nama_pelanggan" type="text" class="form-control" placeholder="">
                    @error('nama_pelanggan')
                    <p>{{$message}}</p>     
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Layanan Servis + Harga</label>
                    <select name="id" id="service-search" class="typeahead form-control" placeholder="">
                      <option value="">- Pilih Produk -</option>
                      @foreach ($products as $data)
                          <option value="{{ $data->id }}">
                              {{ $data->nama_produk}} - {{ $data->harga_produk}}
                          </option>
                      @endforeach
                    </select>
                    @error('id')
                        <p>{{ $message }}</p>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label>Uang Bayar</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input name="uang_bayar" type="number" class="form-control" placeholder="">
                    </div>
                    @error('uang_bayar')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                
                <input type="submit" name="submit" class="btn btn-inverse-primary" value="Simpan" style="float: right; margin-right: 10px;"/>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection