<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->integer('reporter')->unsigned();
            $table->foreign('reporter')->references('id')->on('users')->onDelete('cascade');

            $table->integer('assignee')->unsigned();
            $table->foreign('assignee')->references('id')->on('users')->onDelete('cascade');

            $table->enum('type', ['TASK', 'IMPROVEMENT', 'STORY', 'GOAL', 'BUG', 'REQUIREMENT']);
            $table->enum('status', ['OPEN', 'IN_PROGRESS', 'RESOLVED', 'CLOSED']);
            $table->enum('priority', ['BLOCKER', 'CRITICAL', 'MINOR', 'TRIVIAL']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
