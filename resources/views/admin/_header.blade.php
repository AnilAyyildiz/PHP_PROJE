<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        @auth()
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{Auth::user()->name}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li>
                <li><a href="{{route("logout")}}"><i class="icon-key"></i> Log Out</a></li>

            </ul>
        </li>




        @endauth
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">{{App\Http\Controllers\Admin\HomeController::countmessage()}}</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sInbox" title="" href="{{route("admin_message")}}"><i class="icon-envelope"></i> inbox</a></li>
            </ul>
        </li>
        </ul>

</div>

