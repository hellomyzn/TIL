<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagIdToSimplenoteMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('simplenote_memos', function (Blueprint $table) {
            $table->unsignedBigInteger('simplenote_tag_id')->nullable()->after('simplenote_user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('simplenote_memos', function (Blueprint $table) {
            $table->dropColumn('simplenote_tag_id');
        });
    }
}
