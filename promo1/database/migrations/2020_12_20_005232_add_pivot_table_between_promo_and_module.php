<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPivotTableBetweenPromoAndModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_promo', function (Blueprint $table) {
            $table->id();

            $table->integer("promo_id");
            $table->integer("module_id");

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
        Schema::dropIfExists('pivot_promo_modules');
        Schema::dropIfExists('promo_module');
        Schema::dropIfExists('module_promo');
    }
}
