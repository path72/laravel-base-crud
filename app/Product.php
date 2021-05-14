<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * questi nomi di variabile sono vincolati al modello
	 * $table, $fillable
	 */

	/**
	 * customizzare nome tabella
	 * prescindendo dall'automatico plurale del nome del modello
	 */ 
	// protected $table = 'nome_custom_tabella';

	/**
	 * elenco campi in gestione al modello
	 * da usare nel controller associato 
	 * (es. metodo store())
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

	protected $pippo = '';
}
