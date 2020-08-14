<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title_en', 300);
            $table->string('title_uz', 300);
            $table->string('title_ru', 300);
            $table->string('slug_en', 300)->unique();
            $table->string('address_en');
            $table->string('address_uz');
            $table->string('address_ru');
            $table->char('amount', 20);
            $table->char('avaragepower_en', 50);
            $table->char('avaragepower_uz', 50);
            $table->char('avaragepower_ru', 50);
            $table->char('iir', 10);
            $table->char('npv', 20);
            $table->char('payback', 10);
            $table->char('workplaces', 10);
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
        Schema::dropIfExists('investments');
    }
}
