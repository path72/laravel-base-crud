<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // ! QUESTO ! //

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		DB::table('products')->insert([
			[ 'model'=>'giuditta',  'size'=>9,  'color'=>'red',    'fabric'=>'cotton', 'availability'=>true,  'stock'=>10 ],
			[ 'model'=>'giuditta',  'size'=>10, 'color'=>'red',    'fabric'=>'cotton', 'availability'=>true,  'stock'=>15 ],
			[ 'model'=>'giuditta',  'size'=>11, 'color'=>'red',    'fabric'=>'cotton', 'availability'=>false, 'stock'=>1  ],
			[ 'model'=>'giuditta',  'size'=>9,  'color'=>'yellow', 'fabric'=>'cotton', 'availability'=>true,  'stock'=>10 ],
			[ 'model'=>'giuditta',  'size'=>10, 'color'=>'yellow', 'fabric'=>'cotton', 'availability'=>true,  'stock'=>15 ],
			[ 'model'=>'giuditta',  'size'=>11, 'color'=>'yellow', 'fabric'=>'cotton', 'availability'=>false, 'stock'=>1  ],
			[ 'model'=>'gelsomina', 'size'=>9,  'color'=>'red',    'fabric'=>'linen',  'availability'=>true,  'stock'=>10 ],
			[ 'model'=>'gelsomina', 'size'=>10, 'color'=>'red',    'fabric'=>'linen',  'availability'=>true,  'stock'=>15 ],
			[ 'model'=>'gelsomina', 'size'=>11, 'color'=>'red',    'fabric'=>'linen',  'availability'=>false, 'stock'=>1  ],
			[ 'model'=>'gelsomina', 'size'=>9,  'color'=>'yellow', 'fabric'=>'linen',  'availability'=>true,  'stock'=>10 ],
			[ 'model'=>'gelsomina', 'size'=>10, 'color'=>'yellow', 'fabric'=>'linen',  'availability'=>true,  'stock'=>15 ],
			[ 'model'=>'gelsomina', 'size'=>11, 'color'=>'yellow', 'fabric'=>'linen',  'availability'=>false, 'stock'=>1  ]
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('products')->delete();
    }
}
