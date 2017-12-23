<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->increments('news_id');
            $table->text('news_title');
            $table->integer('category_id');
            $table->string('reporter_name', 150);
            $table->text('news_image');
            $table->string('news_placement',150);
            $table->text('news_short_description');
            $table->text('news_long_description');
            $table->tinyInteger('publication_status');
            $table->tinyInteger('hit_count');
            $table->timestamp('publication_date');
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
        Schema::dropIfExists('tbl_news');
    }
}
