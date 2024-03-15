@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Layanan Servis</h4>
          <div class="">
            <table class="table table-striped">
              <a href="{{ route('products.index') }}" class="btn btn-inverse-success">Kembali</a>
              <br><br>
              <form action="{{route('products.update', $products->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label >Layanan Servis</label>
                  <input name="nama_produk" type="text" class="form-control" placeholder="" value="{{ $products->nama_produk }}">
                  @error('nama_produk')
                  <p>{{$message}}</p>     
                  @enderror
                </div>
                {{-- <div class="form-group">
                    <label >Stok</label>
                    <input name="stok" type="number" class="form-control" placeholder="" value="{{ $products->stok }}">
                    @error('stok')
                    <p>{{$message}}</p>     
                    @enderror
                  </div> --}}
                <div class="form-group">
                    <label >Harga </label>
                    <input name="harga_produk" type="number" class="form-control" placeholder="" value="{{ $products->harga_produk }}">
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