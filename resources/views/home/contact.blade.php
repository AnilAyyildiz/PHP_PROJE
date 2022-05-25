




@extends('layouts.home')

@section('title',"İletişim")
@section('keywords',"İletişim")
@section('description',"İletişim")
@section("css")
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    &nbsp; İletişim
                </li>
            </ul>
        </div>
        <main class="hoc container clear">
            <div class="content">
                <!-- ################################################################################################ -->
                <h2>Contact Page</h2>
                <!-- ################################################################################################ -->
                <div class="group btmspace-50 demo">
                    <div class="one_half first">
                        @include("home.message")
                        <form class="form-inline" method="post" action="{{ route("sendmessage") }}">
                            @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" placeholder="Your Name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Email:</label>
                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Subject:</label>
                                        <input type="text" name="subject" placeholder="Subject" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone:</label>
                                        <input type="text" name="phone" placeholder="Phone" class="form-control">
                                    </div>

                            <div class="form-group">
                                <label for="name">Message:</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <br>
                            <button style="margin-top:10px; " class="btn-success" >Send</button>
                        </form>

                    </div>
                    <div class="one_half">
                        {!! $setting->contact !!}
                    </div>
                </div>


            </div>
        </main>
    </div>

    @endsection
