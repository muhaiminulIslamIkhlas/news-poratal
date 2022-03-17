<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_bangla');
            $table->string('sub_title');
            $table->string('sub_title_bangla');
            $table->text('details');
            $table->text('details_bangla');
            $table->string('ticker')->nullable();
            $table->string('ticker_bangla')->nullable();
            $table->string('keyword')->nullable();
            $table->bigInteger('category_id');
            $table->integer('order')->nullable();
            $table->string('image')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('news');
    }
}
