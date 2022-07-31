
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
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">From Credit</label>
                                                                    <input name="from" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">To Credit</label>
                                                                    <input name="to" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
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
                                                <th>Name</th>
                                                <th>From Credit</th>
                                                <th>To Credit</th>
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
                                                        {{$count_down->name}}
                                                    </td>
                                                    <td>
                                                        {{$count_down->from}}
                                                    </td>
                                                    <td>
                                                        {{$count_down->to}}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hasCount Down="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$count_down->id}}" ><i  class="fas fa-Count Down-edit"></i> Edit</button>
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
                                                                <h5>Are you sure to delete `{{$count_down->name}}` ?</h5>
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
                                                                <h4 class="modal-title">Edit Count Down</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form  method="POST" action="{{route('count_downs.update',$count_down->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Name</label>
                                                                            <input name="name" value="{{$count_down->name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">From Credit</label>
                                                                            <input name="from" value="{{$count_down->from}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">To Credit</label>
                                                                            <input name="to" value="{{$count_down->to}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter credit"  >
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
