<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->foreignId('user_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignUuid('team_id')
                  ->nullable()
                  ->references('id')->on('teams')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignUuid('project_id')
                  ->nullable()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->bigInteger('order');

            $table->string('title');

            $table->longText('content');

            $table->enum('access', ['public', 'protected', 'private']);

            $table->timestamps();

            $table->softDeletes('deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
