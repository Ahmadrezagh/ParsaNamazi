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
    <link rel="stylesheet" href="{{url('plugins/fontawesome/css/all.min.css')}}" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url('plugins/videoPlayer/css/rtop.videoPlayer.1.0.2.min.css')}}" />
    <!-- Favicon -->
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon"/>
</head>
<body>

<div>
    <div class="background-where-to-start">
        <img src="{{url('/img/background_where.png')}}" alt="">
    </div>
    <div class="steps-boxes">
        <div class="step-box">
            <div class="step-child-box step-one">
                <div class="step-logo">
                    <img src="{{url('/logo/currency.png')}}" alt="">
                </div>
                <h5 class="step-title">Exchange Sign up</h5>
                <button class="step-button" data-bs-toggle="modal" data-bs-target="#learnMore" > 
                    learn more 
                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span> 
                </button>
            </div>
        </div>
        <div class="step-box">
            <div class="step-child-box step-two">
                <div class="step-logo">
                    <img src="{{url('/logo/valid.png')}}" alt="">
                </div>
                <h5 class="step-title">Exchange Sign up</h5>
                <button class="step-button" data-bs-toggle="modal" data-bs-target="#learnMore" > 
                    learn more 
                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span> 
                </button>
            </div>
        </div>
        <div class="step-box">
            <div class="step-child-box step-three">
                <div class="step-logo">
                    <img src="{{url('/logo/group.png')}}" alt="">
                </div>
                <h5 class="step-title">Exchange Sign up</h5>
                <button class="step-button"  data-bs-toggle="modal" data-bs-target="#learnMore" > 
                    learn more 
                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span> 
                </button>
            </div>
        </div>
        <div class="step-box">
            <div class="step-child-box step-four">
                <div class="step-logo">
                    <img src="{{url('/logo/notification.png')}}" alt="">
                </div>
                <h5 class="step-title">Exchange Sign up</h5>
                <button class="step-button"  data-bs-toggle="modal" data-bs-target="#learnMore" > 
                    learn more 
                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span> 
                </button>
            </div>
        </div>
        <div class="step-box">
            <div class="step-child-box step-five">

                <div class="step-logo">
                    <img src="{{url('/logo/money-bag.png')}}" alt="">
                </div>
                <h5 class="step-title">Exchange Sign up</h5>
                <button class="step-button" data-bs-toggle="modal" data-bs-target="#learnMore" > 
                    learn more 
                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span> 
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="learnMore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="example">
                <video src="{{url('/video/test.mp4')}}" type="video/mp4" poster="sample.jpg" playsinline>
                    <source src="{{url('/video/test.mp4')}}" type="video/mp4">
                </video>    
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
  </div>
</div>




<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{url('plugins/fontawesome/js/all.min.js')}}"></script>

@jquery
@toastr_js
@toastr_render

<script type="text/javascript" src="{{url('plugins/videoPlayer/js/rtop.videoPlayer.1.0.2.min.js')}}"></script>

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

<script>
    var myPlayer = $('#example').RTOP_VideoPlayer({
        showControls: true,
        showControlsOnHover: true,
        controlsHoverSensitivity: 3000,
        showScrubber: true,
        showTimer: false,
        showPlayPauseBtn: true,
        showSoundControl: true,
        showFullScreen: true,
        keyboardControls: true,
    });
</script>

</body>
</html>