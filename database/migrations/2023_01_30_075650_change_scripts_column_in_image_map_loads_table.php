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
        Schema::table('image_map_loads', function (Blueprint $table) {
            if (Schema::hasColumn('image_map_loads', 'scripts')) //check the column
            {
                Schema::table('image_map_loads', function (Blueprint $table)
                {
                    $table->dropColumn('scripts'); //drop it
                });
            }
            $table->json('script')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_map_loads', function (Blueprint $table) {
            $table->dropColumn('script');
        });
    }
};
