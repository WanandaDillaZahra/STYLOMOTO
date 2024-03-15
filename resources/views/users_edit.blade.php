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
              <form action="{{route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="form-group col-lg-6">
                      <label >Username</label>
                      <input name="username" type="text" class="form-control" placeholder="" value="{{$user->username}}"readonly>
                      @error('username')
                      <p>{{$message}}</p>     
                      @enderror
                  </div>
                  <div class="form-group col-lg-6">
                    <label >Nama</label>
                    <input name="name" type="text" class="form-control" placeholder="", value="{{$user->name}}">
                    @error('name')
                    <p>{{$message}}</p>     
                    @enderror
                  </div>
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
                      <input type="hidden" name="role" id="selectedRole" value="{{ $user->role }}">
                      @error('role')
                      <p>{{$message}}</p>
                      @enderror
                  </div>
                  
                  <script>
                      // Update dropdown text based on hidden input value
                      var selectedRole = $('#selectedRole').val();
                      if(selectedRole !== '') {
                          $('#dropdownMenuButton').text(selectedRole);
                      }
                  
                      // Fungsi untuk menangani klik pada opsi dropdown
                      $('.dropdown-item').click(function(){
                          var selectedRole = $(this).attr('data-value'); // Mendapatkan nilai opsi yang dipilih
                          $('#selectedRole').val(selectedRole); // Memperbarui nilai input hidden
                          $('#dropdownMenuButton').text(selectedRole); // Memperbarui teks tombol dropdown dengan nilai opsi yang dipilih
                          $('#existingRoleSelect').val(selectedRole); // Synchronize with existing select
                      });
                  </script>
                                    
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