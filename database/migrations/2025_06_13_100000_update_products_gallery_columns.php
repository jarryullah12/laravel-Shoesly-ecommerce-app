<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsGalleryColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop existing gallery columns if they exist
            $columns = ['gallery', 'gallery2', 'gallery3'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }

            // Add the gallery columns fresh
            $table->string('gallery')->nullable();
            $table->string('gallery2')->nullable();
            $table->string('gallery3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['gallery', 'gallery2', 'gallery3']);
        });
    }
}
