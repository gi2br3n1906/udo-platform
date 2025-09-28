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
        Schema::table('universities', function (Blueprint $table) {
            $table->string('booth_number')->nullable()->after('slug'); // B1, B2, A1, etc.
            $table->integer('x_position')->nullable()->after('booth_number'); // SVG X coordinate
            $table->integer('y_position')->nullable()->after('x_position'); // SVG Y coordinate
            $table->enum('booth_type', ['corner', 'center', 'stage_side'])->default('center')->after('y_position');
            $table->string('logo_color', 7)->default('#3B82F6')->after('booth_type'); // Hex color for placeholder
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn(['booth_number', 'x_position', 'y_position', 'booth_type', 'logo_color']);
        });
    }
};
