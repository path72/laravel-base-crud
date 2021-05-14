@extends('layouts.app')

@section('title','New Product')
@section('main_content')

<main>

	<div class="card">

		{{-- rotta e metodo --}}
		<form action="{{route('products.store')}}" method="post">

			{{-- istruzioni laravel necessarie --}}
			@csrf
			@method('POST')

			{{-- ! input name = nome colonna DB ! --}}
			<div class="form-group row">
				<input type="text" class="form-control" name="model" placeholder="Model">	
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" name="size" placeholder="Size">	
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" name="color" placeholder="Color">	
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" name="fabric" placeholder="Fabric">	
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" name="season" placeholder="Season">	
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" name="availability" placeholder="Availability">	
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" name="stock" placeholder="Stock">	
			</div>
			
			<input type="submit"  class="btn btn-primary" value="Inserisci">

		</form>

	</div>

</main>

@endsection