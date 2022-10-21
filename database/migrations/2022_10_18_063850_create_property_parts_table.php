<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_parts', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('type_id')->nullable();
            $table->bigInteger('cadastral_designation');
            $table->float('area_ha');
            $table->date('measured_at');
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
        Schema::dropIfExists('property_parts');
    }
};
