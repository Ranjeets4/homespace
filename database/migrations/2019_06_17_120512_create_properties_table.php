<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('homespace_properties')){
			
			Schema::create('homespace_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('price');
			$table->String('build_Area');
			$table->String('lot_area');
			$table->String('property_agent');
			$table->String('description');
			$table->String('address');
			$table->integer('bedroom');
			$table->integer('bathroom');
			$table->integer('floor');
			$table->integer('kitchen');
			$table->integer('garage');
			$table->String('location_id');
			$table->String('property-type');
			$table->String('propertystatus');
			$table->String('propertytypestatus');
			$table->String('status');
						
			
            $table->timestamps();
        });
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
