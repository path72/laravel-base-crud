@extends('layouts.app')

@section('title','Product Detail')
@section('main_content')

{{-- 
	READ -> show()
	single Model record (DB table row) is available here  
	via ModelController@show
--}}
{{-- @dump($product) --}}

<main>

	@php 
		$keys  = array_keys($product->toArray());
		$class = '';
		$msg   = 'Yes';
		if ($product->availability==0) {
			$class = 'grey';
			$msg   = 'No';
		}
	@endphp

	<h3 class="{{$class}}">Model {{$product['model']}}</h3>

	<table class="card">
		@foreach ($keys as $key)
			@if ($key != 'availability' && $key != 'created_at' && $key != 'updated_at')
				<tr><td>{{$key}}</td><td>{{$product[$key]}}</td></tr>
			@endif
		@endforeach
		<tr><td>available</td><td>{{$msg}}</td></tr>
	</table>

</main>

@endsection	