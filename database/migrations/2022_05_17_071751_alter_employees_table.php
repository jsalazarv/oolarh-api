<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('vacancy_id')
                ->after('id')
                ->nullable()
                ->constrained('vacancies')
                ->nullOnDelete();
            $table->enum('profile_status', ['complete', 'incomplete'])->nullable();
            $table->enum('employee_status', ['active', 'inactive'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_vacancy_id_foreign');
            $table->dropColumn('vacancy_id');
            $table->dropColumn('profile_status');
            $table->dropColumn('employee_status');
        });
    }
};
