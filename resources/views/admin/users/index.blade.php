
@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title')
    users
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
                            <li class="breadcrumb-item active" aria-current="page">User list</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-header">
                                <div class="mt-3">
                                    <form action="{{url()->current()}}" method="GET">
                                        <div class="row">
                                            <div class="form-group col-2">
                                                <label for="UserGroup">UserGroup</label>
                                                <select class="form-control" name="group" id="UserGroup">
                                                    <option value="-1">All users</option>
                                                    @foreach(\App\Models\UserGroup::all() as $user_group)
                                                        <option value="{{$user_group->id}}" @if(request('group') == $user_group->id) selected @endif>{{$user_group->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="flags">Flag</label>
                                                <select class="form-control" name="flag_id" id="flags">
                                                    <option value="-1">All users</option>
                                                    @foreach(\App\Models\Flag::all() as $flag)
                                                        <option value="{{$flag->id}}" @if(request('flag_id') == $flag->id) selected @endif>{{$flag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="fromCredit">From Credit</label>
                                                <input type="number" class="form-control" value="{{request('from_credit')}}" name="from_credit" id="fromCredit">
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="ToCredit">To Credit</label>
                                                <input type="number" class="form-control" value="{{request('to_credit')}}" name="to_credit" id="ToCredit">
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-primary mt-4">Filter</button>
                                            </div>
                                            @if((request('group') && request('group') != -1) || request('from_credit') || request('to_credit'))
                                                <div class="col-2 text-left">
                                                    <button class="btn btn-info mt-4">Count : {{$users->count()}}</button>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body pl-0">
                                <div class="col-12">
                                    <div class="container">

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create User</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-reset-credit">Reset All Credits</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-reset-cash">Reset All Cash</button>
                                        <hr>
                                        <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create user</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('users.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email address</label>
                                                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Credit</label>
                                                                    <input name="credit" value="0" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter credit" required  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Cash</label>
                                                                    <input name="cash" value="0" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter cash" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">New Password</label>
                                                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Retype password</label>
                                                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">User group</label>
                                                                    <select name="user_group_id" id="" class="form-control">
                                                                        <option selected disabled>Calculate by system</option>
                                                                        @foreach(\App\Models\UserGroup::all() as $user_group)
                                                                            <option value="{{$user_group->id}}">{{$user_group->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Flags</label>
                                                                    <select name="flags" multiple style="width: 100%" id="" class="form-control s2">
                                                                        @foreach(\App\Models\Flag::all() as $flag)
                                                                            <option value="{{$flag->id}}" >{{$flag->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Profile</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
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
                                        <div class="modal fade" id="modal-reset-credit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Reset All Credits</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('users.reset-credits')}}"  enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="modal-body">
                                                            <div class="card-body">
                                                                Are you sure to reset all credits?
                                                            </div>
                                                            </div>
                                                            <!-- /.card-body -->

                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-danger">Reset</button>
                                                            </div>
                                                        </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <div class="modal fade" id="modal-reset-cash">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Reset All Cashes</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('users.reset-cashes')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                            <div class="card-body">
                                                                Are you sure to reset all cashes?
                                                            </div>
                                                            </div>
                                                            <!-- /.card-body -->

                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-danger">Reset</button>
                                                            </div>
                                                        </form>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- users table -->
                                        <div class="table-responsive">
                                            <table id="table" class="table table-bordered table-striped text-center">
                                                <thead>
                                                <tr>
                                                    <th>Profile image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Credit</th>
                                                    <th>Cash</th>
                                                    <th>Registered</th>
                                                    <th>ip</th>
                                                    <th>User Group</th>
                                                    <th>Options</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>
                                                            <img class="rounded-circle" src="{{URL::to('/').$user->profile()}}" alt="" width="50" height="50">
                                                        </td>
                                                        <td>
                                                            {{$user->name ??  ' - '}}
                                                        </td>

                                                        <td>{{$user->email ?? ' - '}}</td>

                                                        <td>{{$user->credit ?? ' - '}}</td>

                                                        <td>$ {{$user->cash ?? ' - '}}</td>
                                                        <td >
                                                            <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{$user->created_at->diffForHumans()}}">
                                                                {{$user->created_at ?? ' - '}}
                                                            </button>
                                                        </td>

                                                        <td>{{$user->ip ?? ' - '}}</td>

                                                        <td>{{$user->user_group->name ?? ' - '}}</td>

                                                        <td class="text-center">
                                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-sliders-h"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                                <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user->id}}" ><i  class="fas fa-user-edit"></i> Edit</button>
                                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$user->id}}" ><i style="color:red" class="fas fa-user-minus"></i> Delete</button>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="modal-delete{{$user->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete user</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>Are you sure to delete `{{$user->name}}` ?</h5>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
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
                                                    <div class="modal fade" id="modal-edit{{$user->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit user</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- form start -->
                                                                    <form  method="POST" action="{{route('users.update',$user->id)}}"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Name</label>
                                                                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Email address</label>
                                                                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="{{$user->email}}" required>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Credit</label>
                                                                                <input name="credit" type="text" value="{{$user->credit}}" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Cash</label>
                                                                                <input name="cash" type="text" value="{{$user->cash}}" class="form-control" id="exampleInputEmail1" placeholder="Enter cash"  >
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">New Password</label>
                                                                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">Retype password</label>
                                                                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">User group</label>
                                                                                <select name="user_group_id" id="" class="form-control">
                                                                                    <option selected value="0">Calculate by system</option>
                                                                                    @foreach(\App\Models\UserGroup::all() as $user_group)
                                                                                        <option value="{{$user_group->id}}" @if($user->user_group_id && $user_group->id == $user->user_group_id) selected @endif>{{$user_group->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">Flags</label>
                                                                                <select name="flags" multiple style="width: 100%" id="" class="form-control s2">
                                                                                    @foreach(\App\Models\Flag::all() as $flag)
                                                                                        <option value="{{$flag->id}}" @if(in_array($flag->id,$user->flags()->pluck('flag_id')->toArray())) selected @endif>{{$flag->title}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Profile</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                                    </div>
                                                                                </div>
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
                        </div>
                    </div><!-- Row end -->





                </div>
            </div>
        </div>
    </div>


@endsection
