<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\User;

echo "=== Setting haqiultra@gmail.com as admin (role = 1) ===\n\n";

// Update with role as integer 1
$updated = DB::table('users')
    ->where('email', 'haqiultra@gmail.com')
    ->update([
        'role' => 1,  // 1 = admin
        'status' => 'active',
        'password' => bcrypt('password')
    ]);

if ($updated) {
    echo "✅ Updated successfully!\n\n";
    
    // Verify
    $user = User::where('email', 'haqiultra@gmail.com')->first();
    echo "Verification:\n";
    echo "Email: {$user->email}\n";
    echo "Name: {$user->name}\n";
    echo "Role: {$user->role} (1 = admin, 0 = user)\n";
    echo "Status: {$user->status}\n";
    echo "Password: password\n";
} else {
    echo "❌ Update failed\n";
}
