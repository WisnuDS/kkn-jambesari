<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('requirement_id');
            $table->unsignedBigInteger('citizen_id');
            $table->timestamps();
            $table->softDeletes();

            // Relation
            $table->foreign('requirement_id')->on('requirements')->references('id');
            $table->foreign('citizen_id')->on('citizens')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
