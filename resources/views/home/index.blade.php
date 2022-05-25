


@extends('layouts.home')

@section('title',$setting->title)
@section('keywords',$setting->keywords)
@section('description',$setting->description)

@section('menu')
    @include('home._menu')
@endsection
@section("slider")
    @include('home._slider')
@endsection

@section('content')

    <div class="wrapper row2">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <article class="one_third first">
                <h6 class="heading">{{$soneklenen->title}}</h6>
                {!! substr($soneklenen->detail,0,600)  !!}...
                <p><a class="btn" href="{{ route('product_detail',['id'=>$soneklenen->id ,'slug'=>$soneklenen->slug])}}">Devamını Oku <i class="fas fa-angle-right"></i></a></p>
            </article>
            @foreach($galery as $gl)
            <figure class="one_third" style="margin-bottom: 10px;"><img style="height: 200px;width: 100%;" src="{{ Storage::url($gl->image) }}" alt=""></figure>
            @endforeach
        </section>
    </div>



    <div class="wrapper row2">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">En son Eklenen Notlar</h6>
            </div>
            <div id="latest" class="group">
                {{--@foreach($picked as $pk)
                <article class="one_third" style="width: 328px;"><a class="imgover" href="{{ route('product_detail',['id'=>$pk->id ,'slug'=>$pk->slug])}}">
                        <img style="height: 250px;width:348px;" src="{{ Storage::url($pk->image) }}" alt="{{$pk->title}}"></a>
                    <div class="excerpt">
                        <h6 class="heading">{{$pk->title}}</h6>
                        <footer><a href="{{ route('product_detail',['id'=>$pk->id ,'slug'=>$pk->slug])}}">Daha Fazla <i class="fas fa-angle-right"></i></a></footer>
                    </div>
                </article>
                @endforeach--}}
            </div>
            <!-- ################################################################################################ -->
        </section>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row4">




@endsection
