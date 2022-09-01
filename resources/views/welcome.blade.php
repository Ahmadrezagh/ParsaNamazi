<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>{{setting('name')}}</title>
    <link rel="stylesheet" href="{{url('custom.scss')}}">
    <link rel="stylesheet" href="{{url('app.css')}}">

    @toastr_css
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon"/>


    <!-- Include this in your blade layout -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
@include('sweetalert::alert')
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #d9d9d9;z-index: 1;background-color: white !important;">

    <div class="container-fluid" >
        <a class="navbar-brand d-lg-none d-md-none d-xl-none d-sm-block" href="{{url('/')}}">
            <img src="{{url(setting('logo'))}}" alt="" style="max-width: 50px;max-height: 50px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            <div class="col-sm-12 col-lg-2">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="color: #6B0087" data-bs-toggle="modal" data-bs-target="#contact-us">Contact us</a>
                </li>
            </ul>
            </div>
            <div class="col-xl-8 col-lg-7 text-center d-none d-md-block d-lg-block">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{url('/logo/gradient&w.png')}}" alt="" style="max-width: 50px;max-height: 50px">
                </a>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-12 text-end">
                <button class="btn btn-outline-primary " type="button" data-bs-toggle="modal" data-bs-target="#login">Log in</button>
                <button class="btn btn-outline-primary mx-lg-2 " type="button"  data-bs-toggle="modal" data-bs-target="#register">Sign up</button>
            </div>
        </div>
    </div>
</nav>
<div>

    <img src="{{url('img/backgroupn.jpg')}}" alt="" style="
opacity: 1;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;
  z-index: -2;
">

</div>
<div class="text-center justify-content-center mt-5"  >
    <h1 class="welcome-Title" >Welcome</h1>
    <h5 class="welcome-description">to the greatest crypto pump community</h5>
    <a href="{{ url('/where') }}" class="btn btn-primary btn-redirect-where" >Where To Start</a>
</div>



<!-- Login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST"  action="{{ route('login') }}">
            <div class="modal-body">
                    @csrf
                    <div class="form-group text-left">
                        <label>Email</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your email" type="text" name="email">
                    </div>
                    <div class="form-group text-left mt-3">
                        <label>Password</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your password" type="password" name="password">
                    </div>
                    <div class="mt-3">
                        Forgot password?<a href="#" class="p-2" type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#reset-pass"> reset your password</a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Login</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Sign up -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('register') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group text-left">
                        <label>Name</label>
                        <input class="form-control" placeholder="Enter your Name" name="name" type="text">
                    </div>
                    <div class="form-group mt-3 text-left" style="display: none">
                        <input class="form-control" value="{{request('key')}}" name="referral_code" type="text">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Email</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your email" name="email" type="text">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Password</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your password" name="password" type="password">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Password Confirmation</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your password" name="password_confirmation" type="password">
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" name="agreement" type="checkbox" value="1" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            I agree <a href="#" style="color: #6B0087;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#terms">terms</a>
                        </label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Sign up</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Reset Password -->
<div class="modal fade" id="reset-pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form method="POST" action="{{ route('password.email') }}">
                <div class="modal-body">
                    @csrf
                    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                    <div class="form-group mt-3 text-left">
                        <label>Email</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your email" name="email" type="text">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Request new password</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Terms -->
<div class="modal fade"  id="terms" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Disclaimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#register" aria-label="Close"></button>
            </div>

            <div style="padding: 10px">
                {!! setting('terms') !!}
            </div>

        </div>
    </div>
</div>

<!-- Contact us -->
<div class="modal fade" id="contact-us" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('contact_us.store') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group text-left">
                        <label>Name</label>
                        <input class="form-control" placeholder="Enter your name" name="name" type="text">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Email</label>
                        <input autocomplete="off" class="form-control" placeholder="Enter your email" name="email" type="text">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Message</label>
                        <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row mt-3">
                        <label>Contacts</label>
                        <div class="col-6">
                            <a href="https://t.me/whpsupport" target="_blank" class="btn btn-telegram" style="width: 100%;">
                                <i class="fab fa-telegram-plane"></i>
                                Telegram
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="mailto:support@whalepumpers.com" class="btn btn-email" style="width: 100%">
                                <i class="fa-solid fa-envelope"></i>
                                E-mail
                            </a>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Send Message</button>
            </div>
            </form>
        </div>
    </div>
</div>






<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@jquery
@toastr_js
@toastr_render
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

@foreach ($errors->all() as $error)
    <script>
        toastr.error('{{$error}}')
    </script>
@endforeach

@if (session('status'))
    <script>
        toastr.info('{{session('status')}}')
    </script>
@endif

</body>
</html>