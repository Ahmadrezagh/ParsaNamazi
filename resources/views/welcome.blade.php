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

    <style>
        .btn-outline-primary {
            color: #6B0087;
            border-color: #6B0087;
        }
        .btn-outline-primary:hover {
            background-color: #6B0087;
            border-color: #6B0087;
        }
        .btn-primary {
            background-color: #6B0087;
            border-color: #6B0087;
        }
        .btn-primary:hover {
            background-color: #6B0087;
            border-color: #6B0087;
        }
        .btn-telegram {
            background-color: white;
            border-color: #0088cc;
            color: #0088cc;
        }
        .btn-telegram:hover {
            background-color: #0088cc;
            border-color: #0088cc;
            color: white;
        }
        .btn-email {
            background-color: white;
            border-color: #BB001B;
            color: #BB001B;
        }
        .btn-email:hover {
            background-color: #BB001B;
            border-color: #BB001B;
            color: white;
        }
        .modal-content {
            border-radius: 20px;
        }

        @font-face {
            font-family: sfpro-bold;
            src: url({{url('fonts/SFPro-BlackItalic.ttf')}});
        }
        @font-face {
            font-family: sfpro;
            src: url({{url('fonts/SFPro-LightItalic.ttf')}});
        }

    </style>
    @toastr_css
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #d9d9d9;z-index: 1">
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
                    <img src="{{url(setting('logo'))}}" alt="" style="max-width: 50px;max-height: 50px">
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
<div class="text-center justify-content-center mt-5" style="padding-top: 5%;" >
    <h1 style="z-index: 1;font-size: xxx-large;color: #303030;font-family: sfpro-bold" >Welcome</h1>
    <h5 style=";font-family: sfpro">to the greatest crypto pump community</h5>
</div>



<!-- Login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('login') }}">
            <div class="modal-body">
                    @csrf
                    <div class="form-group text-left">
                        <label>Email</label>
                        <input class="form-control" placeholder="Enter your email" type="text" name="email">
                    </div>
                    <div class="form-group text-left mt-3">
                        <label>Password</label>
                        <input class="form-control" placeholder="Enter your password" type="password" name="password">
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
                        <input class="form-control" placeholder="Enter your email" name="email" type="text">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Password</label>
                        <input class="form-control" placeholder="Enter your password" name="password" type="password">
                    </div>
                    <div class="form-group mt-3 text-left">
                        <label>Password Confirmation</label>
                        <input class="form-control" placeholder="Enter your password" name="password_confirmation" type="password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Sign up</button>
            </div>
            </form>
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
                        <input class="form-control" placeholder="Enter your email" name="email" type="text">
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
</body>
</html>