<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('img_path')->default('img/default_profile_picture.png');
            $table->string('name');
            $table->string('email');
            $table->text('content');
            $table->foreignId('article_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comments', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropColumn(['article_id']);
        });
    }
}
