@extends('layouts.panel')
@section('title')
    Chests
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">chest management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">chest list</li>
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

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create chest</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create chest</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form id="formCreate" method="POST" action="{{route('chests.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Title</label>
                                                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Required Days</label>
                                                                    <input name="required_online_days" type="number" min="1" class="form-control" id="exampleInputEmail1" placeholder="Enter required online days" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Active</label>
                                                                    <select name="active" id="" class="form-control">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <button class="btn btn-success mb-3" type="button" onclick="appendItem(this,'Create')" style="width: 100%">Add item</button>
                                                                    <div class="row text-center" >
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Gift</label>

                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Percentage</label>
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Action</label>
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
                                        <!-- chests table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Test</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($chests as $key => $chest)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        {{$chest->title}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('testChest',$chest->id)}}" class="btn btn-warning">Test Chest #{{$chest->title}}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haschest="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$chest->id}}" ><i  class="fas fa-chest-edit"></i> Edit</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$chest->id}}" ><i style="color:red" class="fas fa-chest-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$chest->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete chest</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$chest->title}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('chests.destroy',$chest->id)}}" method="POST">
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
                                                <div class="modal fade" id="modal-edit{{$chest->id}}" data-backdrop="static">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit chest</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form id="form{{$chest->id}}" method="POST" action="{{route('chests.update',$chest->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Title</label>
                                                                            <input name="title" value="{{$chest->title}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Required Days</label>
                                                                            <input name="required_online_days" value="{{$chest->required_online_days}}" type="number" min="1" class="form-control" id="exampleInputEmail1" placeholder="Enter required online days" required >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Active</label>
                                                                            <select name="active" id="" class="form-control">
                                                                                <option value="1" @if($chest->active == 1 ) selected @endif >Yes</option>
                                                                                <option value="0" @if($chest->active == 2 ) selected @endif  >No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <button class="btn btn-success mb-3" type="button" onclick="appendItem(this,'{{$chest->id}}')" style="width: 100%">Add item</button>
                                                                            <div class="row text-center" >
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleInputEmail1">Gift</label>

                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleInputEmail1">Percentage</label>
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleInputEmail1">Action</label>
                                                                                </div>

                                                                            </div>
                                                                            @foreach($chest->gifts as $gift)
                                                                                @php
                                                                                    $rand = \Illuminate\Support\Str::random(4)
                                                                                @endphp
                                                                                <div class="row" >
                                                                                    <div class="form-group col-4">
                                                                                        <select name="gifts[{{$rand}}][chest_gift_id]" id="" class="form-control">
                                                                                            @foreach(\App\Models\ChestGift::all() as $_gift)
                                                                                                <option value="{{$_gift->id}}" @if($gift->pivot->chest_gift_id == $_gift->id) selected @endif >{{$_gift->title}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-4">
                                                                                        <input type="number" name="gifts[{{ $rand }}][percentage]" class="form-control" min="0" value="{{$gift->pivot->percentage}}" max="100" >
                                                                                    </div>
                                                                                    <div class="form-group col-4">
                                                                                        <button class="btn btn-danger" type="button" onclick="removeItem(this)" style="width: 100%">
                                                                                            <i class="fas fa-trash"></i>
                                                                                        </button>
                                                                                    </div>

                                                                                </div>
                                                                            @endforeach
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

        function removeItem(item){
            $(item).parent().parent().remove()
        }

        function appendItem(item,formID){
            let id = makeid(4)
            $(item).parent().append(`
            <div class="row" >
                                                                        <div class="form-group col-4">
                                                                            <select name="gifts[${id}][chest_gift_id]" id="" class="form-control" form="form${formID}">
                                                                                @foreach(\App\Models\ChestGift::all() as $gift)
            <option value="{{$gift->id}}">{{$gift->title}}</option>
                                                                                @endforeach
            </select>
        </div>
        <div class="form-group col-4">
            <input type="number" name="gifts[${id}][percentage]" class="form-control" min="0" value="0" max="100" form="form${formID}" >
        </div>
        <div class="form-group col-4">
            <button class="btn btn-danger" type="button" onclick="removeItem(this)" style="width: 100%">
                <i class="fas fa-trash"></i>
            </button>
        </div>

    </div>
`)
        }
    </script>
@endsection
