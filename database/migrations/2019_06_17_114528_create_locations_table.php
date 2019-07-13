<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 if(!Schema::hasTable('homespace_locations')){
        Schema::create('homespace_locations', function (Blueprint $table) {
            $table->bigIncrements('location_id');
			$table->string('Title');
			$table->string('location');
			
			
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
        Schema::dropIfExists('locations');
    }
}
