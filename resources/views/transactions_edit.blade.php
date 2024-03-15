@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Data Produk</h4>
          <div class="">
            <table class="table table-striped">
              <a href="{{ route('transactions.index') }}" class="btn btn-inverse-success">Kembali</a>
              <br><br>
              <form action="{{ route('transactions.update', $transactionsM->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="form-group col-lg-6">
                      <label>Nomor Unik</label>
                      <input name="nomor_unik" type="number" class="form-control" placeholder="" value="{{ $transactionsM->nomor_unik }}" readonly>
                      @error('nomor_unik')
                      <p>{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group col-lg-6">
                      <label>Nama Pelanggan</label>
                      <input name="nama_pelanggan" type="text" class="form-control" placeholder="" value="{{ $transactionsM->nama_pelanggan }}">
                      @error('nama_pelanggan')
                      <p>{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  <div class ="form-group col-lg-6">
                      <label>Layanan Servis + Harga</label>
                      <select name="id_produk" type="text" class="form-control" placeholder="">
                          <option value="">- Pilih Produk -</option>
                          @foreach ($productsM as $productsM)
                          <?php
                          if ($productsM->id == $transactionsM->id_produk):
                              $selected = "selected";
                          else:
                              $selected = "";
                          endif;
                          ?>
                              <option {{ $selected }} value="{{ $productsM->id }}">
                                  {{ $productsM->nama_produk}} - {{ $productsM->harga_produk}}
                              </option>
                          @endforeach
                      </select>
                      @error('id_produk')
                      <p>{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group col-lg-6">
                      <label>Uang Bayar</label>
                      <input name="uang_bayar" type="number" class="form-control" placeholder="" value="{{ $transactionsM->uang_bayar }}">
                      @error('uang_bayar')
                      <p>{{ $message }}</p>
                      @enderror
                  </div>
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