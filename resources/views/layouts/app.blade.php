<!DOCTYPE html>
<!-- posso indicare direttamente la lingua qua -->
{{-- <html lang="it">  --}}
<!-- oppure fare riferimento al gestore apposito -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- remote bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}"> <!-- href="css/app.css"> non funziona ovunque -->
	<!-- partial css -->
	@yield('css')

	<title>@yield('title') | laravel-base-crud</title>
</head>
<body>

	@include('partials.header')
	@yield('main_content')
	@include('partials.footer')

</body>
</html>