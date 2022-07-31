
@extends('layouts.panel')
@section('Count Downs')
    active
@endsection
@section('Count Down')
    active
@endsection
@section('title')
    Count Downs
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Count Down management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Count Down list</li>
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

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create Count Down</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create Count Down</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('count_downs.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Title</label>
                                                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Description</label>
                                                                    <textarea name="description" class="no-ck" id="" cols="30"
                                                                              rows="10"></textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Start At</label>
                                                                    <input name="start_at" type="datetime-local" step="1" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Expire At</label>
                                                                    <input name="expire_at" type="datetime-local" step="1" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                </div>

                                                                <hr>

                                                                <div class="form-group">
                                                                    <button type="button" id="add_user_group_btn" class="btn btn-success" style="width: 100%">Add User Group</button>
                                                                </div>
                                                                <div class="form-group" id="user_groups_div">

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
                                        <!-- Count Downs table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Start At</th>
                                                <th>Expire At</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($count_downs as $key => $count_down)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        {{$count_down->title}}
                                                    </td>
                                                    <td>
                                                        {{$count_down->start_at}}
                                                    </td>
                                                    <td>
                                                        {{$count_down->expire_at}}
                                                    </td>
                                                    <td>
                                                        @if($count_down->expired)
                                                            <button class="btn btn-danger">Expired</button>
                                                        @else
                                                            <button class="btn btn-success">Active</button>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hasCount Down="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$count_down->id}}" ><i  class="fas fa-Count Down-edit"></i> Show</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$count_down->id}}" ><i style="color:red" class="fas fa-Count Down-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$count_down->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Count Down</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$count_down->title}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('count_downs.destroy',$count_down->id)}}" method="POST">
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
                                                <div class="modal fade" id="modal-edit{{$count_down->id}}" data-backdrop="static">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Show Count Down</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->

                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Title</label>
                                                                        <input name="title" value="{{$count_down->title}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Description</label>
                                                                        <textarea name="description" class="no-ck" id="" cols="30"
                                                                                  rows="10">
                                                                            {{$count_down->description}}
                                                                        </textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Start At</label>
                                                                        <input name="start_at" value="{{$count_down->start_at}}" type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Expire At</label>
                                                                        <input name="expire_at" value="{{$count_down->expire_at}}"  type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                    </div>

                                                                    <hr>
                                                                    <div class="form-group row">
                                                                        @foreach($count_down->countDownGroups as $group)
                                                                            <div class="form-group col-6">
                                                                                <input  value="{{$group->userGroup->name ?? ''}}"  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <input  value="{{$group->show_at}}"  type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                            </div>
                                                                        @endforeach
                                                                    </div>


                                                                </div>
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
@section('js')

    <script>
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }

        $("#add_user_group_btn").on('click',function () {
            let id = makeid(8)
            $('#user_groups_div').append(`
            <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <select name="user_groups[${id}][user_group_id]" class="form-control s2" style="width: 100%">
                                                                                @foreach(\App\Models\UserGroup::all() as $user_group)
            <option value="{{$user_group->id}}">{{$user_group->name}}</option>
                                                                                @endforeach
            </select>
        </div>
        <div class="form-group col-5">
            <input type="datetime-local" step="1" class="form-control" name="user_groups[${id}][show_at]">
        </div>
        <div class="form-group col-1">
            <button class="btn btn-danger" onclick="removeItem(this)" type="button">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>
`)
        })

        function removeItem(e) {
            $(e).parent().parent().remove()
        }
    </script>
@endsection