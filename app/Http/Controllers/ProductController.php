<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Command\DumpCommand;
use App\Product; // ! model associato a tabella products ! //

class ProductController extends Controller
{
    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             INDEX             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
    {
		// all data from Model
		$products = Product::all();
		
		// # MODE 2: Model > whole data flow > compact() # 
		return view('products.index',compact('products'));
				
		// # MODE 1: Model > whole data flow > data pipe # 	
		// $data = [
		// 	'products' => $products
		// ];
        // return view('products.index',$data);
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %            CREATE             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('products.create');
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             STORE             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		/**
		 * validazione dati ricevuti dal form
		 * https://laravel.com/docs/7.x/validation
		 */
		$request->validate([
			'model'			=> 'required|max:20',
			'size'			=> 'required|numeric|max:25',
			'color'			=> 'required|max:20',
			'fabric'		=> 'required|max:50',
			'season'		=> 'required|max:50',
			'availability'	=> 'required|numeric|max:1',
			'stock'			=> 'required|numeric|max:50000'
		]);

		$data = $request->all();
		$new_product = new Product();

		// # MODE 2: fill() based on $fillable defined in the Model # 
		$new_product->fill($data);

		// # MODE 1: single table columns # 
		// $new_product->model 			= $data['model'];
		// $new_product->size 			= $data['size'];
		// $new_product->color 			= $data['color'];
		// $new_product->fabric 		= $data['fabric'];
		// $new_product->season 		= $data['season'];
		// $new_product->availability 	= $data['availability'];
		// $new_product->stock 			= $data['stock'];

		// @dump($new_product); // array values
		$new_product->save(); 	// ! DB writing here !
		// @dump($new_product); // db values (included id, timestamp)

		@dump(''); // altrimenti non mi funzia il redirect ???
		
		return redirect()->route('products.index');
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             SHOW              %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	// # MODE 3: Model > filtered by id data flow > compact() # 
	// public function show($id)
    // {
	// 	if ($id) {
	// 		$product = Product::find($id);
	// 		return view('products.show',compact('product'));
	// 	} else {
	// 		abort(404);
	// 	}
    // }
	// # MODE 2: Model instance id parameter = singole row data flow > data pipe # 
	/**
	 * 	qui $product è il nome del parametro in URI secondo route:list
	 * 	viene passata la singola entità (riga), 
	 *  non l'intero set di dati (tabella) 
	 */
	public function show(Product $product) 
    {
		$data = [
			'product' => $product
		];
		return view('products.show',$data);
    }
	// # MODE 1: Model > filtered by id data flow > data pipe # 
	// public function show($id)
    // {
	// 	$product = Product::find($id);
	// 	$data = [
	// 		'product' => $product
	// 	];
	// 	return view('products.show',$data);
    // }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             EDIT              %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	// # MODE 2 # 
	/**
	 * 	qui $product è il nome del parametro in URI secondo route:list
	 * 	viene passata la singola entità (riga), 
	 *  non l'intero set di dati (tabella) 
	 */
    public function edit(Product $product)
    {
		return view('products.edit',compact('product'));
    }
	// # MODE 1 # 
    // public function edit($id)
    // {
	// 	$product_update = Product::findOrFail($id);
	// 	@dd($product_update);
	// 	// return 'metodo edit su id='.$id;
    // }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %            UPDATE             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
		/**
		 * validazione dati ricevuti dal form
		 * https://laravel.com/docs/7.x/validation
		 */
		$request->validate([
			'model'			=> 'required|max:20',
			'size'			=> 'required|numeric|max:25',
			'color'			=> 'required|max:20',
			'fabric'		=> 'required|max:50',
			'season'		=> 'required|max:50',
			'availability'	=> 'required|numeric|max:1',
			'stock'			=> 'required|numeric|max:50000'
		]);

		$data = $request->all();
		$product->update($data);
		@dump('');
		return redirect()->route('products.index');
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %            DELETE             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
		$product->delete();
		return redirect()->route('products.index');
    }
}
