<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickthroughsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clickthroughs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('short_link_id');
            $table->timestamp('visited_at');
            $table->string('city');
            $table->string('country');
            $table->string('browser');
            $table->string('os');
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
        Schema::dropIfExists('clickthroughs');
    }
}
