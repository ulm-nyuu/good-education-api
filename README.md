# Australian Schools API - Custom Files

This archive contains the custom Laravel files you can drop into an existing Laravel application.

## How to use

1. Copy the folders/files into the root of your Laravel project (merge with existing files).
2. Run migrations and seeders:
   ```bash
   php artisan migrate
   php artisan db:seed --class=DatabaseSeeder
   ```
3. Serve the app:
   ```bash
   php artisan serve
   ```

Notes:
- These files are meant to be added to an existing Laravel app (Laravel 10/11). They do not include vendor or framework files.
