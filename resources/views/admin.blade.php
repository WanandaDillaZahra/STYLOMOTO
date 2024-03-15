<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servis Motor | {{ $title }}  </title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{url('template/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/typicons/typicons.css')}}">  
    <link rel="stylesheet" href="{{url('template/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{url('template/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css')}}">
    {{-- <link rel="stylesheet" href="{{url('https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css')}}"> --}}
    <link rel="stylesheet" href="{{url('template/css/vertical-layout-light/style.css')}}">
    {{-- <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css')}}"> --}}
      <!-- inject:css -->
  <link rel="stylesheet" href="{{url('template/css/vertical-layout-light/style.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('template/images/favicon.png')}}" />

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap Selectpicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <!-- Custom Styles -->
    <style>
        .stylo {
            color: black;
            font-weight: bold;
        }

        .moto {
            color: #1f3bb3;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-scroller"> 
        <!-- Navbar -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <!-- Navbar Brand -->
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
              <div class="me-3">
                  <!-- Adjust width and height to resize the GIF -->
                  <img src="{{url('template/images/faces/lg.png')}}" alt="Your GIF" style="pointer-events: none; width: 180px; height: 100px;">
              </div>
              {{-- <div>
                  <h2 style="font-size: 1.5rem;"><span class="stylo">Stylo</span><span class="moto">Moto</span></h2>
              </div>               --}}
          </div>          
          
            <!-- Navbar Menu -->
            
            <div class="navbar-menu-wrapper d-flex align-items-top"> 
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        @if(Auth::check())
                            <h1 class="welcome-text"><span class="text-black fw-bold">Hi, {{ Auth::user()->name }}!</span></h1>
                            <h3 class="welcome-sub-text">-> {{ Auth::user()->role}} </h3>
                        @endif
                    </li>
                </ul>
                {{-- @if (Auth::user()->role == 'admin') --}}
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="{{url('template/images/faces/profile-user.png')}}" alt="Profile image"> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" style="margin-top: 10px;">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="{{url('template/images/faces/profile-user.png')}}" alt="Profile image" style="width: 50px; height: 50px;">
                                    <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                    <p class="fw-light text-muted mb-0">{{ Auth::user()->role }}</p>
                                </div>              
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="dropdown-item-icon mdi mdi-power text-danger me-2"></i>Log Out
                                </a>              
                            </div>
                        </li>
                    </ul>
                {{-- @endif --}}

                {{-- @if (Auth::user()->role == 'kasir')
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="{{url('template/images/faces/face1.jpg')}}" alt="Profile image"> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" style="margin-top: 10px;">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="{{url('template/images/faces/face1.jpg')}}" alt="Profile image">
                                    <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                    <p class="fw-light text-muted mb-0">{{ Auth::user()->role }}</p>
                                </div>                                 
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="dropdown-item-icon mdi mdi-power text-danger me-2"></i>Log Out
                                </a>              
                            </div>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role == 'owner')
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="{{url('template/images/faces/face7.jpg')}}" alt="Profile image"> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" style="margin-top: 10px;">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="{{url('template/images/faces/face7.jpg')}}" alt="Profile image">
                                    <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                    <p class="fw-light text-muted mb-0">{{ Auth::user()->role }}</p>
                                </div>                                 
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="dropdown-item-icon mdi mdi-power text-danger me-2"></i>Log Out
                                </a>              
                            </div>
                        </li>
                    </ul>
                @endif --}}

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Sidebar -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{('dashboard')}}">
                            <i class="mdi mdi-home-variant menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    @if (Auth::user()->role == 'kasir' || (Auth::user()->role == 'admin'))
                    <li class="nav-item nav-category">DATA</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.index')}}">
                                <i class="menu-icon mdi mdi-card-text-outline"></i>
                                <span class="menu-title">Data Layanan Servis</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'kasir' ||(Auth::user()->role == 'admin'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('transactions.index')}}">
                                <i class="menu-icon mdi mdi-cart"></i>
                                <span class="menu-title">Data Transaksi</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'owner')
                    <li class="nav-item nav-category">LAPORAN</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                          <i class="menu-icon mdi mdi-book-plus"></i>
                          <span class="menu-title">Laporan</span>
                          <i class="menu-arrow"></i> 
                        </a>
                        <div class="collapse" id="ui-basic">
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('products.index')}}">Laporan Layanan Servis</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('laporan.index') }}">Laporan Transaksi</a></li>
                          </ul>
                        </div>
                      </li>
                    @endif

                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{('users')}}">
                                <i class="menu-icon mdi mdi-account-multiple-plus"></i>
                                <span class="menu-title">Data Pengguna</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'owner')
                        <li class="nav-item nav-category">AKTIVITAS</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{('log')}}">
                                <i class="mdi mdi-av-timer menu-icon"></i>
                                <span class="menu-title">Log</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- End Sidebar -->

            <!-- Main Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>
    <!-- JS -->
    <script src="{{url('template/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{url('template/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('template/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{url('template/js/off-canvas.js')}}"></script>
    <script src="{{url('template/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('template/js/template.js')}}"></script>
    <script src="{{url('template/js/settings.js')}}"></script>
    <script src="{{url('template/js/todolist.js')}}"></script>
    <script src="{{url('template/js/dashboard.js')}}"></script>
    <script src="{{url('template/js/typeahead.js')}}"></script>
    <script src="{{url('template/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <script src="{{url('template/vendors/select2/select2.min.js')}}"></script>
    <script src="{{url('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        let table = new DataTable('#myTable');
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Check if DataTable is already initialized
            if ($.fn.DataTable.isDataTable('#myTable')) {
                // If yes, destroy the existing instance
                $('#myTable').DataTable().destroy();
            }

            // Initialize DataTable
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script> --}}

</body>

</html>
