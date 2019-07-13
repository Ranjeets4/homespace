<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 if(!Schema::hasTable('homespace_demos')){
        Schema::create('homespace_demos', function (Blueprint $table) {
            $table->bigIncrements('demo_id');
			$table->string('demo_city');
			$table->string('demo_name');
			$table->integer('demo_value');
			$table->string('demo_checks');
			$table->string('demo_img');
			$table->tinyInteger('demo_status');
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
        Schema::dropIfExists('homespace_demo');
    }
}
