@extends('layouts.home')

@section('title',$search)
@section('keywords',$search)
@section('description',$search)
@section('menu')
    @include('home._menu')
@endsection

@section('content')
    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; {{$search}}
                </li>
            </ul>
        </div>

        <main class="hoc container clear">
            <div class="content">
                <!-- ################################################################################################ -->
                <div id="gallery">
                    <figure>
                        <header class="heading">{{$search}} - Arama Sonuçları</header>
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
