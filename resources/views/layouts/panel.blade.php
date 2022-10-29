<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

    <!-- Favicon -->
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon"/>

    <!-- Title -->
    <title>{{setting('name')}} @if (trim($__env->yieldContent('title'))) | @yield('title')@endif</title>

    <!-- Bootstrap css-->
    <link href="{{url('panel/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="{{url('panel/assets/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
{{--    <link href="{{url('panel/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{url('panel/assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>

    <!-- Style css-->
    <link href="{{url('panel/assets/css/style/style.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/css/skins.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/css/dark-style.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/css/colors/default.css')}}" rel="stylesheet">
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('panel/assets/css/colors/color.css')}}">

    <!-- Select2 css-->
    <link href="{{url('panel/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{url('panel/assets/plugins/multipleselect/multiple-select.css')}}">

    <!-- Sidemenu css-->
    <link href="{{url('panel/assets/css/sidemenu/sidemenu.css')}}" rel="stylesheet">

    <!-- Switcher css-->
    <link href="{{url('panel/assets/switcher/css/switcher.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/switcher/demo.css')}}" rel="stylesheet">
    <!-- CkEditor -->
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <!-- Include this in your blade layout -->
{{--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Toastr css -->
    @toastr_css


<link rel="stylesheet" href="{{url('css/countdown-timer.css')}}">
</head>

<body class="main-body leftmenu">
@include('sweetalert::alert')
<!-- Loader -->
<div id="global-loader">
    <img src="{{url('panel/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

    <!-- Sidemenu -->
    <div class="main-sidebar main-sidebar-sticky side-menu">
        <div class="sidemenu-logo">
            <a class="main-logo" href="{{url('/')}}">
                <img src="{{url('/logo/transparent-gray.png')}}" class="header-brand-img desktop-logo" alt="logo" style="max-height: 52px">
                <img src="{{url('/logo/transparent-gray.png')}}" class="header-brand-img icon-logo" alt="logo" style="max-height: 52px">
                <img src="{{url('/logo/transparent-gray.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo" style="max-height: 52px">
                <img src="{{url('/logo/transparent-gray.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo" style="max-height: 52px">
            </a>
        </div>
        <div class="main-sidebar-body">
            <ul class="nav">
                <li class="nav-header">
                    <span class="nav-label">Dashboard</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-home sidemenu-icon"></i>
                        <span class="sidemenu-label">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.index')}}">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-user-edit sidemenu-icon"></i>
                        <span class="sidemenu-label">Profile</span>
                    </a>
                </li>



                @if ((Auth::user()->isAdmin() && Auth::user()->can('User')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-user sidemenu-icon"></i>
                        <span class="sidemenu-label">User management</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('users.index')}}">User list</a>
                        </li>
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('user_groups.index')}}">User Groups list</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if ((Auth::user()->isAdmin() && Auth::user()->can('PopUp')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-comment-alt sidemenu-icon"></i>
{{--                        <i class="fas fa-comment-alt-exclamation sidemenu-icon"></i>--}}
                        <span class="sidemenu-label">PopUps</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('popups.index')}}">PopUp list</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if ((Auth::user()->isAdmin() && Auth::user()->can('CountDown')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-clock sidemenu-icon"></i>
{{--                        <i class="fas fa-comment-alt-exclamation sidemenu-icon"></i>--}}
                        <span class="sidemenu-label">CountDowns</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('count_downs.index')}}">CountDown list</a>
                        </li>
                    </ul>
                </li>
                @endif

                @if ( (Auth::user()->isAdmin() && Auth::user()->can('Withdrawal')) || Auth::user()->isSuperAdmin()  )
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#0">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-money-check-alt sidemenu-icon"></i>
                            {{--                        <i class="fas fa-comment-alt-exclamation sidemenu-icon"></i>--}}
                            <span class="sidemenu-label">Withdrawals </span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('withdrawal_requests.index')}}">Withdrawal requests</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ((Auth::user()->isAdmin() && Auth::user()->can('Poll')) || Auth::user()->isSuperAdmin() )
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#0">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-clipboard-list sidemenu-icon"></i>
                            <span class="sidemenu-label">Polls</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('polls.index')}}">poll list</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ((Auth::user()->isAdmin() && Auth::user()->can('Flag')) || Auth::user()->isSuperAdmin() )
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#0">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-flag sidemenu-icon"></i>
                            <span class="sidemenu-label">Flags</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('flags.index')}}">Flag list</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ((Auth::user()->isAdmin() && Auth::user()->can('Admin')) || Auth::user()->isSuperAdmin() )
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-user sidemenu-icon"></i>
                            <span class="sidemenu-label">Admins</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('admins.index')}}">Admin list</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('roles.index')}}">Roles</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ((Auth::user()->isAdmin() && Auth::user()->can('Chest')) || Auth::user()->isSuperAdmin() )
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-box-open sidemenu-icon"></i>
                            <span class="sidemenu-label">Chest</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('chests.index')}}">Chests list</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('chest_gifts.index')}}">Chest gifts</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-settings sidemenu-icon"></i>
                        <span class="sidemenu-label">Settings</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        @foreach($setting_groups as $group)
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('settings.show',$group->name)}}">{{$group->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endif

                <!-- User sidebar -->
                @if ( Auth::user()->isUser() )
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#0">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-money-check-alt sidemenu-icon"></i>
                            {{--                        <i class="fas fa-comment-alt-exclamation sidemenu-icon"></i>--}}
                            <span class="sidemenu-label">Withdrawals </span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('withdrawals.index')}}">Withdrawal requests</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#contact-us">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-address-book sidemenu-icon"></i>
                            <span class="sidemenu-label">Contact us</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                    >
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fe fe-power sidemenu-icon"></i>
                        <span class="sidemenu-label">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidemenu -->        <!-- Main Header-->
    <div class="main-header side-header sticky">
        <div class="container-fluid">
            <div class="main-header-left">
                <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
            </div>
            <div class="main-header-center">
                <div class="responsive-logo">
                    <a href="{{route('home')}}"><img src="{{url('/logo/gradient&w.png')}}" class="mobile-logo" alt="logo" style="max-height: 50px"></a>
                    <a href="{{route('home')}}"><img src="{{url('/logo/gradient&w.png')}}" class="mobile-logo-dark" alt="logo" alt="logo" style="max-height: 50px"></a>
                </div>
{{--                <div class="input-group">--}}
{{--                    <div class="input-group-btn search-panel">--}}
{{--                        <select class="form-control select2-no-search">--}}
{{--                            <option label="All categories">--}}
{{--                            </option>--}}
{{--                            <option value="IT Projects">--}}
{{--                                IT Projects--}}
{{--                            </option>--}}
{{--                            <option value="Business Case">--}}
{{--                                Business Case--}}
{{--                            </option>--}}
{{--                            <option value="Microsoft Project">--}}
{{--                                Microsoft Project--}}
{{--                            </option>--}}
{{--                            <option value="Risk Management">--}}
{{--                                Risk Management--}}
{{--                            </option>--}}
{{--                            <option value="Team Building">--}}
{{--                                Team Building--}}
{{--                            </option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <input type="search" class="form-control" placeholder="Search for anything...">--}}
{{--                    <button class="btn search-btn"><i class="fe fe-search"></i></button>--}}
{{--                </div>--}}
            </div>
            <div class="main-header-right">
{{--                <div class="dropdown header-search">--}}
{{--                    <a class="nav-link icon header-search">--}}
{{--                        <i class="fe fe-search header-icons"></i>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <div class="main-form-search p-2">--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-btn search-panel">--}}
{{--                                    <select class="form-control select2-no-search">--}}
{{--                                        <option label="All categories">--}}
{{--                                        </option>--}}
{{--                                        <option value="IT Projects">--}}
{{--                                            IT Projects--}}
{{--                                        </option>--}}
{{--                                        <option value="Business Case">--}}
{{--                                            Business Case--}}
{{--                                        </option>--}}
{{--                                        <option value="Microsoft Project">--}}
{{--                                            Microsoft Project--}}
{{--                                        </option>--}}
{{--                                        <option value="Risk Management">--}}
{{--                                            Risk Management--}}
{{--                                        </option>--}}
{{--                                        <option value="Team Building">--}}
{{--                                            Team Building--}}
{{--                                        </option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <input type="search" class="form-control" placeholder="Search for anything...">--}}
{{--                                <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link" href="#">
                        <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                        <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                    </a>
                </div>
                <div class="dropdown main-header-notification">
                    <a class="nav-link icon" href="#">
                        <i class="fe fe-bell header-icons"></i>
                        <span class="badge badge-danger nav-link-badge">{{\App\Models\Notification::NewNotifications()->count()}}</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-notification-list">
                            @if(auth()->check() && auth()->user()->isUser())
                                @foreach(\App\Models\Notification::NewNotifications()->take(3)->get() as $notification)
                                <div class="media new">
                                    <div class="main-img-user online">
                                        @if($notification->notifiable_type == \App\Models\User::class)
                                        <img alt="avatar" src="{{url($notification->notifiable->profile())}}">
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <p>{{$notification->description}}</p><span>{{$notification->created_at}}</span>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                            <div class="dropdown-footer">
                                <a href="{{route('notifications.index')}}">View All Notifications</a>
                            </div>
                    </div>
                </div>
{{--                <div class="main-header-notification">--}}
{{--                    <a class="nav-link icon" href="#">--}}
{{--                        <i class="fe fe-message-square header-icons"></i>--}}
{{--                        <span class="badge badge-success nav-link-badge">6</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="#">
                        <span class="main-img-user" ><img alt="avatar" src="{{url(auth()->user()->profile())}}"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title">{{auth()->user()->name}}</h6>
{{--                            <p class="main-notification-text">Web Designer</p>--}}
                        </div>
{{--                        <a class="dropdown-item border-top" href="#">--}}
{{--                            <i class="fe fe-user"></i> My Profile--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="fe fe-edit"></i> Edit Profile--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="fe fe-settings"></i> Account Settings--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="fe fe-settings"></i> Support--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="fe fe-compass"></i> Activity--}}
{{--                        </a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                        >
                            <i class="fe fe-power"></i> Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
{{--                <button class="navbar-toggler navresponsive-toggler d-lg-block d-xl-block " type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"--}}
{{--                        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>--}}
{{--                </button><!-- Navresponsive closed -->--}}
            </div>
        </div>
    </div>

    <!-- Contact us -->
    <div class="modal fade" id="contact-uss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Modal -->
    <div class="modal fade" id="contact-us" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Contact us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

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
                            <div class="form-group mt-3">
                                <label>Contacts</label>
                                <div class="col-12 row mx-auto">
                                    <div class="col-6">
                                        <a href="https://t.me/whpsupport" target="_blank" class="btn btn-telegram" style="width: 100%;">
                                            <i class="fab fa-telegram-plane"></i>
                                            Telegram
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="mailto:support@whalepumpers.com" class="btn btn-email" style="width: 100%">
                                            <i class="fas fa-envelope"></i>
                                            E-mail
                                        </a>
                                    </div>
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
    </div>


    <!-- Main Content-->
    @yield('content')
    <!-- End Main Content-->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
@jquery
@toastr_js
@toastr_render
<!-- Jquery js-->
<script src="{{url('panel/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{url('panel/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{url('panel/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Select2 js-->
<script src="{{url('panel/assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{url('panel/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

<!-- Sidemenu js -->
<script src="{{url('panel/assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- Sidebar js -->
<script src="{{url('panel/assets/plugins/sidebar/sidebar.js')}}"></script>

<!-- Internal Chart.Bundle js-->
<script src="{{url('panel/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Peity js-->
<script src="{{url('panel/assets/plugins/peity/jquery.peity.min.js')}}"></script>

<!-- Internal Morris js -->
<script src="{{url('panel/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{url('panel/assets/plugins/morris.js/morris.min.js')}}"></script>

<!-- Circle Progress js-->
<script src="{{url('panel/assets/js/circle-progress.min.js')}}"></script>
<script src="{{url('panel/assets/js/chart-circle.js')}}"></script>

<!-- Internal Dashboard js-->
<script src="{{url('panel/assets/js/index.js')}}"></script>

<!-- Sticky js -->
<script src="{{url('panel/assets/js/sticky.js')}}"></script>

<!-- Custom js -->
<script src="{{url('panel/assets/js/custom.js')}}"></script>

<!-- Switcher js -->
<script src="{{url('panel/assets/switcher/js/switcher.js')}}"></script>
<!-- REQUIRED SCRIPTS -->

<!-- DataTables -->
<script src="{{URL::to('/').'/plugins/datatables/jquery.dataTables.min.js'}}"></script>
<script src="{{URL::to('/').'/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'}}"></script>
<script src="{{URL::to('/').'/plugins/datatables-responsive/js/dataTables.responsive.min.js'}}"></script>
<script src="{{URL::to('/').'/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'}}"></script>
<script src="{{url('plugins/countdown-timer/jquery.countdown.min.js')}}"></script>
<script>
    $(function () {
        $("#table").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $("textarea").each(function(){
        CKEDITOR.not(".swal2-textarea").replace( this );
    });

    $(".ckeditor").each(function(){
        CKEDITOR.replace( this );
    });
</script>
@foreach ($errors->all() as $error)
    <script>
        {{--swal.fire('{{$error}}')--}}
        Swal.fire({
            icon: 'error',
            title: '{{$error}}',
        })
    </script>

@endforeach
@if(isset($new_gifts))
@foreach ($new_gifts as $gift)
    <script>
        {{--swal.fire('{{$error}}')--}}
        Swal.fire({
            title: 'You win `{{$gift->gift->title}}` chest',
            width: 600,
            padding: '3em',
            color: '#716add',
            background: '#fff url(/images/trees.png)',
            backdrop: `
    rgba(0,0,123,0.4)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
        })
    </script>

@endforeach
@endif
@if(auth()->check() && auth()->user()->isUser())
    <script>
        let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone
        $.ajax({
            url: "{{ route('user.logActivity') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                timezone: timezone,
            }
        });
    </script>
@endif
<script>

    $(document).ready(function() {
        $('.s2').select2();
    });
</script>
@yield('js')
</body>

</html>
