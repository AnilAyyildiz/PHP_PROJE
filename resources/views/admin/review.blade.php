@extends("layouts.admin")
@section('title','Admin review')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_review")}}" class="current">Contents</a> </div>
            <h1>Review Panel</h1>
        </div>
        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Review List</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{--<th>Content</th>--}}
                            <th>Subject</th>
                            <th>Comment</th>
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
                               {{-- <td>{{$rs->product->title}}</td>--}}
                                <td>{{$rs->subject}}</td>
                                <td>{{$rs->review}}</td>
                                <td>{{$rs->status}}</td>
                                <td style="width:180px;">
                                    <a href="{{ route("admin_review_edit",['id'=>$rs->id]) }}"
                                       onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=500,top=100px,left=100px')" class="btn btn-primary btn-mini">Edit</a>
                                    <a href="{{ route("admin_review_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
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
