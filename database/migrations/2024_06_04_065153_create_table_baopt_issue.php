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
        Schema::create('issues', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('issueID');
            $table->string('projectName');
            $table->string('trackerName');
            $table->string('statusName');
            $table->string('priorityName');
            $table->string('authorName')->nullable();
            $table->string('assigneeName')->nullable();
            $table->string('Subject');
            $table->string('Description')->default('"blank"');
            $table->date('startDate')->nullable();
            $table->date('dueDate')->nullable();
            $table->decimal("doneRatio")->default(0);
            $table->boolean('isPrivate');
            $table->float('estimatedHours')->default(0)->nullable();
//            $table->decimal("totalEstimatedHours")->default(0);
//            $table->decimal("spentHours")->default(0);
//            $table->decimal("totalSpentHours")->default(0);
            $table->date('actualStartDate')->nullable();
            $table->date('actualEndDate')->nullable();
            $table->string('PIC')->nullable()->default(0);
            $table->timestamps();
            $table->date('closedOn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
