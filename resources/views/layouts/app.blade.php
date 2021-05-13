<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- remote bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- main css -->
	<link rel="stylesheet" href="css/app.css">
	<!-- partial css -->
	@yield('css')

	<title>@yield('title') | laravel-base-crud</title>
</head>
<body>

	<!--------------------------------------------------------
	
	esercizio di oggi: Laravel Base Crud

	nome repo: laravel-base-crud

	1. Utilizzare il comando migration per definire la nostra tabella dresses 
		(cancellate pure dal DB shop quella fatta ieri).

	2. Definite il Controller DressController con il flag --resource.... 
		avrete così il vostro controller con la struttura CRUD predisposta.

	3. Definite il Model Dress per il collegamento al nostro DB

	4. Sviluppate la sezione vestiti (che conterrà l'elenco dei vestiti inseriti nel DB)

	5. Sviluppate la sezione dettaglio dove avremo il dettaglio del singolo vestito, come visto a lezione
	
	BONUS: parte grafica, potrete sbizzarrirvi con la fantasia ma solo quando tutto il crudismo che è in voi è stato soddisfatto

	--------------------------------------------------------->

	@include('partials.header')
	@yield('main_content')
	@include('partials.footer')

</body>
</html>