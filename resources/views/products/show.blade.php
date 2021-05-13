@extends('layouts.app')
@section('css')
	<link rel="stylesheet" href="../css/app.css">
@endsection

@section('title','Product Page')
@section('main_content')

<main>
	<h3>Product {{$product['model']}}</h3>

	<div class="card">
		<p>id: {{$product['id']}}</p>
		<p>Size: {{$product['size']}}</p>
		<p>Color: {{$product['color']}}</p>
		<p>Fabric: {{$product['fabric']}}</p>
		<p>Stock: {{$product['stock']}}</p>
		@php
			if ($product['availability']==1) $msg = 'Yes';
			else $msg = 'No';
		@endphp
		<p>Available: {{$msg}}</p>
	</div>
</main>

@endsection