# Troubleshooting Guide - Universal Starter Kit

## Issue: "Undefined array key 'extension'" Error

### Root Cause
The original stock photo application had image-specific code that tried to access properties like `extension`, `colors`, and `stock` on image objects. After converting to a universal starter kit, these objects no longer exist.

### Fixes Applied

#### 1. Updated `resources/views/includes/images.blade.php`
**Status:** ✅ FIXED
- Replaced entire file with empty stub
- File now returns nothing to prevent errors
- This file is deprecated for the universal starter kit

#### 2. Updated `app/Http/Controllers/HomeController.php`
**Status:** ✅ FIXED
- Removed all image query methods
- Methods now redirect or return empty collections
- No image data is passed to views

#### 3. Updated Views
**Status:** ✅ FIXED
- `home.blade.php` - Removed image displays, added feature cards
- `search.blade.php` - Generic search results
- `category.blade.php` - Universal category display

#### 4. Disabled PWA Directive (Temporary)
**Status:** ⚠️ TROUBLESHOOTING
- Commented out `@laravelPWA` directive in `app.blade.php` line 36-40
- This was done to isolate if PWA package is causing issues
- Can be re-enabled once error is resolved

### Commands Run
```bash
php artisan view:clear
php artisan cache:clear
php artisan config:clear
```

### If Error Persists

#### Check 1: Clear Browser Cache
- Hard refresh: Ctrl+Shift+R (Windows) or Cmd+Shift+R (Mac)
- Or clear browser cache completely

#### Check 2: Verify Database Connection
```bash
php artisan tinker
>>> \DB::connection()->getPdo();
>>> App\Models\AdminSettings::first();
```

#### Check 3: Check for Cached Routes
```bash
php artisan route:clear
php artisan optimize:clear
```

#### Check 4: Restart Laravel Server
- Stop the current server (Ctrl+C)
- Start again: `php artisan serve`

### Files That Are Now Safe

✅ `app/Http/Controllers/HomeController.php` - No image queries
✅ `resources/views/index/home.blade.php` - No image displays  
✅ `resources/views/includes/images.blade.php` - Empty stub
✅ `resources/views/default/search.blade.php` - Generic results
✅ `resources/views/default/category.blade.php` - Universal display

### What to Do Next

1. **If error is resolved:**
   - Continue using the application
   - Add your own content type
   - Re-enable PWA if needed

2. **If error persists:**
   - Check the exact line number in the error
   - Look for any custom code that might be loading images
   - Check middleware for database queries
   - Verify all caches are cleared

### Common Issues

**Issue:** Error mentions "extension" but file looks clean
**Solution:** Clear ALL caches (view, config, route, application)

**Issue:** Error only on specific pages
**Solution:** Check that page's controller and view for image references

**Issue:** Error in middleware
**Solution:** Check `AdminSettingsMiddleware`, `Language`, `UserCountry`, `Referred` middleware files

### Emergency Fallback

If nothing works, you can temporarily disable the problematic middleware:

Edit `app/Http/Kernel.php` and comment out:
```php
// \App\Http\Middleware\AdminSettingsMiddleware::class,
```

Then clear cache and test.

### Support Files Created

- `CONVERSION_COMPLETE.md` - Full conversion details
- `STARTER_KIT_CONVERSION.md` - Progress report  
- `QUICK_REFERENCE.md` - Quick start guide
- `TROUBLESHOOTING.md` - This file

### Server Information

- **URL:** http://127.0.0.1:8000
- **PHP Version:** 8.3
- **Laravel Version:** 11.x
- **Database:** MySQL (starter-kit)

---

**Last Updated:** After disabling PWA directive
**Status:** Troubleshooting in progress
