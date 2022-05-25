<!DOCTYPE html>
<html lang="">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset("assets/admin")}}/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="{{asset("assets/admin")}}/css/matrix-style.css" />
    <link rel="stylesheet" href="{{asset("assets/admin")}}/css/matrix-media.css" />
    <link href="{{asset("assets/admin")}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    @yield("css")
    @yield("js")
</head>
<body>
@include("admin._header")
@include("admin._sidebar")

@yield('content')

@include("admin._footer")
@yield("css_end")
@yield("js_end")



</body>
</html>
