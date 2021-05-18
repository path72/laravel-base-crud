@extends('layouts.app')

@section('title','Product Edit')
@section('main_content')

{{-- 
	CREATE -> create()
	no Model data available here  
	via ModelController@create
--}}

<main>

	{{-- VALIDATION error management --}}
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
				{{-- old() trattengo i valori precedenti in caso di mancata validazione (in variabili d'ambiante) --}}
				<div class="form-group row">
					<label>Model</label>
					<input type="text" class="form-control" name="model" placeholder="Model" value="{{old('model')}}">	
				</div>
				<div class="form-group row">
					<label>Size</label>
					<input type="number" class="form-control" name="size" placeholder="Size" value="{{old('size')}}">	
				</div>
				<div class="form-group row">
					<label>Color</label>
					<input type="text" class="form-control" name="color" placeholder="Color" value="{{old('color')}}">	
				</div>
				<div class="form-group row">
					<label>Fabric</label>
					<input type="text" class="form-control" name="fabric" placeholder="Fabric" value="{{old('fabric')}}">	
				</div>
				<div class="form-group row">
					<label>Season</label>
					<select class="form-control" name="season">
						<option value="">-- choose --</option>	
						<option value="summer" 	{{old('season')=='summer'?'selected':''}}>Summer</option>	
						<option value="spring"	{{old('season')=='spring'?'selected':''}}>Spring</option>	
						<option value="fall"	{{old('season')=='fall'?'selected':''}}>Fall</option>	
						<option value="winter"	{{old('season')=='winter'?'selected':''}}>Winter</option>
					</select>	
				</div>
				<div class="form-group row">
					<label>Availability</label>
					<select class="form-control" name="availability">
						<option value="">-- choose --</option>	
						<option value="1" {{old('availability')=="1"?'selected':''}}>Yes</option>	
						<option value="0" {{old('availability')=="0"?'selected':''}}>No</option>	
					</select>				
				</div>
				<div class="form-group row">
					<label>Stock</label>
					<input type="number" class="form-control" name="stock" placeholder="Stock" value="{{old('stock')}}">	
				</div>
			</div>
			
			<input type="submit"  class="btn btn-primary" value="Inserisci">

		</form>

	</div>

</main>

@endsection