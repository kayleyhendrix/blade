<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('assignment_detail')) {
            Schema::create('assignment_detail', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
                $table->bigInteger('moet_unit_id');
                $table->bigInteger('assignment_id')->default(0);// id cua bai kiem tra
                $table->bigInteger('quiz_question_id')->default(0)->comment('id bảng quiz_question');
                $table->tinyInteger('quiz_question_type')->default(0)->comment('Loại câu hỏi:0:Chọn 1 đáp án đúng,1:Chọn nhiều đáp án đúng');
                $table->text('answer')->comment('Câu chọn 1 thì lưu id của bảng quiz_question_answer_id Câu trả lời. Nếu chọn nhiều đáp án đúng thì lưu thành json quiz_question_answer_id');// id cua bai quiz
                $table->float('score')->comment('điểm đạt được của câu hỏi');// id cua bai hoc
                $table->tinyInteger('status')->comment('1: đã hoàn thành chưa chấm điểm; 2: Đã chấm điểm xong');
                $table->bigInteger('created_user_id')->default(0);
                $table->bigInteger('modified_user_id')->default(0);
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_detail');
    }
}
