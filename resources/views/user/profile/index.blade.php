
@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title')
    Profile
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body pl-0">
                                <div class="col-12">
                                    <div class="container">
                                        <form action="{{route('profile.update',$user->id)}}">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input value="{{$user->name}}" name="name" type="text" class="form-control" placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Profile</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="profile" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Your Referral link</label>
                                                <input value="{{$user->referral_url}}"  type="text" class="form-control"  >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">My Credit</label>
                                                <input value="{{$user->credit}}"  type="text" class="form-control"  >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">My Cash</label>
                                                <input value="{{$user->cash}}"  type="text" class="form-control"  >
                                            </div>
{{--                                            <div class="form-group">--}}
{{--                                                <label for="exampleInputEmail1">Your Referral code</label>--}}
{{--                                                <input value="{{$user->referral_code}}"  type="text" class="form-control"  >--}}
{{--                                            </div>--}}

                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end -->





                </div>
            </div>
        </div>
    </div>


@endsection
