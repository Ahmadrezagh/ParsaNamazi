
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

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Withdrawal Request</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Withdrawal Request</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('withdrawals.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Amount (USD)</label>
                                                                    <input name="amount" type="number" min="{{setting('withdrawal_min')}}"  class="form-control" id="exampleInputEmail1" placeholder="Amount in usd" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Wallet address</label>
                                                                    <input name="wallet_address" type="text" class="form-control" id="exampleInputEmail1" placeholder="Wallet address" required >
                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->

                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
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
                                                        {{$withdrawal->fail_reason}}
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
