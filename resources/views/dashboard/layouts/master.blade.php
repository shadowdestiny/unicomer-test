<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">

<head>
    <title>@yield('title') - Unicomer Online Statement</title>
    @include('dashboard.includes.head.pages')
    @include('dashboard.includes.style.pages')
</head>

<body>
	<div class="wrapper"> @yield('content') </div>
    @include('dashboard.includes.script.pages')
</body>

</html>
