<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClientsTableRemoveContactsAddFields extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('contacts');  // Remove old column
            $table->string('country')->nullable()->after('city');
            $table->string('website')->nullable()->after('country');
            $table->string('email')->unique()->nullable()->after('website');  // Unique to prevent duplicates
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->json('contacts')->nullable();  // Restore if rolling back
            $table->dropColumn(['country', 'website', 'email']);
        });
    }
}