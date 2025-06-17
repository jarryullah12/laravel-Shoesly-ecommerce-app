<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGalleryColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('products', 'gallery2')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('gallery2')->nullable();
                $table->string('gallery3')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'gallery2')) {
                $table->dropColumn(['gallery2', 'gallery3']);
            }
        });
    }
}
