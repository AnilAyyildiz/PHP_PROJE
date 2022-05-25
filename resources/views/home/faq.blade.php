@extends('layouts.home')

@section('title',"Sıkça Sorulan Sorular")
@section('keywords',"Sıkça Sorulan Sorular")
@section('description',"Sıkça Sorulan Sorular")
@section("js")
    <style>
        .accordionn {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .activee, .accordionn:hover {
            background-color: darkred;
            color: white;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>
@endsection
@section('menu')
    @include('home._menu')
@endsection


@section('content')

    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; Sıkça Sorulan Sorular
                </li>
            </ul>
        </div>
        <main class="hoc container clear">
            @foreach($data as $rs)
                <button class="accordionn">{{$rs->question}}</button>
                <div class="panel">
                    <p>
                        {{$rs->answer}}
                    </p>
                </div>
            @endforeach



            <script>
                var acc = document.getElementsByClassName("accordionn");
                var i;

                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("activee");
                        var panel = this.nextElementSibling;
                        if (panel.style.display === "block") {
                            panel.style.display = "none";
                        } else {
                            panel.style.display = "block";
                        }
                    });
                }
            </script>

        </main>
    </div>



@endsection
