<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTablePostTagAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
           {
               Schema::rename('post_tags', 'post_tag');

               Schema::table('post_tag', function (Blueprint $table) {

                   $table->unsignedBigInteger('post_id')->change();
                   $table->unsignedBigInteger('tag_id')->change();
               });

        Schema::table('post_tag', function (Blueprint $table) {

            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post-tags', function (Blueprint $table) {

            $table->dropForeign(['post_id',
                'tag_id']);
        });

    }
}
