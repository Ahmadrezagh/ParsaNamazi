
@extends('layouts.panel')
@section('User Groups')
    active
@endsection
@section('User Group')
    active
@endsection
@section('title')
    User Groups
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User Group management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Group list</li>
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

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create User Group</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create User Group</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('user_groups.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">From Credit</label>
                                                                    <input name="from" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">To Credit</label>
                                                                    <input name="to" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit" required >
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
                                        <!-- User Groups table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>From Credit</th>
                                                <th>To Credit</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($user_groups as $key => $user_group)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        {{$user_group->name}}
                                                    </td>
                                                    <td>
                                                        {{$user_group->from}}
                                                    </td>
                                                    <td>
                                                        {{$user_group->to}}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hasUser Group="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user_group->id}}" ><i  class="fas fa-User Group-edit"></i> Edit</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$user_group->id}}" ><i style="color:red" class="fas fa-User Group-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$user_group->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete User Group</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$user_group->name}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('user_groups.destroy',$user_group->id)}}" method="POST">
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
                                                <div class="modal fade" id="modal-edit{{$user_group->id}}" data-backdrop="static">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit User Group</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form  method="POST" action="{{route('user_groups.update',$user_group->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Name</label>
                                                                            <input name="name" value="{{$user_group->name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">From Credit</label>
                                                                            <input name="from" value="{{$user_group->from}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit" required >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">To Credit</label>
                                                                            <input name="to" value="{{$user_group->to}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit" required >
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
