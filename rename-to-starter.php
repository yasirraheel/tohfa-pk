<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Renaming SevenLabs to Starter across the application ===\n\n";

// Update admin_settings table
$settings = DB::table('admin_settings')->first();

if ($settings) {
    $updates = [];
    
    // Update title if it contains sevenlabs
    if (stripos($settings->title ?? '', 'sevenlabs') !== false) {
        $updates['title'] = str_ireplace('sevenlabs', 'Starter', $settings->title);
        echo "✅ Updated title: {$updates['title']}\n";
    } else {
        $updates['title'] = 'Starter Kit';
        echo "✅ Set title to: Starter Kit\n";
    }
    
    // Update site name
    if (stripos($settings->name_site ?? '', 'sevenlabs') !== false) {
        $updates['name_site'] = str_ireplace('sevenlabs', 'Starter', $settings->name_site);
        echo "✅ Updated site name: {$updates['name_site']}\n";
    } else {
        $updates['name_site'] = 'Starter Kit';
        echo "✅ Set site name to: Starter Kit\n";
    }
    
    // Update SEO title
    if (stripos($settings->seo_title ?? '', 'sevenlabs') !== false) {
        $updates['seo_title'] = str_ireplace('sevenlabs', 'Starter', $settings->seo_title);
        echo "✅ Updated SEO title: {$updates['seo_title']}\n";
    }
    
    // Update description if it contains sevenlabs
    if (stripos($settings->description ?? '', 'sevenlabs') !== false) {
        $updates['description'] = str_ireplace('sevenlabs', 'Starter', $settings->description);
        echo "✅ Updated description\n";
    }
    
    // Update SEO description if it contains sevenlabs
    if (stripos($settings->seo_description ?? '', 'sevenlabs') !== false) {
        $updates['seo_description'] = str_ireplace('sevenlabs', 'Starter', $settings->seo_description);
        echo "✅ Updated SEO description\n";
    }
    
    // Update keywords if it contains sevenlabs
    if (stripos($settings->keywords ?? '', 'sevenlabs') !== false) {
        $updates['keywords'] = str_ireplace('sevenlabs', 'Starter', $settings->keywords);
        echo "✅ Updated keywords\n";
    }
    
    // Update SEO keywords if it contains sevenlabs
    if (stripos($settings->seo_keywords ?? '', 'sevenlabs') !== false) {
        $updates['seo_keywords'] = str_ireplace('sevenlabs', 'Starter', $settings->seo_keywords);
        echo "✅ Updated SEO keywords\n";
    }
    
    if (!empty($updates)) {
        DB::table('admin_settings')->update($updates);
        echo "\n✅ All updates applied successfully!\n";
    } else {
        echo "\n✅ No SevenLabs references found in settings\n";
    }
} else {
    echo "❌ No admin settings found\n";
}

// Check for any other tables that might have sevenlabs references
echo "\n=== Checking other tables ===\n";

// Check pages table
$pages = DB::table('pages')->where('title', 'like', '%sevenlabs%')->orWhere('content', 'like', '%sevenlabs%')->get();
if ($pages->count() > 0) {
    echo "Found {$pages->count()} pages with 'sevenlabs' references\n";
    foreach ($pages as $page) {
        $newTitle = str_ireplace('sevenlabs', 'Starter', $page->title);
        $newContent = str_ireplace('sevenlabs', 'Starter', $page->content);
        DB::table('pages')->where('id', $page->id)->update([
            'title' => $newTitle,
            'content' => $newContent
        ]);
        echo "✅ Updated page: {$newTitle}\n";
    }
}

echo "\n=== Renaming complete! ===\n";
echo "Your application is now called 'Starter Kit'\n";
