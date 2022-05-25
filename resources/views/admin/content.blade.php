@extends("layouts.admin")
@section('title','Admin Content')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_content")}}" class="current">Contents</a> </div>
            <h1>Content Panel</h1>
        </div>
        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Category List</h5>

                    <a class="btn btn-success " href="{{route("admin_content_create")}}" style="margin:5px;">Add Content</a>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Galery</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td><a href="{{ route("admin_user_show",['id'=>$rs->user->id]) }}"
                                       onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=500,top=100px,left=100px')"
                                    >{{$rs->user->name}}</a></td>
                                <td>{{$rs->category->title}}</td>
                                <td>{{$rs->title}}</td>
                                <td align="center" style="text-align: center;"><img src="{{Storage::url($rs->image) }}" width="80px" height="80px"></td>
                                <td style="width:55px; "><a href="{{ route('admin_content_image',['id'=>$rs->id]) }}"><img src="/assets/galery.png" width="50px" height="50px"></a></td>
                                <td>{{$rs->status}}</td>
                                <td style="width:100px;">
                                    <a href="{{ route("admin_content_edit",['id'=>$rs->id]) }}" class="btn btn-primary btn-mini">Edit</a>
                                    <a href="{{ route("admin_content_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
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
