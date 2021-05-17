@extends('layouts.app')

@section('title','All Products')
@section('main_content')

{{-- 
	READ -> index()
	all Model data (whole DB table) are available here  
	via ModelController@index
--}}
{{-- @dump($products) --}}

<main>

	@php $keys = array_keys($products->first()->toArray()); @endphp

	<h3>All Products</h3>
	
	<!--
		CREATE (laravel method: GET)
	-->
	<a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>

	<div class="grid">
		@foreach ($products as $product)
			<div class="card">

				@php
					$class='';
					if ($product['availability']==0) $class='grey';
				@endphp
				
				<h4 class="{{$class}}">{{$product['model']}}</h4>

				<table class="{{$class}}">
					@foreach ($keys as $key)
						@if ($key != 'id' && $key != 'created_at' && $key != 'updated_at')
							<tr><td>{{$key}}</td><td>{{$product[$key]}}</td></tr>
						@endif
					@endforeach
				</table>
				<div class="actions">
					<!--
						SHOW (laravel method: GET) 
					-->
					<a href="{{route('products.show',['product'=>$product['id']])}}"><button type="button" class="btn btn-info">Info</button></a>
					<!--
						EDIT (laravel method: GET)
					-->
					<a href="{{route('products.edit',['product'=>$product['id']])}}"><button type="button" class="btn btn-warning">Edit</button></a>
					<!--
						non posso usare link <a> che usa GET per chiamare ProductController, raggiungendo @index
						per chiamare @destroy di PriductController serve method DELETE (vedi route:list), 
						allora introduco form

						DELETE (laravel method: DELETE, html method: POST)
					-->
					<form action="{{route('products.destroy',['product'=>$product['id']])}}" method="post">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</div>
				
			</div>
		@endforeach
	</div>
	
	
	<h4>DATA STRUCTURE ANALYSIS</h4>
	@php
		$products_array = $products->toArray();
		$item_model     = $products->first();
		$item_array     = $item_model->toArray();
	@endphp
	
	<div class="analysis">
		<div class="card">
			<div>
				<p>Collection = array of Product-model</p>
				<p>(one table row inside each Product-model)</p>
				@dump($products)
			</div>
			<div>
				<p>Collection-model first item = Product-model</p>
				<p>(table first row values inside Product-model)</p>
				@dump($item_model)
			</div>
		</div>
		<div class="card">
			<div>
				<p>Collection -> toArray() = array of arrays of table row values</p>
				<p>just DB data, no laravel structure</p>
				@dump($products_array)
			</div>
			<div>
				<p>Product-model -> toArray() = arrays of table first row values</p>
				<p>just DB data (first row), no laravel structure</p>
				@dump($item_array)
			</div>
		</div>
	</div>
	
</main>

@endsection	