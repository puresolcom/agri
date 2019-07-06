<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('crop_type_id');
            $table->unsignedDecimal('area');
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->timestamps();

            // Foreign keys
            $table->foreign('crop_type_id')->references('id')->on('field_type')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field');
    }
}
