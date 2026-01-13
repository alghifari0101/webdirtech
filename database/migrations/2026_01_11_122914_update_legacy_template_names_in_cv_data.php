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
        DB::table('cv_data')->where('template', 'premium_ats')->update(['template' => 'template_001']);
        DB::table('cv_data')->where('template', 'modern_soft')->update(['template' => 'template_002']);
        DB::table('cv_data')->where('template', 'professional_academic')->update(['template' => 'template_003']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('cv_data')->where('template', 'template_001')->update(['template' => 'premium_ats']);
        DB::table('cv_data')->where('template', 'template_002')->update(['template' => 'modern_soft']);
        DB::table('cv_data')->where('template', 'template_003')->update(['template' => 'professional_academic']);
    }
};
