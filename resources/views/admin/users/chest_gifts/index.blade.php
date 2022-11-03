
@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title')
    Users chest lists
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User chest list</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body pl-0">
                                <div class="col-12">
                                    <div class="container">
                                        <!-- users table -->
                                        <div class="table-responsive">
                                            <table id="table" class="table table-bordered table-striped text-center">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User</th>
                                                    <th>Chest</th>
                                                    <th>Gift</th>
                                                    <th>Expire at</th>
                                                    <th>seen</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                @foreach ($chest_gifts as $key => $chest_gift)
                                                    <tr @if($chest_gift->deleted_at) style="background-color: red" @endif >
                                                       <td>
                                                           {{ $key + 1 }}
                                                       </td>
                                                        <td>
                                                            {{$chest_gift->user->name ??  ' - '}}
                                                        </td>

                                                        <td>{{$chest_gift->chest->title ?? ' - '}}</td>

                                                        <td>{{$chest_gift->gift->title ?? ' - '}}</td>

                                                        <td>{{$chest_gift->expire_at ?? ' - '}}</td>

                                                        <td>{{$chest_gift->seen ? 'Yes' : 'No'}}</td>



                                                    </tr>

                                                @endforeach

                                            </table>
                                        </div>

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
