<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 if(!Schema::hasTable('homespace_property-types')){
        Schema::create('homespace_property-types', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('Title');
			$table->string('short_Description');
			$table->string('slug');
			
			
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
        Schema::dropIfExists('property-types');
    }
}
