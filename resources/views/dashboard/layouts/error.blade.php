<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">

<head>
    <title>@yield('title') - Unicomer Online Statement</title>
    @include('dashboard.includes.head.auth')
    @include('dashboard.includes.style.pages')
</head>

<body class="fullpage">
    @yield('content')
    @include('dashboard.includes.script.pages')
</body>

</html>
