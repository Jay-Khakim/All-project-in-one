<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tag_id');
            $table->enum('companytype', ["local",""]);
            $table->string('name_en', 300);
            $table->string('name_uz', 300);
            $table->string('name_ru', 300);
            $table->string('slug_en', 300)->unique();
            $table->longText('desc_en');
            $table->longText('desc_uz');
            $table->longText('desc_ru');
            $table->enum('status', ["active",""]);
            $table->string('image', 300);
            $table->string('web');
            $table->string('email', 100);
            $table->char('phone', 20);
            $table->string('address_en');
            $table->string('address_uz');
            $table->string('address_ru');
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
        Schema::dropIfExists('companies');
    }
}
