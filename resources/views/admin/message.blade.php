@extends("layouts.admin")
@section('title','Admin Message')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_message")}}" class="current">Messages</a> </div>
            <h1>Message Panel</h1>
        </div>

        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Message List</h5>
                     </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->name}}</td>
                                <td>{{$rs->phone}}</td>
                                <td>{{$rs->email}}</td>
                                <td>{{$rs->message}}</td>
                                <td>{{$rs->status}}</td>
                                <td style="width:180px;">
                                    <a href="{{ route("admin_message_edit",['id'=>$rs->id]) }}"
                                       onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=500,top=100px,left=100px')" class="btn btn-primary btn-mini">Edit</a>
                                    <a href="{{ route("admin_message_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
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
