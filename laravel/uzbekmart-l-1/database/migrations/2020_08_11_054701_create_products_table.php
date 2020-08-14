<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('tag_id');
            $table->string('name_en', 300);
            $table->string('name_uz', 300);
            $table->string('name_ru', 300);
            $table->string('slug_en', 300)->unique();
            $table->longText('desc_en');
            $table->longText('desc_uz');
            $table->longText('desc_ru');
            $table->string('image', 300);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
