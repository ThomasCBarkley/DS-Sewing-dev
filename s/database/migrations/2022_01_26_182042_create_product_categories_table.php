<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('product_categories')->insert([
                [
                    'parent_id' => 0,
                    'slug' => 'truck_acc',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'parent_id' => 0,
                    'slug' => 'light_truck',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'parent_id' => 2,
                    'slug' => 'crossbody_toolboxes',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'parent_id' => 2,
                    'slug' => 'utility_racks',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'parent_id' => 2,
                    'slug' => 'utility_chest_boxes',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'parent_id' => 2,
                    'slug' => 'headache_racks',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'parent_id' => 2,
                    'slug' => 'options_accessories',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
