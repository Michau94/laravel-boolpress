<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // crezione colonna 
            $table->unsignedBigInteger('category_id')->after('id')->nullable();

            // definizione relazione

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //eliminare prima vincolo 
            $table->dropForeign('posts_category_id_foreign');

            //drop colonna

            $table->dropColumn('category_id');
        });
    }
}
