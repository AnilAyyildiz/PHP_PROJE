

@extends('layouts.home')

@section('title',"User İçerikler")

@section('menu')
    @include('home._menu')
@endsection
@section("js")
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
@endsection
@section('content')
    <div class="wrapper bgded overlay" style="background-color: #1e242b;">
        <div id="breadcrumb" class="hoc clear">
            <ul>
                <li><a href="/">Anasayfa</a></li>
                <li><a href="">Üye İçerikler</a></li>
            </ul>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            @include("home.usermenu")
            <div class="content three_quarter">
                <h1>İçerik Güncelleme</h1>
                <div class="scrollable">
                    <div class="three_quarter">
                        <form enctype="multipart/form-data" action="{{ route('user_content_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Category</label>
                                <div class="controls">
                                    <select class="span6" name="category_id">
                                        @foreach($category_list as $rs)
                                            @if($rs->id == $data->category_id)
                                                <option selected value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                            @else
                                                <option  value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input value="{{$data->title}}" required type="text" name="title" class="span6" placeholder="Title" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Keywords</label>
                                <div class="controls">
                                    <input value="{{$data->keywords}}" type="text" name="keywords" class="span6" placeholder="Keywords" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <input value="{{$data->description}}" type="text" name="description" class="span6" placeholder="Description"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Detail</label>
                                <div class="controls">
                                    <textarea  class="span6"name="detail" >
                                        {{ $data->detail }}
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'detail' );
                                    </script>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input  name="image" type="file" />
                                </div>
                                @if($data->image)
                                    <div class="controls">
                                        <img style="margin:10px;width: 160px;" src="{{ Storage::url($data->image) }}" alt="">
                                    </div>
                                @endif
                            </div>

                            <div class="control-group">
                                <label class="control-label">File</label>
                                <div class="controls">
                                    <input name="file" type="file" />
                                </div>
                                @if($data->file)
                                    <a href="{{url('/').Storage::url($data->file)}}">{{url('/').Storage::url($data->file)}}</a>
                                @endif
                            </div>
                            <div class="control-group">
                                <label class="control-label">Slug</label>
                                <div class="controls">
                                    <input value="{{$data->slug}}" type="text" name="slug" class="span6" placeholder="Slug" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Update Content</button>
                            </div>
                        </form>
                    </div>


                </div>


            </div>

        </main>
    </div>
    <style>
        .sidebar a {
            font: bold 20px calibri;

        }

    </style>


@endsection
@section("jss")

    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/uniform.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/select2.css" />
@endsection
