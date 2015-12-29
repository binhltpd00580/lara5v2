<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/pure-min.css')}}">
	<link rel="stylesheet" href="{{asset('css/side-menu.css')}}">
	<link rel="stylesheet" href="{{asset('css/wblog-backend.css')}}">
	<link rel="stylesheet" href="{{asset('css/materialdesignicons.min.css')}}" media="all">
	<script type="text/javascript" src="{{ asset('js/slug.js') }}"></script>
	

	<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
	<![endif]-->
	
	<!--[if gt IE 8]><!-->
	    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
	<!--<![endif]-->
	
</head>
<body>
	<div id="layout">

	<a href="#menu" id="menuLink" class="menu-link">
        <i class="mdi mdi-menu"></i>
    </a>

