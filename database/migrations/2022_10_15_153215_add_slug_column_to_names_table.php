<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumnToNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('names', function (Blueprint $table) {
            $table->string('slug')->after('name')->nullable()->unique();
            $table->longText('variations')->nullable();
            $table->unsignedInteger('name_id')->nullable();

            $table->foreign('name_id')->references('id')->on('names');
            $table->longText('famous')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('names', function (Blueprint $table) {
            //
        });
    }
}
