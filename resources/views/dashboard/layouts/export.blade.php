<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">

<head>
    <title>@yield('title') - Unicomer Online Statement</title>
    @include('dashboard.includes.head.pages')
</head>

<style type="text/css">

	@page { margin: 0; }

</style>

<body>
	<div class="wrapper"> 
		@yield('content') 
	</div>
</body>

</html>
