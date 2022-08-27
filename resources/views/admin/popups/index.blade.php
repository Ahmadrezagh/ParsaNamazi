
@extends('layouts.panel')
@section('popups')
    active
@endsection
@section('popup')
    active
@endsection
@section('title')
    popups
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">popup management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">popup list</li>
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

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create popup</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create PopUp</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('popups.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Title</label>
                                                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Description</label>
                                                                    <textarea name="description" id="" cols="30"
                                                                              rows="10"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Count</label>
                                                                    <input name="count_limit" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter count"  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Cash</label>
                                                                    <input name="cash" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter cash"  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Credit</label>
                                                                    <input name="credit" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Referral Cash</label>
                                                                    <input name="referral_cash" min="0" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter referral cash"  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Referral Credit</label>
                                                                    <input name="referral_credit" min="0" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter referral credit"  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Expire after (minute)</label>
                                                                    <input name="expire_after" min="1" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter expire time"  >
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
                                        <!-- popups table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Limit</th>
                                                <th>Credit</th>
                                                <th>Cash</th>
                                                <th>Referral Credit</th>
                                                <th>Referral Cash</th>
                                                <th>Expire At</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($popups as $key => $popup)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        {{$popup->title}}
                                                    </td>

                                                    <td>{{$popup->count_limit}}</td>

                                                    <td>{{$popup->credit}}</td>

                                                    <td>$ {{$popup->cash}}</td>

                                                    <td>{{$popup->referral_credit}}</td>

                                                    <td>$ {{$popup->referral_cash}}</td>
                                                    <td >
                                                        <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{$popup->expire_at}}">
                                                            {{$popup->expire_at}}
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$popup->id}}" ><i  class="fas fa-popup-edit"></i> Edit</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$popup->id}}" ><i style="color:red" class="fas fa-popup-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$popup->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete popup</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$popup->title}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('popups.destroy',$popup->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                                </form>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                                <!-- /.modal -->
                                                <!-- Change Modal -->
                                                <div class="modal fade" id="modal-edit{{$popup->id}}" data-backdrop="static">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit popup</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form  method="POST" action="{{route('popups.update',$popup->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Title</label>
                                                                            <input name="title" type="text" value="{{$popup->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Description</label>
                                                                            <textarea name="description" id="" cols="30"
                                                                                      rows="10">
                                                                                {{$popup->description}}
                                                                            </textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Count</label>
                                                                            <input name="count_limit" value="{{$popup->count_limit}}" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter count"  >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Cash</label>
                                                                            <input name="cash" value="{{$popup->cash}}" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter cash"  >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Credit</label>
                                                                            <input name="credit" value="{{$popup->credit}}" type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Referral Cash</label>
                                                                            <input name="referral_cash" value="{{$popup->referral_cash}}" min="0" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter referral cash"  >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Referral Credit</label>
                                                                            <input name="referral_credit" value="{{$popup->referral_credit}}" min="0" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter referral credit"  >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Expire at</label>
                                                                            <input name="expire_at" value="{{$popup->expire_at}}"  type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="Enter expire date time"  >
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
                                                <!-- /.modal -->


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
