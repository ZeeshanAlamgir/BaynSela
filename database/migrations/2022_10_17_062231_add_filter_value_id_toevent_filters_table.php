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
        Schema::table('event_filters', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_value_id');
            $table->foreign('filter_value_id')->references('id')->on('filter_values')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_filters', function (Blueprint $table) {
            $table->dropColumn('filter_value_id');
        });
    }
};
