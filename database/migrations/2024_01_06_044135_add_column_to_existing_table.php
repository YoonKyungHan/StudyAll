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
        Schema::table('mains', function (Blueprint $table) {
            $table->string('new_column_name')->nullable(); // 예시: 새로운 문자열 타입의 컬럼 추가
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mains', function (Blueprint $table) {
            $table->dropColumn('new_column_name'); // 롤백을 위한 컬럼 제거
        });
    }
};
