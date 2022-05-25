
@php
    $setting=\App\Http\Controllers\HomeController::settinglist();
@endphp
<div class="wrapper row4">
    <footer id="footer" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="one_third first">
            <h6 class="heading">İletişim ve Bilgiler</h6>
            <p><b>Adress</b> : {{ $setting->adress }}</p>
            <p><b>Tel:</b> {{ $setting->phone }}</p>
            <p><b>Fax:</b> {{ $setting->fax }} </p>
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="{{$setting->facebook}}"><i class="fab fa-facebook"></i></a></li>
                <li><a class="faicon-google-plus" href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a></li>
                <li><a class="faicon-linkedin" href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li>
                <li><a class="faicon-twitter" href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="heading">Sayfalar</h6>
            <ul >
                <li><a style="color:white" href="/">Ana Sayfa</a></li>
                <li><a style="color:white" href="/contact">İletişim</a></li>
                <li><a style="color:white" href="/referance">Referanslar</a></li>
                <li><a style="color:white" href="/aboutus">Hakkımızda</a></li>
                <li><a style="color:white" href="/faq">SSS</a></li>
            </ul>
        </div>
        <div class="one_third">
                <img style="width: 400px;" src="{{Storage::url($setting->logo)}}">
        </div>

        <!-- ################################################################################################ -->
    </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="/">{{$setting->title}}</a></p>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset("assets/home") }}/layout/scripts/jquery.min.js"></script>
<script src="{{ asset("assets/home") }}/layout/scripts/jquery.backtotop.js"></script>
<script src="{{ asset("assets/home") }}/layout/scripts/jquery.mobilemenu.js"></script>

