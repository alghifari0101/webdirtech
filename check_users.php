<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $users = DB::table('users')->get();
    foreach ($users as $user) {
        echo "ID: {$user->id} | Email: {$user->email} | Role: " . ($user->role ?? 'NULL') . "\n";
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
