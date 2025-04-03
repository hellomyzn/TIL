<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimplenoteMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simplenote_memos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content');
            $table->unsignedBigInteger('simplenote_user_id')->constrained()->cascadeOnDelete();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('simplenote_memos');
    }
}
