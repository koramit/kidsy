<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegistrySyncedToBiopsyCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            $table->boolean('registry_synced')->default(false)->after('h_adm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            $table->dropColumn('registry_synced');
        });
    }
}
