<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('master.includes.head')    
</head>
<body>    
	@yield('css')
	@include('master.includes.header')
    <div class=" container py-4">
    	@yield('content')
    	@include('master.includes.footer')
    	@yield('js')
    </div>
</body>