<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('phone')->after('id')->nullable();
            $table->string('discord')->after('id')->nullable();
            $table->string('messenger')->after('id')->nullable();
            $table->string('instagram')->after('id')->nullable();
            $table->string('twitter')->after('id')->nullable();
            $table->string('linkedin')->after('id')->nullable();
            $table->boolean('is_delegate')->after('id')->default(false);
            $table->foreignId('promotion_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'discord',
                'messenger',
                'instagram',
                'twitter',
                'linkedin',
                'is_delegate',
                'promotion_id',
            ]);
        });
    }
}
