<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

try {
    // Reset admin password to something known
    $user = User::where('email', 'admin@example.com')->first();
    if ($user) {
        $user->password = Hash::make('password123');
        $user->save();
        echo "SUCCESS: Admin password reset to 'password123'\n";
    } else {
        echo "ERROR: Admin user not found.\n";
    }

    // Clear sessions
    DB::table('sessions')->truncate();
    echo "SUCCESS: Sessions cleared.\n";

} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
