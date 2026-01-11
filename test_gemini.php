<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$gemini = app(\App\Services\GeminiService::class);
$testText = 'saya bekerja di PT ABC sebagai admin selama 2 tahun dan melakukan pekerjaan administrasi';

echo "=== TES FUNGSI AI GEMINI ===\n\n";
echo "Teks Asli:\n$testText\n\n";

$result = $gemini->polishText($testText, 'experience');

echo "Hasil:\n";
print_r($result);
