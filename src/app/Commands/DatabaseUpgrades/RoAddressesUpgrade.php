<?php

namespace LaravelEnso\Core\app\Commands\DatabaseUpgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoAddressesUpgrade extends DatabaseUpgrade
{
    protected function isMigrated()
    {
        return ! Schema::hasColumn('created_by', 'counties');
    }

    protected function migrateTable()
    {
        Schema::table('counties', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });

        Schema::table('localities', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
}
