<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public const LAND_TYPES = [
        'lauksaimniecības zeme',
        'meža zeme',
        'zeme zem ūdeņiem',
        'apbūves platība',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });

        foreach (self::LAND_TYPES as $type) {
            DB::table('types')->insert(
                [
                    'type' => $type,
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
};
