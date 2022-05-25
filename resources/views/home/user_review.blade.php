



@extends('layouts.home')

@section('title',"User Yorumlar")

@section('menu')
    @include('home._menu')
@endsection

@section('content')
    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; User Yorumlar
                </li>
            </ul>
        </div>
        <main class="hoc container clear">
            @include("home.usermenu")
            <div class="content three_quarter">
                <h1>Yorumlar</h1>
                <div class="scrollable">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>İçerik</th>
                            <th>Konu</th>
                            <th>Yorum</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datalist as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->product->title}}</td>
                                <td>{{$rs->subject}}</td>
                                <td>{{$rs->review}}</td>
                                <td>{{$rs->status}}</td>
                                <td>{{$rs->created_at}}</td>
                                <td> <a href="{{ route("user_review_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Delete</a>
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
