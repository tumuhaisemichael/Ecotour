<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoPathToExperiencesTable extends Migration
{
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('category');
        });
    }

    public function down()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
}