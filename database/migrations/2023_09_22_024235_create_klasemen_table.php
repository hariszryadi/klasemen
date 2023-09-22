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
        Schema::create('klasemen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klub_id');
            $table->integer('bermain')->default(0);
            $table->integer('menang')->default(0);
            $table->integer('seri')->default(0);
            $table->integer('kalah')->default(0);
            $table->integer('gol_masuk')->default(0);
            $table->integer('gol_kebobolan')->default(0);
            $table->integer('poin')->default(0);
            $table->timestamps();

            $table->foreign('klub_id')->references('id')->on('klub')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasemen');
    }
};
