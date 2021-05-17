@extends('layouts.app')

@section('title','Edit Product')
@section('main_content')

<main>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="card">

		{{-- rotta e metodo html post (fisso per create, edit) --}}
		<!--
			STORE (laravel method: PUT, html method: POST)
		-->
		<form action="{{route('products.update',$product->id)}}" method="post">

			@csrf 			{{-- token laravel --}}
			@method('PUT')	{{-- PUT: modifica intero record in DB // PATCH: modifica singola colonna --}}

			<div class="db_columns">
				{{-- ! input name = nome colonna DB ! --}}
				<div class="form-group row">
					<label>Model</label>
					<input type="text" class="form-control" name="model" placeholder="Model" value="{{$product['model']}}">	
				</div>
				<div class="form-group row">
					<label>Size</label>
					<input type="text" class="form-control" name="size" placeholder="Size" value="{{$product['size']}}">	
				</div>
				<div class="form-group row">
					<label>Color</label>
					<input type="text" class="form-control" name="color" placeholder="Color" value="{{$product['color']}}">	
				</div>
				<div class="form-group row">
					<label>Fabric</label>
					<input type="text" class="form-control" name="fabric" placeholder="Fabric" value="{{$product['fabric']}}">	
				</div>
				<div class="form-group row">
					<label>Season</label>
					<select class="form-control" name="season">
						<option value="">Season</option>
						<option value="summer" 	{{$product['season']=='summer'?'selected':''}}>Summer</option>	
						<option value="spring"	{{$product['season']=='spring'?'selected':''}}>Spring</option>	
						<option value="fall"	{{$product['season']=='fall'?'selected':''}}>Fall</option>	
						<option value="winter"	{{$product['season']=='winter'?'selected':''}}>Winter</option>	
					</select>	
				</div>
				<div class="form-group row">
					<label>Availability</label>
					<input type="text" class="form-control" name="availability" placeholder="Availability" value="{{$product['availability']}}">	
				</div>
				<div class="form-group row">
					<label>Stock</label>
					<input type="text" class="form-control" name="stock" placeholder="Stock" value="{{$product['stock']}}">	
				</div>
			</div>

			<input type="submit"  class="btn btn-primary" value="Aggiorna">

		</form>

	</div>

</main>

@endsection