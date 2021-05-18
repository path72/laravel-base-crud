<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * system defined variable names
	 * $table, $fillable
	 */

	/**
	 * table custom name
	 * (no Model<->models auto naming convention)
	 */ 
	// protected $table = 'table_custom_name';

	/**
	 * Allowing mass fillable properties in Model
	 * 
	 * One bulk action in Controller:
	 * 		$product->update($data);
	 */
	protected $fillable = [
		'model',
		'size',
		'color',
		'fabric',
		'season',
		'availability',
		'stock'
	];
}
