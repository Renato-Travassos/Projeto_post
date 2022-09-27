<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); 
            $table->string('nome');
            $table->string('comentário', 255)->nullable();
            $table->string('descrição', 255)->nullable();
            $table->double('nota',3,2);
            $table->string('image')->nullable();        
            $table->json('tipos');
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
           
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        Schema::dropIfExists('posts');
    }
}
