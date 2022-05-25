@extends("layouts.admin")
@section('title','Admin FAQ')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_faq")}}" class="current">FAQ</a> </div>
            <h1>FAQ Panel</h1>

            @include("home.message")
        </div>

        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>FAQ List</h5>
                    <a class="btn btn-success " href="{{route("admin_faq_create")}}" style="margin:5px;">Add FAQ</a>

                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->question}}</td>
                                <td>{{$rs->answer}}</td>
                                <td>{{$rs->position}}</td>
                                <td>{{$rs->status}}</td>
                                <td style="width:180px;">
                                    <a href="{{ route("admin_faq_edit",['id'=>$rs->id]) }}" class="btn btn-primary btn-mini">Edit</a>
                                    <a href="{{ route("admin_faq_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
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
