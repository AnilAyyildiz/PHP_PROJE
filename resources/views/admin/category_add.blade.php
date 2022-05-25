@extends("layouts.admin")
@section('title','Admin Category')

@section('content')





    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{ route("admin_category")}}" class="current">Categories</a> </div>
            <h1>Category Add</h1>
        </div>




        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Category-info</h5>
                </div>
                <div class="widget-content nopadding">
                    <form enctype="multipart/form-data" action="{{ route("admin_category_store") }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="control-group">
                            <label class="control-label">Parent Category</label>
                            <div class="controls">
                                <select name="parent_id">
                                    <option value="0" selected>Main Category</option>
                                    @foreach($parent_category as $rs)
                                        <option value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}</option>
                                    @endforeach




                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input required type="text" name="title" class="span11" placeholder="Title" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Keywords</label>
                            <div class="controls">
                                <input type="text" name="keywords" class="span11" placeholder="Keywords" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <input type="text" name="description" class="span11" placeholder="Description"  />
                            </div>
                        </div>
                            <div class="control-group" >
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="status" >
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                            </div>
                        <div class="control-group">
                            <label class="control-label">Slug</label>
                            <div class="controls">
                                <input type="text" name="slug" class="span11" placeholder="Slug" />
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
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
