<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

// Find user by email
$user = User::where('email', 'haqiultra@gmail.com')->first();

if ($user) {
    $user->role = 'admin';
    $user->password = bcrypt('password');
    $user->status = 'active';
    $user->save();
    
    echo "✅ User updated to admin successfully!\n";
    echo "Email: " . $user->email . "\n";
    echo "Role: " . $user->role . "\n";
    echo "Password: password\n";
} else {
    echo "❌ User not found\n";
}
