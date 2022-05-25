@extends("layouts.admin")
@section('title','Admin User')



@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_user")}}" class="current">Contents</a> </div>
            <h1>Users Panel</h1>
        </div>

        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>User List</h5>

                  </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Adress</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>



                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td>@if($rs->profile_photo_path)
                                        <img style="width:60px; height:60px;border:1px solid black;border-radius: 4px;" src="{{Storage::url($rs->profile_photo_path)}}">
                                    @endif
                                </td>
                                <td>{{$rs->name}}</td>
                                <td>{{$rs->email}}</td>
                                <td>{{$rs->phone}}</td>
                                <td>{{$rs->adress}}</td>
                                <td>
                                    <table>
                                        <tr>
                                            @foreach($rs->roles as $rl)
                                                <td >{{$rl->name}}</td>

                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: center">
                                                <a href="{{ route("admin_user_role_edit",['user_id'=>$rs->id]) }}"
                                                   onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=400,top=200px,left=300px')" >
                                                    Add</a> </td>
                                        </tr>
                                    </table>

                                </td>
                                <td style="width:150px;">
                                    <a href="{{ route("admin_user_edit",['id'=>$rs->id]) }}"
                                       onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=500,top=100px,left=100px')" class="btn btn-primary btn-mini">Edit</a>
                                    <a href="{{ route("admin_user_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
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
