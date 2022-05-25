@extends('layouts.home')

@section('title',"User İçerikler")

@section('menu')
    @include('home._menu')
@endsection





@section('content')

    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; User İçerikler
                </li>
            </ul>
        </div>
        @include("home.message")
        <main class="hoc container clear">
            @include("home.usermenu")
            <div class="content three_quarter">
                <h1>İçerikler</h1>
                <form enctype="multipart/form-data" action="{{ route("user_content_image_store") }}" method="post" class="form-horizontal">
                    @csrf
                    <input type="text" style="display: none" hidden name="product_id" value="{{ $product_id }}">
                    <div class="control-group">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <input required type="text" name="title" class="span6" placeholder="Title" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                            <input class="span6" required name="image" type="file" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Add Image</button>
                    </div>
                </form>




                <div class="scrollable">
                    <br>
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
                                <td><a class="btn btn-danger" href="{{ route("user_content_image_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')">
                                        Delete
                                    </a></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

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
