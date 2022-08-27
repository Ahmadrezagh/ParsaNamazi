
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

{{--                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Withdrawal Request</button>--}}
                                       <!-- Create Modal -->
                                        <!-- withdrawals table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
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
                                                        {{$withdrawal->user->name ?? ''}}
                                                    </td>
                                                    <td>
                                                        ${{$withdrawal->amount}}
                                                    </td>
                                                    <td>
                                                        {{$withdrawal->wallet_address}}
                                                    </td>
                                                    <td>
                                                        @if($withdrawal->withdrawal_status_id == 1)
                                                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{$withdrawal->id}}" >Pending..</button>
                                                        @elseif($withdrawal->withdrawal_status_id == 2)
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#modal-edit-{{$withdrawal->id}}" >Success</button>
                                                        @elseif($withdrawal->withdrawal_status_id == 3)
                                                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-edit-{{$withdrawal->id}}" >Failed</button>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{$withdrawal->fail_reason}}
                                                    </td>
                                                    <td>
                                                        {{$withdrawal->created_at}}
                                                    </td>



                                                </tr>

                                                <div class="modal fade" id="modal-edit-{{$withdrawal->id}}" data-backdrop="static">
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
                                                                <form  method="POST" action="{{route('withdrawal_requests.update',$withdrawal->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Amount (USD)</label>
                                                                            <input name="amount" type="number" value="{{$withdrawal->amount}}"  class="form-control" id="exampleInputEmail1" placeholder="Amount in usd" disabled >
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Wallet address</label>
                                                                            <input name="wallet_address" type="text" value="{{$withdrawal->wallet_address}}" class="form-control" id="exampleInputEmail1" placeholder="Wallet address" disabled >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Status</label>
                                                                            <select name="withdrawal_status_id" id="" class="s2 form-control" style="width: 100%">
                                                                                @foreach(\App\Models\WithdrawalStatus::all() as $status)
                                                                                    <option value="{{$status->id}}" @if($withdrawal->withdrawal_status_id == $status->id) selected @endif >{{$status->title}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Fail reason</label>
                                                                            <input type="text" name="fail_reason" value="{{$withdrawal->fail_reason}}" class="form-control">
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
