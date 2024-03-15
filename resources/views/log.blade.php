@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Aktivitas</h4>
                <div>
                    <form action="{{ route('log.filter') }}" method="GET" class="row" id="logForm">
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
                                <a href="{{ route('log.index') }}" class="btn btn-primary">
                                    <i class="mdi mdi-cached"></i>
                                  </a>      
                              </div>
                        </div>
                    </form>
                    {{-- <div class="d-flex justify-content-between align-items-center col-md-4">
                        <!-- ... (additional content if needed) ... -->
                    </div> --}}

                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Aktivitas</th>
                                <th class="text-center">Tanggal & Waktu</th>
                            </tr>
                        </thead>

                        @if(count($logM) > 0)
                            <tbody>
                                @foreach($logM as $log)
                                    <tr>
                                        <td class="text-center">{{ $log->name }}</td>
                                        <td class="text-center">{{ $log->role }}</td>
                                        <td class="text-center">{{ $log->activity }}</td>
                                        <td class="text-center">{{ $log->created_at }}</td>
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
<script>
    function searchData() {
        document.getElementById('logForm').submit();
    }
</script>
@endsection
