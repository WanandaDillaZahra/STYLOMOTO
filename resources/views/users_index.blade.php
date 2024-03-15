@extends('admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pengguna</h4>
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('users.create') }}" class="btn btn-inverse-success btn-icon btn-md">
                                <i class="ti-plus"></i>
                            </a>
                            <mr-1>
                            {{-- <a href="{{ url('users/pdf') }}" class="btn btn-inverse-info btn-icon">
                                <i class="ti-printer"></i>
                            </a> --}}
                        @endif

                        <br><br>
                        <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        @if(count($user) > 0)
                            <tbody>
                                @foreach ($user as $users)
                                    <tr>
                                        <td >{{ $users->name }}</td>
                                        <td class="text-center">{{ $users->username }}</td>
                                        <td class="text-center">{{ $users->role }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <a href="{{ route('users.edit', $users->id) }}" class="btn btn-inverse-warning btn-icon">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                    <mr-1>
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon" title="Hapus" onclick="return confirm('Konfirmasi Hapus Data??')">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                    <a href="{{ route('users.changepassword', $users->id) }}" class="btn btn-inverse-primary btn-icon">
                                                        <i class="ti-lock"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
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
@endsection
