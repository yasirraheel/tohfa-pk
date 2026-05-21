<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "=== Updating application name to 'Starter Kit' ===\n\n";

// Get column names
$columns = Schema::getColumnListing('admin_settings');
echo "Available columns: " . implode(', ', $columns) . "\n\n";

// Get current settings
$settings = DB::table('admin_settings')->first();

$updates = [];

// Update title
if (in_array('title', $columns)) {
    $updates['title'] = 'Starter Kit';
    echo "✅ Will update title\n";
}

// Update description
if (in_array('description', $columns)) {
    $updates['description'] = 'Ready to build your next project';
    echo "✅ Will update description\n";
}

// Update SEO title
if (in_array('seo_title', $columns)) {
    $updates['seo_title'] = 'Starter Kit - Laravel Application';
    echo "✅ Will update SEO title\n";
}

// Update SEO description
if (in_array('seo_description', $columns)) {
    $updates['seo_description'] = 'A powerful Laravel starter kit with authentication, payments, and admin panel';
    echo "✅ Will update SEO description\n";
}

// Update keywords
if (in_array('keywords', $columns)) {
    $updates['keywords'] = 'laravel, starter kit, php, framework';
    echo "✅ Will update keywords\n";
}

// Update SEO keywords
if (in_array('seo_keywords', $columns)) {
    $updates['seo_keywords'] = 'laravel, starter kit, php, framework, application';
    echo "✅ Will update SEO keywords\n";
}

if (!empty($updates)) {
    DB::table('admin_settings')->update($updates);
    echo "\n✅ Application name updated successfully!\n\n";
    
    // Show updated values
    $updated = DB::table('admin_settings')->first();
    echo "Current settings:\n";
    echo "Title: {$updated->title}\n";
    if (isset($updated->description)) echo "Description: {$updated->description}\n";
    if (isset($updated->seo_title)) echo "SEO Title: {$updated->seo_title}\n";
} else {
    echo "\n❌ No columns to update\n";
}

echo "\n=== Update complete! ===\n";
