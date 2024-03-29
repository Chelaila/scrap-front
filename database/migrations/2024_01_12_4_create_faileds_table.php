<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedsTable extends Migration
{
    public function up()
    {
        Schema::create('faileds', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('faileds');
    }
}
