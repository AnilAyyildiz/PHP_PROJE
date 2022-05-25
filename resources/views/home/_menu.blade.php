


@php
$parentCategories=\App\Http\Controllers\HomeController::categorylist();

@endphp
<div class="wrapper row1">
    <section class="hoc clear">
        <!-- ################################################################################################ -->
        <nav id="mainav">
            <ul class="clear">
                <li><a href="/">ANASAYFA</a></li>
                <li><a class="drop" href="#" onclick="return false;">Kategoriler</a>
                <ul>
                @foreach($parentCategories as $rs)
                @if(count($rs->children))
                        <li><a class="drop" href="#" onclick="return false;">{{ $rs->title }}</a>
                        @include("home.categoryTree",[
                                'children'=>$rs->children
                            ])

                        </li>
                    @else
                    <li><a href="{{ route("category",['id'=>$rs->id,'slug'=>$rs->slug]) }}">{{ $rs->title }}</a></li>
                    @endif
                @endforeach
                </ul>
                <li><a href="/contact">İLETİŞİM</a></li>
                <li><a href="/aboutus">HAKKIMZIDA</a></li>
                <li><a href="/referance">REFERANSLAR</a></li>
                <li><a href="/faq">SSS</a></li>
                @auth
                <li><a class="drop" href="#" onclick="return false;"
                       style="background-color: #1f6377;">
                        &nbsp;<i class="fa fa-user"></i>&nbsp;{{Auth::user()->name}}&nbsp;&nbsp;</a>
                    <ul>
                        <li><a href="{{route("userprofile")}}">Profilim</a></li>
                        <li><a href="{{route("user_content")}}">İçeriklerim</a></li>
                        <li><a href="{{route("myreview")}}">Yorumlarım</a></li>
                        <li><a href="/logout">Çıkış</a></li>
                    </ul>
                </li>
                @endauth
                @guest
                <li><a href="/login" style="background-color: #1f6377;">GİRİŞ</a></li>
                <li><a href="/register"style="background-color: #1f6377;">KAYIT</a></li>
                @endguest
            </ul>
        </nav>
        <!-- ################################################################################################ -->
        <div id="searchform">
            <div>
                <form action="{{ route('getproduct') }}" method="post">
                    @csrf
                    @livewire('search')
                    <button type="submit"><span class="fa fa-search"></span></button>
                </form>
                @livewireScripts
            </div>

        </div>
        <!-- ################################################################################################ -->
    </section>
</div>
