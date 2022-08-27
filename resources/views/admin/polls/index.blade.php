
@extends('layouts.panel')
@section('polls')
    active
@endsection
@section('poll')
    active
@endsection
@section('title')
    Polls
@endsection
@section('content')


    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">poll management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">poll list</li>
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

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create poll</button>
                                       <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create" data-backdrop="static">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create poll</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('polls.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Title</label>
                                                                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="button" id="add_option_btn" class="btn btn-success" style="width: 100%">Add Option</button>
                                                                </div>
                                                                <div class="form-group" id="options_div">

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
                                        <!-- polls table -->
                                        <table id="table" class="table table-bordered table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($polls as $key => $poll)
                                                <tr>
                                                    <td>
                                                        {{$key + 1}}
                                                    </td>
                                                    <td>
                                                        {{$poll->title}}
                                                    </td>


                                                    <td>
                                                        @if($poll->active == 1)
                                                            <a href="{{route('polls.changeStatus',$poll->id)}}" class="btn btn-success">Active</a>
                                                        @else
                                                            <a href="{{route('polls.changeStatus',$poll->id)}}" class="btn btn-danger">DeActive</a>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{$poll->created_at}}
                                                    </td>

                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspoll="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$poll->id}}" ><i  class="fas fa-poll-edit"></i> Result</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$poll->id}}" ><i style="color:red" class="fas fa-poll-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$poll->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete poll</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$poll->title}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('polls.destroy',$poll->id)}}" method="POST">
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
                                                <div class="modal fade" id="modal-edit{{$poll->id}}" data-backdrop="static">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Poll's result</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->


                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Title</label>
                                                                            <input name="title" type="text" value="{{$poll->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required >
                                                                        </div>
                                                                        @foreach($poll->options as $option)
                                                                            <div class="form-group">
                                                                                <label for="o-{{$option->id}}">{{$option->title}} - {{number_format($option->percentage,2)}}%</label>
                                                                                <div class="progress" id="o-{{$option->id}}">
                                                                                    <div class="progress-bar" role="progressbar" style="width: {{$option->percentage}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$option->title}} {{ number_format($option->percentage,2) }}%</div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <!-- /.card-body -->

                                                                    <div class="card-footer">
{{--                                                                        <button type="submit" class="btn btn-primary">Submit</button>--}}
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

        $("#add_option_btn").on('click',function () {
            let id = makeid(8)
            $('#options_div').append(`
            <div class="row">
            <div class="form-group col-10">
             <input type="text" class="form-control" name="options[${id}]">
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
