<!DOCTYPE html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servis Motor | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('template/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('template/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('template/images/favicon.png')}}">
  </head>
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
  
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                {{-- <h2><span class="stylo">Mechanic</span><span class="moto">Services</span></h2> --}}
                <h4>Hello! let's get started</h4>
                <h6 class="fw-light">Sign in to continue.</h6>
                <form class="pt-3" action="{{ route('login.action') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="username" value="{{ old('username') }}" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                    </div>
                    <div class="form-check">
                      <label class="form-check-label" for="show-password-checkbox">
                        <input type="checkbox" class="form-check-input" id="show-password-checkbox">
                        Show Password
                        <i class="input-helper"></i>
                      </label>
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    </div>                  
                  </form>
                  
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('template/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{url('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('template/js/off-canvas.js')}}"></script>
    <script src="{{url('template/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('template/js/template.js')}}"></script>
    <script src="{{url('template/js/settings.js')}}"></script>
    <script src="{{url('template/js/todolist.js')}}"></script>
    <!-- endinject -->
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('show-password-checkbox');
      
        showPasswordCheckbox.addEventListener('change', function() {
          if (showPasswordCheckbox.checked) {
            passwordInput.type = 'text';
          } else {
            passwordInput.type = 'password';
          }
        });
      </script>
      
  
  
  </body></html>