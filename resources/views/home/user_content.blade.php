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
                <a class="btn btn-success " href="{{route("user_content_create")}}" style="margin:5px;"> İçerik Ekle</a>

                <div class="scrollable">
                    <table>
                        <thead>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Başlık</th>
                        <th>Resim</th>
                        <th>Galeri</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                        </thead>
                        <tbody>
                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->category->title}}</td>
                                <td>{{$rs->title}}</td>
                                <td align="center" style="text-align: center;"><img src="{{Storage::url($rs->image) }}" style="width: 120px;height: 80px;"></td>
                                <td style="width:55px; "><a href="{{ route('user_content_image',['id'=>$rs->id]) }}"><img src="/assets/galery.png" width="50px" height="50px"></a></td>
                                <td>{{$rs->status}}</td>
                                <td style="width:100px;">
                                    <a href="{{ route("user_content_edit",['id'=>$rs->id]) }}" ><i class="fa fa-edit" style="color:midnightblue;"></i></a>
                                    <a href="{{ route("user_content_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')"  style="float: right;">
                                        <i class="fa fa-window-close" style="color:darkred;"></i></a>
                                </td>
                            </tr>
                        @endforeach
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
