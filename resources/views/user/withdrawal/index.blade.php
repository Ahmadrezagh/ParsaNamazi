
@extends('layouts.panel')
@section('withdrawals')
    active
@endsection
@section('withdrawal')
    active
@endsection
@section('title')
    withdrawals
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Withdrawals</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Withdrawal list</li>
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

{{--                                        <button class="btn btn-primary">Withdrawal Request</button>--}}
                                       <!-- withdrawals table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>Wallet Address</th>
                                                <th>Status</th>
                                                <th>Fail reason</th>
                                                <th>Date</th>
{{--                                                <th>Options</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($withdrawals as $key => $withdrawal)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        ${{$withdrawal->amount}}
                                                    </td>
                                                    <td>
                                                        {{$withdrawal->wallet_address}}
                                                    </td>
                                                    <td>
                                                        @if($withdrawal->withdrawal_status_id == 1)
                                                            <button class="btn btn-warning">Pending..</button>
                                                        @elseif($withdrawal->withdrawal_status_id == 2)
                                                            <button class="btn btn-success">Success</button>
                                                        @elseif($withdrawal->withdrawal_status_id == 3)
                                                            <button class="btn btn-danger">Failed</button>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{$withdrawal->fail_reason ?? ' - '}}
                                                    </td>
                                                    <td>
                                                        {{$withdrawal->created_at}}
                                                    </td>



                                                </tr>


                                            @endforeach

                                        </table>

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
