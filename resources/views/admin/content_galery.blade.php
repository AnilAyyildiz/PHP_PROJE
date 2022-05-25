@extends("layouts.admin")
@section('title','Admin Content')
@section("js")
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
@endsection
@section('content')


    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_content")}}" class="current">Contents</a> </div>
            <h1>Content Galery</h1>
        </div>




        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" action="{{ route("admin_content_image_store") }}" method="post" class="form-horizontal">
                                @csrf
                                <input type="text" style="display: none" hidden name="content_id" value="{{ $content_id }}">
                                <div class="control-group">
                                    <label class="control-label">Title</label>
                                    <div class="controls">
                                        <input required type="text" name="title" class="form-control" placeholder="Title" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input required name="image" type="file" />
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Add Image</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row-fluid">
                <table id="simple-table" class="table  table-bordered table-hover">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $rs)
                        <tr>
                            <td>{{ $rs->id }}</td>
                            <td>{{ $rs->title }}</td>
                            <td><img style="height: 80px;margin:10px;border: 1px solid #001;" src="{{ Storage::url($rs->image) }}" alt="">
                            </td>
                            <td><a class="btn btn-danger" href="{{ route("admin_content_image_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')">
                                   Delete
                                </a></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>




@endsection
@section("css_end")
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/uniform.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/select2.css" />
@endsection
@section("js_end")

    <script src="{{ asset("assets/admin")}}/js/bootstrap-colorpicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.toggle.buttons.js"></script>
    <script src="{{ asset("assets/admin")}}/js/masked.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.uniform.js"></script>
    <script src="{{ asset("assets/admin")}}/js/select2.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.form_common.js"></script>
    <script src="{{ asset("assets/admin")}}/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.peity.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-wysihtml5.js"></script>

@endsection
