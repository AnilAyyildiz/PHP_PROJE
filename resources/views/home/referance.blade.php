




@extends('layouts.home')

@section('title',"Referanslar")
@section('keywords',"Referanslar")
@section('description',"Referanslar")
@section('menu')
    @include('home._menu')
@endsection

@section('content')

    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; Referanslar
                </li>
            </ul>
        </div>
        <main class="hoc container clear">
            {!! $setting->referances  !!}
        </main>
    </div>



@endsection
