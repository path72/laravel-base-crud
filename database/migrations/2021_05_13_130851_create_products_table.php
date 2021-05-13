<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		/*
			db: laravel-base-crud-shop, table: products
			--------------------------------------------
			id 				NUMBER	INT			PK
			model			STRING	VARCHAR(20)	NOT NULL
			size			NUMBER	TINYINT 	NOT NULL
			color			STRING	VARCHAR(20)	NOT NULL
			fabric			STRING	VARCHAR(50)	NOT NULL
			availability	BOOLEAN	TINYINT 	NOT NULL
			stock			NUMBER	SMALLINT 	NOT NULL
			--------------------------------------------
		*/
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('model',20);
			$table->tinyInteger('size');
			$table->string('color',20);
			$table->string('fabric',50);
			$table->boolean('availability');
			$table->smallInteger('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
