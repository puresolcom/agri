<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsProcessedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_processed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('field_id');
            $table->unsignedInteger('tractor_id');
            $table->unsignedDecimal('processed_area');
            $table->boolean('approved')->default(0);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('approved_by')->nullable()->default(null);
            $table->timestamps();

            // Foreign keys
            $table->foreign('field_id')->references('id')->on('field')->onDelete('cascade');
            $table->foreign('tractor_id')->references('id')->on('tractor')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields_processed');
    }
}
