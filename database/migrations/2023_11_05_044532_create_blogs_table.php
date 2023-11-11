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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('หัวข้อ Blog');
            $table->string('title_sub')->comment('หัวข้อย่อย Blog');
            $table->text('description')->comment('รายละเอียด Blog');
            $table->string('image_name')->comment('ชื่อรูปหลัก Blog');
            $table->string('file_pdf_name')->nullable()->comment('ชื่อไฟล์ PDF');
            $table->string('link_youtube')->comment('ลิงค์ Youtube');

            $table->string('meta_title')->comment('Meta Title');
            $table->string('meta_description')->comment('Meta Description');
            $table->string('meta_keywords')->comment('Meta Keywords');  

            $table->integer('count_view')->comment('จำนวนผู้เข้าชม');   
            $table->boolean('status')->comment('สถานะการแสดงผล');
            $table->integer('user_id')->comment('รหัสผู้สร้าง'); 
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
        Schema::dropIfExists('blogs');
    }
};