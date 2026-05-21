<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

// Find admin user
$admin = User::where('role', 'admin')->first();

if (!$admin) {
    // Try to find first user
    $admin = User::first();
}

if ($admin) {
    $admin->password = bcrypt('password');
    $admin->save();
    
    echo "✅ Admin password reset successfully!\n";
    echo "Email: " . $admin->email . "\n";
    echo "Password: password\n";
} else {
    echo "❌ No users found in database\n";
}
