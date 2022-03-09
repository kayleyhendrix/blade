<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('moet_level');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
            $table->bigInteger('moet_unit_id');
            $table->bigInteger('lesson_id')->default(0);// id cua bai hoc
            $table->bigInteger('class_id')->default(0);// id cua lớp
            $table->bigInteger('user_id')->default(0);// id cua hoc vien lam bai thi
            $table->bigInteger('quiz_id')->default(0);// id cua bai quiz
            $table->timestamp('start_time');// id cua bai hoc
            $table->timestamp('end_time')->nullable();// id cua bai hoc
            $table->integer('version')->default(1)->comment('Lần làm bài');
            $table->tinyInteger('status')->default(0)->comment('0:Đang làm, 1: đã hoàn thành chưa chấm điểm; 2: Đã chấm điểm xong. 3: process đang tính. 4: process tính xong, 5: process tính lỗi');
            $table->tinyInteger('view_result')->nullable()->comment('0: Không mở cho học viên xem điểm, 1: Mở cho học viên xem điểm');
            $table->float('score')->nullable()->comment('Điểm đạt được');
            $table->integer('time')->nullable();//Lưu số phút làm bài của bài kiểm tra
            $table->bigInteger('created_user_id')->default(0);
            $table->bigInteger('modified_user_id')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('assignment');
    }
}
