<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableImpressionsAddForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('impressions', function (Blueprint $table) {

            $table->foreign('user_id')->referenses('id')->on('users');
            $table->foreign('post_id')->referenses('id')->on('posts');
         });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('impressions', function (Blueprint $table) {

           $table->dropForeign(['user_id',
               'post_id']);
        });

    }
}
