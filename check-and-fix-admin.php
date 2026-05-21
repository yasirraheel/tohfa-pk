<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== Checking Users Table ===\n\n";

// Get all users
$users = User::all();

echo "Total users: " . $users->count() . "\n\n";

foreach ($users as $user) {
    echo "ID: {$user->id}\n";
    echo "Email: {$user->email}\n";
    echo "Name: {$user->name}\n";
    echo "Role: {$user->role}\n";
    echo "Status: {$user->status}\n";
    echo "---\n";
}

echo "\n=== Updating haqiultra@gmail.com to admin ===\n";

// Update the user
$updated = DB::table('users')
    ->where('email', 'haqiultra@gmail.com')
    ->update([
        'role' => 'admin',
        'status' => 'active',
        'password' => bcrypt('password')
    ]);

if ($updated) {
    echo "✅ Updated successfully!\n";
    
    // Verify
    $user = User::where('email', 'haqiultra@gmail.com')->first();
    echo "\nVerification:\n";
    echo "Email: {$user->email}\n";
    echo "Role: {$user->role}\n";
    echo "Status: {$user->status}\n";
    echo "Password: password\n";
} else {
    echo "❌ Update failed\n";
}
