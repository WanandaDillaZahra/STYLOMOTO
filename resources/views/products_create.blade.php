@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Data</h4>
          <div class="">
            <table class="table table-striped">
              <a href="{{ route('products.index') }}" class="btn btn-inverse-success">Kembali</a>
              <br><br>
              <form action="{{route('products.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label >Layanan Servis</label>
                  <input name="nama_produk" type="text" class="form-control" placeholder="">
                  @error('nama_produk')
                  <p>{{$message}}</p>     
                  @enderror
                </div>
                {{-- <div class="form-group">
                    <label >Stok</label>
                    <input name="stok" type="number" class="form-control" placeholder="">
                    @error('stok')
                    <p>{{$message}}</p>     
                    @enderror
                  </div> --}}
                <div class="form-group">
                    <label >Harga </label>
                    <input name="harga_produk" type="number" class="form-control" placeholder="" >
                    @error('harga_produk')
                    <p>{{$message}}</p>     
                    @enderror
                    <br>
                    <input type="submit" name="submit" class="btn btn-inverse-primary" value="Simpan" style="float: right; margin-right: 10px;"/>
                    
                </div>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection