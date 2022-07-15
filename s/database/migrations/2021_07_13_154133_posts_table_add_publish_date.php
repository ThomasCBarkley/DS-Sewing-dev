<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsTableAddPublishDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->date('publish_at')
                ->after('body')
                ->nullable();

            $table->index('publish_at', 'posts_publish_at_index');

        });

        DB::table('posts')
            ->update([
                "publish_at" => DB::raw("GETDATE()-2")
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_publish_at_index');
            $table->dropColumn('publish_at');
        });
    }
}
