@extends('layouts.app')

@section('title','Products')
@section('main_content')

<main>

	@php $keys = array_keys($products->first()->toArray()); @endphp

	<h3>All Products</h3>
	
	<div class="grid">
		@foreach ($products as $product)
			<div class="card">

				@php $class=''; @endphp
				@if ($product->availability==0) 
					@php $class='grey'; @endphp
				@endif
				
				<h4 class="{{$class}}">{{$product['model']}}</h4>

				<table class="{{$class}}">
					@foreach ($keys as $key)
						@if ($key != 'id' && $key != 'created_at' && $key != 'updated_at')
							<tr><td>{{$key}}</td><td>{{$product[$key]}}</td></tr>
						@endif
					@endforeach
				</table>
				<a href="{{route('products.show',['product'=>$product['id']])}}"><button type="button" class="btn btn-info">Info</button></a>
				
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
				<p>Collection-model = array of Product-model</p>
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
				<p>array of arrays of table row values</p>
				<p>(Collection-model -> toArray())</p>
				@dump($products_array)
			</div>
			<div>
				<p>arrays of table first row values</p>
				<p>(Product-model -> toArray())</p>
				@dump($item_array)
			</div>
		</div>
	</div>
	
</main>

@endsection