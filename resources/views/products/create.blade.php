@extends('layouts.app')

@section('title','Product Edit')
@section('main_content')

{{-- 
	CREATE -> create()
	no Model data available here  
	via ModelController@create
--}}

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

		<!--
			STORE (laravel method: POST, html method: POST)
		-->
		<form action="{{route('products.store')}}" method="post">

			@csrf 			{{-- token laravel --}}
			@method('POST') {{-- POST: inserimento record in DB --}}

			<div class="db_columns">
				{{-- ! input name = nome colonna DB ! --}}
				<div class="form-group row">
					<label>Model</label>
					<input type="text" class="form-control" name="model" placeholder="Model">	
				</div>
				<div class="form-group row">
					<label>Size</label>
					<input type="number" class="form-control" name="size" placeholder="Size">	
				</div>
				<div class="form-group row">
					<label>Color</label>
					<input type="text" class="form-control" name="color" placeholder="Color">	
				</div>
				<div class="form-group row">
					<label>Fabric</label>
					<input type="text" class="form-control" name="fabric" placeholder="Fabric">	
				</div>
				<div class="form-group row">
					<label>Season</label>
					<select class="form-control" name="season">
						<option value="">Season</option>	
						<option value="summer">Summer</option>	
						<option value="spring">Spring</option>	
						<option value="fall">Fall</option>	
						<option value="winter">Winter</option>	
					</select>	
				</div>
				<div class="form-group row">
					<label>Availability</label>
					<input type="number" class="form-control" name="availability" placeholder="Availability">	
				</div>
				<div class="form-group row">
					<label>Stock</label>
					<input type="number" class="form-control" name="stock" placeholder="Stock">	
				</div>
			</div>
			
			<input type="submit"  class="btn btn-primary" value="Inserisci">

		</form>

	</div>

</main>

@endsection