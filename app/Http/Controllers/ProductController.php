<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // ! Product Model in use here ! //

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

		// # MODE 1 # 
        return view('products.index',compact('products'));

		// # MODE 2 # 
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
		 * form data validation
		 * https://laravel.com/docs/7.x/validation
		 * errors shown in edit page
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

		// # MODE 2: mass fillable properties based on $fillable in Model # 
		$new_product->fill($data);

		// # MODE 1: single table columns # 
		// $new_product->model 			= $data['model'];
		// $new_product->size 			= $data['size'];
		// $new_product->color 			= $data['color'];
		// $new_product->fabric 		= $data['fabric'];
		// $new_product->season 		= $data['season'];
		// $new_product->availability 	= $data['availability'];
		// $new_product->stock 			= $data['stock'];

		// @dump($new_product); // just array values
		$new_product->save(); 	// ! DB writing here !
		// @dump($new_product); // db values (included id, timestamp)

		@dump(''); // ! ??? ! //
		
		return redirect()->route('products.index', $new_product);
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
	// # MODE 2: single Model record #
	/**
	 * 	! $product is here the URI parameter defined in route:list !
	 * 	single Model record is passed (DB table row)	
	 */
	public function show(Product $product) 
    {
		return view('products.show',compact('product'));
    }
	// # MODE 1: Model data filtered by id #
    // public function show($id)
    // {
	// 	// data filter by id
	// 	$product = Product::find($id);
    //     return view('products.show',compact('product'));
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
	 * 	! $product is here the URI parameter defined in route:list !
	 * 	single Model record is passed (DB table row)	
	 */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
	// # MODE 1 # 
    // public function edit($id)
    // {
	// 	$product = Product::findOrFail($id);
    //     return view('products.edit',compact('product'));
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
		 * form data validation
		 * https://laravel.com/docs/7.x/validation
		 * errors shown in edit page
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

		@dump(''); // ! ??? ! //

		return redirect()->route('products.index', $product);
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %            DESTROY            %
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
