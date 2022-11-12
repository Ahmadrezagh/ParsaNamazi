@extends('layouts.panel')
@section('title')
    Chest Gifts
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">chest gift management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">chest gift list</li>
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



                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create chest gift</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create chest gift</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('chest_gifts.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Title</label>
                                                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Active</label>
                                                                    <select name="active" id="" class="form-control">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1">Years</label>
                                                                        <input name="years" type="number" min="0" value="0" class="form-control" id="exampleInputEmail1" placeholder="Enter years" required >
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1">Months</label>
                                                                        <input name="months" type="number" min="0" value="0" class="form-control" id="exampleInputEmail1" placeholder="Enter months" required >
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1">Days</label>
                                                                        <input name="days" type="number" min="0" value="0" class="form-control" id="exampleInputEmail1" placeholder="Enter days" required >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Type</label>
                                                                    <select name="type" class="form-control select-type">
                                                                        @foreach(\App\Models\ChestGift::$Types as $type)
                                                                            <option value="{{$type['id']}}">{{$type['title']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-6 t1">
                                                                        <label for="exampleInputEmail1">Percentage</label>
                                                                        <input name="percentage" type="number" min="0"  value="0" class="form-control" id="exampleInputEmail1" placeholder="Enter days" required >
                                                                    </div>
                                                                    <div class="form-group col-6 t1">
                                                                        <label for="exampleInputEmail1">Percentage on</label>
                                                                        <select name="percentage_on" class="form-control" id="">
                                                                            @foreach(\App\Models\ChestGift::$PercentageOn as $item)
                                                                                <option value="{{$item}}">{{$item}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group t2">
                                                                    <label for="exampleInputEmail1">User group</label>
                                                                    <select name="user_group_id" class="form-control" id="">
                                                                        @foreach(\App\Models\UserGroup::all() as $user_group)
                                                                            <option value="{{$user_group->id}}">{{$user_group->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group t3">
                                                                    <label for="exampleInputEmail1">Promote current gift x times</label>
                                                                    <input type="number" value="1" name="promote_credits_time" class="form-control">
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
                                        <!-- chest gifts table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($chest_gifts as $key => $chest_gift)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        {{$chest_gift->title}}
                                                    </td>

                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haschest gift="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$chest_gift->id}}" ><i  class="fas fa-chest gift-edit"></i> Edit</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$chest_gift->id}}" ><i style="color:red" class="fas fa-chest gift-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$chest_gift->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete chest gift</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$chest_gift->title}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('chest_gifts.destroy',$chest_gift->id)}}" method="POST">
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
                                                <div class="modal fade" id="modal-edit{{$chest_gift->id}}" data-backdrop="static">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit chest gift</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form  method="POST" action="{{route('chest_gifts.update',$chest_gift->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <div class="card-body">

                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Title</label>
                                                                                <input name="title" type="text" value="{{ $chest_gift->title }}" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Active</label>
                                                                                <select name="active" id="" class="form-control">
                                                                                    <option value="1" @if($chest_gift->active == 1) selected @endif >Yes</option>
                                                                                    <option value="0" @if($chest_gift->active == 0) selected @endif >No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleInputEmail1">Years</label>
                                                                                    <input name="years" type="number"  min="0" value="{{ $chest_gift->years }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter years" required >
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleInputEmail1">Months</label>
                                                                                    <input name="months" type="number" min="0" value="{{ $chest_gift->months }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter months" required >
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleInputEmail1">Days</label>
                                                                                    <input name="days" type="number" min="0" value="{{ $chest_gift->days }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter days" required >
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Type</label>
                                                                                <select name="type" class="form-control select-type">
                                                                                    @foreach(\App\Models\ChestGift::$Types as $type)
                                                                                        <option value="{{$type['id']}}" @if($chest_gift->type == $type['id']) selected @endif >{{$type['title']}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-6 t1">
                                                                                    <label for="exampleInputEmail1">Percentage</label>
                                                                                    <input name="percentage" type="number" min="0"  value="{{ $chest_gift->percentage }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter days" required >
                                                                                </div>
                                                                                <div class="form-group col-6 t1">
                                                                                    <label for="exampleInputEmail1">Percentage on</label>
                                                                                    <select name="percentage_on" class="form-control" id="">
                                                                                        @foreach(\App\Models\ChestGift::$PercentageOn as $item)
                                                                                            <option value="{{$item}}" @if($chest_gift->percentage_on == $item) selected @endif >{{$item}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group t2">
                                                                                <label for="exampleInputEmail1">User group</label>
                                                                                <select name="user_group_id" class="form-control" id="">
                                                                                    @foreach(\App\Models\UserGroup::all() as $user_group)
                                                                                        <option value="{{$user_group->id}}" @if($chest_gift->user_group_id == $user_group->id) selected @endif >{{$user_group->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group t3">
                                                                                <label for="exampleInputEmail1">Promote current gift x times</label>
                                                                                <input type="number" class="form-control" value="{{$chest_gift->promote_credits_time}}" name="promote_credits_time">
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
                    </div><!-- Row end -->





                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>
        $(".select-type").on('change',function () {
            let val = $(this).val()
            if(val === '1')
            {
                $(".t1").fadeIn()
                $(".t2").fadeOut()
                $(".t3").fadeOut()
            }
            if(val === '2'){
                $(".t1").fadeOut()
                $(".t2").fadeIn()
                $(".t3").fadeOut()
            }
            if(val === '3'){
                $(".t1").fadeOut()
                $(".t2").fadeOut()
                $(".t3").fadeIn()
            }
        })

        $(function () {
            $(".select-type").change()
        });
    </script>
@endsection

