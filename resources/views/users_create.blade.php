@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Data Pengguna</h4>
          <div class="">
            <table class="table table-striped">
              <a href="{{ route('users.index') }}" class="btn btn-inverse-success">Kembali</a>
              <br><br>
              <form action="{{route('users.store')}}" method="POST">
                @csrf
                  <div class="form-group">
                      <label >Username</label>
                      <input name="username" type="text" class="form-control" placeholder="">
                      @error('username')
                      <p>{{$message}}</p>     
                      @enderror
                  </div>
                  <div class="form-group">
                      <label >Nama</label>
                      <input name="name" type="text" class="form-control" placeholder="">
                      @error('name')
                      <p>{{$message}}</p>     
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            - Pilih Role -
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" data-value="admin">admin</a>
                            <a class="dropdown-item" href="#" data-value="kasir">kasir</a>
                            <a class="dropdown-item" href="#" data-value="owner">owner</a>
                            <!-- Tambahkan lebih banyak opsi jika diperlukan -->
                        </div>
                    </div>
                    <input type="hidden" name="role" id="selectedRole" value="">
                    @error('role')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                
                <script>
                    // Fungsi untuk menangani klik pada opsi dropdown
                    $('.dropdown-item').click(function(){
                        var selectedRole = $(this).attr('data-value'); // Mendapatkan nilai opsi yang dipilih
                        $('#selectedRole').val(selectedRole); // Memperbarui nilai input hidden
                        $('#dropdownMenuButton').text(selectedRole); // Memperbarui teks tombol dropdown dengan nilai opsi yang dipilih
                    });
                </script>
                
                  <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="">
                        @error('password')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                
                    <div class="form-group col-lg-6">
                        <label>Ulangi Password</label>
                        <input name="password_confirm" type="password" class="form-control" placeholder="">
                        @error('password_confirm')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                  </div>         
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

