@extends('layouts.app')

@section('title','Product Page')
@section('main_content')

	<div class="card">
		<h3>Product {{$product['model']}}</h3>
	
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

@endsection