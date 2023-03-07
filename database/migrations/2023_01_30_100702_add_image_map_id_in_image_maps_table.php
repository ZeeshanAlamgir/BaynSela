<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_maps', function (Blueprint $table) {
            if (Schema::hasColumn('image_maps', 'script')) //check the column
            {
                Schema::table('image_maps', function (Blueprint $table)
                {
                    $table->dropColumn('script'); //drop it
                });
            }

            $table->foreignId('image_map_load_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_maps', function (Blueprint $table) {
            $table->dropColumn('image_map_load_id');
        });
    }
};
