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
            $table->bigIncrements('id');
            $table->enum('company_type', ['local', 'foreign']);
            $table->string('category');
            $table->string('laneguage');
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('phone');
            $table->string('company_code');
            $table->timestamps();
            // $table->enum('status', ['active', 'inactive']);

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
