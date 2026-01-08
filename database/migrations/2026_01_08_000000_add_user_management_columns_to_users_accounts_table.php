<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users_accounts', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('users_accounts', 'role')) {
                $table->string('role')->default('user');
            }
            if (!Schema::hasColumn('users_accounts', 'is_suspended')) {
                $table->boolean('is_suspended')->default(false);
            }
            if (!Schema::hasColumn('users_accounts', 'suspension_note')) {
                $table->text('suspension_note')->nullable();
            }
            if (!Schema::hasColumn('users_accounts', 'suspended_until')) {
                $table->timestamp('suspended_until')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_accounts', function (Blueprint $table) {
            // Drop columns if they exist
            if (Schema::hasColumn('users_accounts', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users_accounts', 'is_suspended')) {
                $table->dropColumn('is_suspended');
            }
            if (Schema::hasColumn('users_accounts', 'suspension_note')) {
                $table->dropColumn('suspension_note');
            }
            if (Schema::hasColumn('users_accounts', 'suspended_until')) {
                $table->dropColumn('suspended_until');
            }
        });
    }
};
