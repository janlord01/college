<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCollegeSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme_color')->nullable();
            $table->string('body_text_color')->nullable();
            $table->string('headline_font')->nullable();
            $table->string('body_font')->nullable();
            $table->timestamps();
        });
        Schema::create('college_academic_settings', function (Blueprint $table) {
            $table->id();
            $table->string('acad_year')->nullable();
            $table->string('status')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
        Schema::create('college_announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acad_id')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('acad_id')->references('id')->on('college_academic_settings')->onDelete('cascade');
            // $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::create('college_school_infos', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('ched_no')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('fb')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->date('class_start')->nullable();
            $table->date('class_end')->nullable();
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
        Schema::dropIfExists('college_settings');
        Schema::dropIfExists('college_academic_settings');
        Schema::dropIfExists('college_announcements');
        Schema::dropIfExists('college_school_infos');
    }
}
