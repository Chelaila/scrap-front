<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('provider_id');
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
