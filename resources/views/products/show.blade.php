@extends('layouts.app')
@section('css')
	<link rel="stylesheet" href="../css/app.css">
@endsection

@section('title','Product Page')
@section('main_content')

<main>
	
	@php $class=''; @endphp
	@if ($product->availability==0) 
	@php $class='grey'; @endphp
	@endif
	
	<h3 class="{{$class}}">Model {{$product['model']}}</h3>

	<div class="card">
		<p>id: {{$product['id']}}</p>
		<p>size: {{$product['size']}}</p>
		<p>color: {{$product['color']}}</p>
		<p>fabric: {{$product['fabric']}}</p>
		<p>stock: {{$product['stock']}}</p>
		@php
			if ($product['availability']==1) $msg = 'Yes';
			else $msg = 'No';
		@endphp
		<p>Available: {{$msg}}</p>
	</div>
</main>

@endsection