<?php

use Illuminate\Database\Seeder;
use App\Product; // ! Product Model in use here ! //
use Faker\Generator as Faker; // ! Faker Generator here ! //


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	// # MODE 1: SEEDING from file /config/products.php # 
	// public function run()
    // {
	// 	$products = config('products');

	// 	foreach ($products as $product) {
	// 		$new_product = new Product();
	// 		$new_product['model'] 			= $product['model'];
	// 		$new_product['size'] 			= $product['size'];
	// 		$new_product['color'] 			= $product['color'];
	// 		$new_product['fabric'] 			= $product['fabric'];
	// 		$new_product['season'] 			= $product['season'];
	// 		$new_product['availability'] 	= $product['availability'];
	// 		$new_product['stock'] 			= $product['stock'];
	// 		$new_product->save(); // ! DB writing here ! 
	// 	}
    // }

	// # MODE 2: FAKING from fakerphp # 
	public function run(Faker $faker) 
	{
		for ($i = 0; $i < 30; $i++){
			$new_product = new Product();
			$new_product['model'] 			= $faker->word();
			$new_product['size'] 			= $faker->randomDigitNotNull();
			$new_product['color'] 			= $faker->colorName();
			$new_product['fabric'] 			= $faker->word();
			$new_product['season'] 			= $faker->randomElement(['summer', 'fall', 'winter', 'spring']);;
			$new_product['availability'] 	= $faker->numberBetween(0,1);
			$new_product['stock'] 			= $faker->randomNumber(2, false);
			$new_product->save(); // ! DB writing here ! 
		}
	}

}