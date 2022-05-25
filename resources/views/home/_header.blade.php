@php
    $setting=\App\Http\Controllers\HomeController::settinglist();

@endphp
<div class="wrapper row0">
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="one_quarter first">
            <img style="height: 60px;" src="/public/storage/images/5hFrvLZgiO8z54j1mMsWrxAqX1PX9lmXcoXhvIt7.jpg" alt="">
        </div>

        <div class="three_quarter">
            <ul class="nospace clear">
                <li class="one_third first">
                    <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Bizi arayın:</strong> {{$setting->phone}}</span></div>
                </li>
                <li class="one_third">
                    <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Mail ile ulaşın:</strong> {{$setting->email}}</span></div>
                </li>
                <li class="one_third">
                    <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Pzt. - Cmt.:</strong> 08.00am - 18.00pm</span></div>
                </li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </header>
</div>
