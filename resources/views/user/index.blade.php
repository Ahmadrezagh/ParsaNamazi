
@extends('layouts.panel')
@section('title')
    Home
@endsection
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Project Dashboard</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center">
{{--                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">--}}
{{--                                <i class="fe fe-download mr-2"></i> Import--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">--}}
{{--                                <i class="fe fe-filter mr-2"></i> Filter--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-primary my-2 btn-icon-text">--}}
{{--                                <i class="fe fe-download-cloud mr-2"></i> Download Report--}}
{{--                            </button>--}}
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->


{{--                <div class="row row-sm  col-12">--}}
{{--                    <div class="col-sm-12 col-lg-12 col-xl-12">--}}
{{--                        <div class="card bg-primary custom-card card-box">--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-12 img-bg ">--}}
{{--                                        <div class="tx-white-7 mb-1 text-center">--}}
{{--                                            <div class="countDown-timer">--}}
{{--                                                <!-- <div class="dash day_dash"> --}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <span class="dash_title">d</span>--}}

{{--                                                </div> -->--}}
{{--                                                <div class="dash hour_dash"> --}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <span class="dash_title">:</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="dash min_dash"> --}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <span class="dash_title">:</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="dash sec_dash"> --}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                    <div class="digit">0</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                @foreach(\App\Models\CountDown::query()->started()->notExpired()->get() as $countDown)
                    @if($countDown->show_for_user)
{{--                        <div class="row row-sm  col-12">--}}
{{--                    <div class="col-sm-12 col-lg-12 col-xl-12">--}}
{{--                        <div class="card bg-primary custom-card card-box">--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-12 img-bg ">--}}
{{--                                        <h4 class="d-flex  mb-3">--}}
{{--                                            --}}{{--                                                    <span class="font-weight-bold text-white ">{{$popUp->title}}</span>--}}
{{--                                        </h4>--}}
{{--                                        <div class="tx-white-7 mb-1 text-center">--}}
{{--                                            {!! $countDown->description !!} <br>--}}
{{--                                            <h5 id="cd-{{$countDown->id}}"></h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 text-center mt-3">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                        <script>--}}
{{--                            countDown('{{\Carbon\Carbon::parse(strtotime($countDown->show_for_user->show_at))->format('M d, Y H:i:s')}}','cd-{{$countDown->id}}')--}}
{{--                        </script>--}}



                        <div class="row row-sm  col-12">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card bg-primary custom-card card-box">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="col-12 img-bg ">
                                                <div class="tx-white-7 mb-1 text-center">
                                                    <div class="countDown-timer" id="countDown-timer-{{$countDown->id}}">
                                                        <!-- <div class="dash day_dash">
                                                            <div class="digit">0</div>
                                                            <div class="digit">0</div>
                                                            <div class="digit">0</div>
                                                            <span class="dash_title">d</span>

                                                        </div> -->
                                                        <div class="dash hour_dash">
                                                            <div class="digit">0</div>
                                                            <div class="digit">0</div>
                                                            <span class="dash_title">:</span>
                                                        </div>
                                                        <div class="dash min_dash">
                                                            <div class="digit">0</div>
                                                            <div class="digit">0</div>
                                                            <span class="dash_title">:</span>
                                                        </div>
                                                        <div class="dash sec_dash">
                                                            <div class="digit">0</div>
                                                            <div class="digit">0</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endif
                @endforeach
                <!--Row-->
                <div class="row row-sm">
                    <!--Row-->
                    <!--Row -->

                    <div class="col-sm-12 col-lg-12 col-xl-8">
                        <!--Row-->
                        <!--Row -->

                    @foreach(\App\Models\PopUp::query()->notExpired()->get() as $popUp)
                        <!--Row-->
                        <div class="row row-sm  mt-lg-4">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card bg-primary custom-card card-box">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="col-12 img-bg ">
                                                <h4 class="d-flex  mb-3">
{{--                                                    <span class="font-weight-bold text-white ">{{$popUp->title}}</span>--}}
                                                </h4>
                                                <div class="tx-white-7 mb-1">
                                                    {!! $popUp->description !!}
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-3">
                                                @if($popUp->total_clicks > $popUp->count_limit)
                                                    <button class="btn btn-danger">Limited</button>
                                                @elseif($popUp->alreadyClicked)
                                                    <button class="btn btn-warning">Already clicked</button>
                                                @else
                                                    <a href="{{route('pop_ups.show',$popUp->id)}}" class="btn btn-success">Click Here</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row -->
                        @endforeach
                        <!--Row-->
                        <div class="row row-sm mt-4">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <div class="card-item-icon card-icon">
                                                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect height="14" opacity=".3" width="14" x="5" y="5"/><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></g></svg>
                                            </div>
                                            <div class="card-item-title mb-2">
                                                <label class="main-content-label tx-13 font-weight-bold mb-1">Total Revenue</label>
                                                <span class="d-block tx-12 mb-0 text-muted">Previous month vs this months</span>
                                            </div>
                                            <div class="card-item-body">
                                                <div class="card-item-stat">
                                                    <h4 class="font-weight-bold">$5,900.00</h4>
                                                    <small><b class="text-success">55%</b> higher</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <div class="card-item-icon card-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
                                            </div>
                                            <div class="card-item-title mb-2">
                                                <label class="main-content-label tx-13 font-weight-bold mb-1">New Employees</label>
                                                <span class="d-block tx-12 mb-0 text-muted">Employees joined this month</span>
                                            </div>
                                            <div class="card-item-body">
                                                <div class="card-item-stat">
                                                    <h4 class="font-weight-bold">15</h4>
                                                    <small><b class="text-success">5%</b> Increased</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <div class="card-item-icon card-icon">
                                                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/></svg>
                                            </div>
                                            <div class="card-item-title  mb-2">
                                                <label class="main-content-label tx-13 font-weight-bold mb-1">Total Expenses</label>
                                                <span class="d-block tx-12 mb-0 text-muted">Previous month vs this months</span>
                                            </div>
                                            <div class="card-item-body">
                                                <div class="card-item-stat">
                                                    <h4 class="font-weight-bold">$8,500</h4>
                                                    <small><b class="text-danger">12%</b> decrease</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->
                        @foreach(\App\Models\Poll::query()->latest()->active()->get() as $poll)
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="card custom-card">
                                    <div class="card-header  border-bottom-0 pb-0">
                                        <div>
                                            <div class="d-flex">
                                                <label class="main-content-label my-auto pt-2">{{$poll->title}}</label>
                                            </div>
{{--                                            <span class="d-block tx-12 mt-2 mb-0 text-muted"> project work involves a group of students investigating . </span>--}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @foreach($poll->options as $key => $option)
                                        <div class="row @if($key == 0) mt-1 @else mt-4 @endif">

                                            @if($poll->users()->where('user_id','=',auth()->user()->id)->exists())
                                                <div class="col-5">
                                                    <span class="">{{$option->title}}</span>
                                                </div>
                                            <div class="col-4 my-auto">
                                                <div class="progress ht-6 my-auto">
                                                    <div class="progress-bar ht-6 " style="width: {{$option->percentage}}%;"  role="progressbar"  aria-valuenow="{{number_format($option->percentage,2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex">
                                                    <span class="tx-13"><b>{{number_format($option->percentage,2)}}%</b></span>
                                                </div>
                                            </div>
                                            @else
                                                <div class="col-12">
                                                    <div class="d-flex">
                                                        <a href="{{route('pollRequest',$option->id)}}" class="btn btn-primary" style="width: 100%">{{$option->title}}</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        @endforeach
{{--                                        <div class="row mt-4">--}}
{{--                                            <div class="col-5">--}}
{{--                                                <span class="">UI & UX design</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 my-auto">--}}
{{--                                                <div class="progress ht-6 my-auto">--}}
{{--                                                    <div class="progress-bar ht-6 wd-70p" role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-3">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <span class="tx-13"><i class="text-danger fe fe-arrow-down"></i><b>12.34%</b></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mt-4">--}}
{{--                                            <div class="col-5">--}}
{{--                                                <span class="">Product design</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 my-auto">--}}
{{--                                                <div class="progress ht-6 my-auto">--}}
{{--                                                    <div class="progress-bar ht-6 wd-40p" role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-3">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <span class="tx-13"><i class="text-success  fe fe-arrow-up"></i><b>12.75%</b></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div><!-- col end -->

                        </div>
                        @endforeach
                        <!--row-->
                        <div class="row row-sm">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header border-bottom-0">
                                        <div>
                                            <label class="main-content-label mb-2">Project Budget</label> <span class="d-block tx-12 mb-0 text-muted">The Project Budget is a tool used by project managers to estimate the total cost of a project</span>
                                        </div>
                                    </div>
                                    <div class="card-body pl-0">
                                        <div class>
                                            <div class="container">
                                                <canvas id="chartLine" class="chart-dropshadow2 ht-250"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col end -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header  border-bottom-0 pb-0">
                                        <div>
                                            <div class="d-flex">
                                                <label class="main-content-label my-auto pt-2">Today tasks</label>
                                                <div class="ml-auto mt-3 d-flex">
                                                    <div class="mr-3 d-flex text-muted tx-13"><span class="legend bg-primary rounded-circle"></span>Project</div>
                                                    <div class="d-flex text-muted tx-13"><span class="legend bg-light rounded-circle"></span>Inprogress</div>
                                                </div>
                                            </div>
                                            <span class="d-block tx-12 mt-2 mb-0 text-muted"> UX UI & Backend Developement. </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 my-auto">
                                                <h6 class="mb-3 font-weight-normal">Project-Budget</h6>
                                                <div class="text-left">
                                                    <h3 class="font-weight-bold mr-3 mb-2 text-primary">$5,240</h3>
                                                    <p class="tx-13 my-auto text-muted">May 28 - June 01 (2018)</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-auto">
                                                <div class="forth circle">
                                                    <div class="chart-circle-value circle-style"><div class="tx-16 font-weight-bold">75%</div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col end -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header  border-bottom-0 pb-0">
                                        <div>
                                            <div class="d-flex">
                                                <label class="main-content-label my-auto pt-2">Top Inquiries</label>
                                            </div>
                                            <span class="d-block tx-12 mt-2 mb-0 text-muted"> project work involves a group of students investigating . </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-1">
                                            <div class="col-5">
                                                <span class="">Brand identity</span>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <div class="progress ht-6 my-auto">
                                                    <div class="progress-bar ht-6 wd-80p" role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex">
                                                    <span class="tx-13"><i class="text-success fe fe-arrow-up"></i><b>24.75%</b></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-5">
                                                <span class="">UI & UX design</span>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <div class="progress ht-6 my-auto">
                                                    <div class="progress-bar ht-6 wd-70p" role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex">
                                                    <span class="tx-13"><i class="text-danger fe fe-arrow-down"></i><b>12.34%</b></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-5">
                                                <span class="">Product design</span>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <div class="progress ht-6 my-auto">
                                                    <div class="progress-bar ht-6 wd-40p" role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex">
                                                    <span class="tx-13"><i class="text-success  fe fe-arrow-up"></i><b>12.75%</b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col end -->
                            <div class="col-lg-12">
                                <div class="card custom-card mg-b-20">
                                    <div class="card-body">
                                        <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                                            <div>
                                                <label class="main-content-label mb-2">Tasks</label> <span class="d-block tx-12 mb-3 text-muted">A task is accomplished by a set deadline, and must contribute toward work-related objectives.</span>
                                            </div>
                                            <div class="ml-auto">
                                                <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Task</a>
                                                    <a class="dropdown-item" href="#">Team</a>
                                                    <a class="dropdown-item" href="#">Status</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i> Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive tasks">
                                            <table class="table card-table table-vcenter text-nowrap mb-0  border">
                                                <thead>
                                                <tr>
                                                    <th class="wd-lg-10p">Task</th>
                                                    <th class="wd-lg-20p">Team</th>
                                                    <th class="wd-lg-20p text-center">Open task</th>
                                                    <th class="wd-lg-20p">Prority</th>
                                                    <th class="wd-lg-20p">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="font-weight-semibold d-flex"><label class="ckbox my-auto mr-4 mt-1"><input checked="" type="checkbox"><span></span></label><span class="mt-1">Evaluating the design</span></td>
                                                    <td class="text-nowrap">
                                                        <div class="demo-avatar-group my-auto float-right">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/1.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/2.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/3.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/4.jpg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">37<i class=""></i></td>
                                                    <td class="text-primary">High</td>
                                                    <td><span class="badge badge-pill badge-primary-light">Completed</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-semibold d-flex"><label class="ckbox my-auto mr-4"><input checked="" type="checkbox"><span></span></label><span class="mt-1"> Generate ideas for design</span></td>
                                                    <td class="text-nowrap">
                                                        <div class="demo-avatar-group my-auto float-right">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/5.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/6.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/7.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/8.jpg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">37<i class=""></i></td>
                                                    <td class="text-secondary">Normal</td>
                                                    <td><span class="badge badge-pill badge-warning-light">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-semibold d-flex"><label class="ckbox my-auto mr-4"><input type="checkbox"><span></span></label><span class="mt-1">Define the problem</span></td>
                                                    <td class="text-nowrap">
                                                        <div class="demo-avatar-group my-auto float-right">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/11.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/12.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/9.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/10.jpg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">37<i class=""></i></td>
                                                    <td class="text-warning">Low</td>
                                                    <td><span class="badge badge-pill badge-primary-light">Completed</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-semibold d-flex"><label class="ckbox my-auto mr-4"><input type="checkbox"><span></span></label><span class="mt-1">Empathize with users</span></td>
                                                    <td class="text-nowrap">
                                                        <div class="demo-avatar-group my-auto float-right">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/7.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/9.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/11.jpg">
                                                            </div>
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="avatar" class="rounded-circle" src="panel/assets/img/users/12.jpg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">37<i class=""></i></td>
                                                    <td class="text-primary">High</td>
                                                    <td><span class="badge badge-pill badge-danger-light">Rejected</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col end -->
                        </div><!-- Row end -->
                    </div><!-- col end -->
                    <div class="col-sm-12 col-lg-12 col-xl-4 mt-xl-4">
                        <div class="card custom-card card-dashboard-calendar pb-0">
                            <label class="main-content-label mb-2">Recent referrals</label>
                            <span class="d-block tx-12 mb-2 text-muted">People who you invited</span>
                            <table class="table table-hover m-b-0 transcations ">
                                <tbody>
                                @foreach(auth()->user()->myRefers as $referUser)
                                <tr>
                                    <td class="wd-5p">
                                        <div class="main-img-user avatar-md">
                                            <img alt="avatar" class="rounded-circle mr-3" src="{{url($referUser->profile())}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-middle ml-3">
                                            <div class="d-inline-block">
                                                <h6 class="mb-1">{{$referUser->name}}</h6>
                                                <p class="mb-0 tx-13 text-muted">Registered at:{{$referUser->created_at}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- col end -->
                </div><!-- Row end -->


            </div>
        </div>
    </div>
@endsection
@section('js')

    @foreach(\App\Models\CountDown::query()->notExpired()->get() as $countDown)
        @if($countDown->show_for_user)
            <script>
                let countDownID = {{$countDown->id}};
                let countDownTextID = "countDown-timer-{{$countDown->id}}";
                $("#countDown-timer-{{$countDown->id}}").countdown({
                    diff: null,
                    year: 0,
                    month: 0,
                    day: 0,
                    hour: {{$countDown->show_for_user->show_at_in_hour ?? 0}},
                    min: {{$countDown->show_for_user->show_at_in_minute ?? 0}},
                    sec: {{$countDown->show_for_user->show_at_in_second ?? 0}},
                    refresh: 1000,
                    easing: 'linear',
                    dash: [
                        {key: 'year', duration: 950},
                        {key: 'day', duration: 950},
                        {key: 'hour', duration: 950},
                        {key: 'min', duration: 950},
                        {key: 'sec', duration: 750}
                    ],
                    onEnd:() => {
                        $.ajax({
                            url: "{{ route('show_count_down') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                count_down_id: countDownID,
                            },
                            success: function(data) {
                                console.log('Success')
                                countDownTextID.empty()
                                document.getElementById(countDownTextID).innerHTML = data.description;
                            },
                            error: function(data) {
                                console.log('Success')
                                toastr.error("something went wrong")
                            }
                        });

                    }
                });
            </script>
        @endif
    @endforeach
@endsection