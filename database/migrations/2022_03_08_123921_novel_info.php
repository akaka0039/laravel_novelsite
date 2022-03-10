<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NovelInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novel_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('novel_id')
                ->foreignId('novel_id')
                ->unsigned()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('sentence');
            $table->integer('page');
            $table->integer('type')->nullable();
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
    }
}
