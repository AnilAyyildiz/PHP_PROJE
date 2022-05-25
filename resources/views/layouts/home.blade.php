
<!DOCTYPE html>
<!--
Template Name: Wavefire
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{ asset("assets/home") }}/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

    @yield("css")
    @yield("js")
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

@include('home._header')
@yield("menu")
@yield("slider")
@yield("content")
@include("home._footer")
@yield("jss")

<link href="{{ asset("assets/home") }}/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>
    .gezinme ul li{
         float: left !important;
    }
    .gezinme ul .active {
        color:#1a202c !important;
    }
    .span6 {
        width: 100%;
        height: 30px !important;
        margin-bottom: 5px;
    }
</style>
</body>
</html>
