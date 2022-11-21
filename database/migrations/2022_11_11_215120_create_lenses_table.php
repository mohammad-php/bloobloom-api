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
        Schema::create('lenses', function (Blueprint $table) {
            $table->id();
            $table->string('colour');
            $table->text('description');
            $table->enum('prescription_type', ['fashion', 'single_vision', 'varifocal']);
            $table->enum('lens_type', ['classic', 'blue_light', 'transition']);
            $table->integer('stock');
            $table->float('price', 12, 2);
            $table->enum('currency', ['USD', 'GBP', 'EUR', 'JOD', 'JPY']);
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
        Schema::dropIfExists('lenses');
    }
};
