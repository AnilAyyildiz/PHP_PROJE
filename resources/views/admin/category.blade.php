

@extends("layouts.admin")
@section('title','Admin Category')

@section('content')




    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_category")}}" class="current">Categories</a> </div>
            <h1>Category Panel</h1>
        </div>




        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Category List</h5>

                    <a class="btn btn-success " href="{{route("admin_category_create")}}" style="margin:5px;">Add Category</a>



                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            {{--<th>Parent</th>--}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($datalist as $rs)
                                <tr class="gradeX">
                            <td>{{$rs->id}}</td>
                            <td>{{$rs->title}}</td>
                           {{-- <td>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title)}}</td>--}}
                            <td>{{$rs->status}}</td>
                            <td style="width:100px;">
                                <a href="{{ route("admin_category_edit",['id'=>$rs->id]) }}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="{{ route("admin_category_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
                            </td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>



@endsection
@section("css_end")
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/uniform.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/select2.css" />
@endsection
@section("js_end")
    <script src="{{ asset("assets/admin")}}/js/select2.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.tables.js"></script>
    @endsection
