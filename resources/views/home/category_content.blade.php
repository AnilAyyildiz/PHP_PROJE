@extends('layouts.home')

@section('title',$data->title)
@section('keywords',$data->keywords)
@section('description',$data->description)
@section('menu')
    @include('home._menu')
@endsection




@section('content')
    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title) }}
                </li>
            </ul>
        </div>

        <main class="hoc container clear">
            <div class="content">
                <!-- ################################################################################################ -->
                <div id="gallery">
                    <figure>
                        <header class="heading">{{$data->title}}</header>
                        <ul class="nospace clear">
                            @foreach($datalist as $rs)
                                <li class="one_quarter" style="float: left;">
                                    <a class="imgover"  href="{{ route('product_detail',['id'=>$rs->id ,'slug'=>$rs->slug])}}">
                                        <img src="{{ Storage::url($rs->image) }}" alt="{{$rs->title}}"></a>
                                <p style="text-align: center;"><a href="{{ route('product_detail',['id'=>$rs->id ,'slug'=>$rs->slug])}}">{{$rs->title}}</a></p>
                                </li>
                            @endforeach

                        </ul>
                    </figure>
                </div>
            </div>
        </main>
    </div>







    @endsection
