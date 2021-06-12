<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('tests')){
            Schema::table('tests', function (Blueprint $table){
                $table->text('name')->nullable(true);
                $table->text('photo');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('tests')){
            Schema::table('tests', function (Blueprint $table){
                $table->removeColumn('name');
                $table->removeColumn('photo');
            });
        }
    }
}
