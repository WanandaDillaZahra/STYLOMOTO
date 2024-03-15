@extends('admin')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="home-tab">
            <h4 class="page-title mb-0">Dashboard</h4>
            <br>
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            </div>            
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-inverse-primary">
                        <div class="card-body">
                            <h5 class="card-title text-white">Servicing</h5>
                            <h3 class="card-text text-white">{{ $totalProducts }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-inverse-success">
                        <div class="card-body">
                            <h5 class="card-title text-white">Transactions</h5>
                            <h3 class="card-text text-white">{{ $totalTransactions }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-inverse-warning">
                        <div class="card-body">
                            <h5 class="card-title text-white">Income</h5>
                            <h3 class="card-text text-white">Rp {{ number_format($income, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-inverse-dark">
                        <div class="card-body">
                            <h5 class="card-title text-white">Members</h5>
                            <h3 class="card-text text-white">{{ $totalMembers }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="carousel-item active">
                        <img src="template/images/faces/1.png" alt="First slide" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="carousel-item active">
                        <img src="template/images/faces/2.png" alt="Second slide" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
