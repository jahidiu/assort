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
            $table->id();
            $table->string('title');
            $table->integer('sort_number');
            $table->longText('description');
            $table->string('address');
            $table->string('type_of_project');
            $table->string('built_up_area');
            $table->string('number_of_floors');
            $table->string('apartment_floor');
            $table->string('size');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('collection');
            $table->string('launch_date');
            $table->string('completion_date');
            $table->string('status');
            $table->text('iframe_code');
            $table->string('featured_image');
            $table->string('brochure');
            $table->boolean('is_active');
            $table->boolean('is_featured');
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
        Schema::dropIfExists('projects');
    }
}
