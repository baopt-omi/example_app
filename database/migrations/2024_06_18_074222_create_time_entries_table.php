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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->integer('entryID');
            $table->string('projectName');
            $table->integer('issueID');
            $table->string('user');
            $table->string('activity');
            $table->decimal('hours')->default(0);
            $table->string('comments')->nullable();
            $table->date('spentOn');
            $table->dateTime('createdOn');
            $table->dateTime('updatedOn');
            $table->string('tcH')->nullable();
            $table->string('tcM')->nullable();
            $table->string('tcL')->nullable();
            $table->string('tcP')->nullable();
            $table->string('tcF')->nullable();
            $table->string('tcPen')->nullable();
            $table->string('tcU')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
