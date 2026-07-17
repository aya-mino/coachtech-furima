<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'postal_code')) {
                $table->string('postal_code')->nullable()->after('name');
            }

            if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable()->after('postal_code');
            }

            if (!Schema::hasColumn('users', 'building')) {
                $table->string('building')->nullable()->after('address');
            }

            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image')->nullable()->after('building');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'postal_code',
                'address',
                'building',
                'image',
            ]);
        });
    }
}
