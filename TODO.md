# Deployment Plan for Laravel App to Shared Hosting (cPanel, SQLite)

## Information Gathered
- This is a Laravel 12 application using SQLite as the default database (file-based, no server setup needed).
- Assets are built with Vite (npm run build).
- Dependencies managed via Composer and npm.
- Hosting: Shared hosting with cPanel access, PHP version unknown (must be >=8.2 for Laravel 12).
- No SSH access assumed; steps will use cPanel File Manager, FTP, or cPanel tools.

## Plan
1. **Prepare the app locally: ✅ COMPLETED**
   - Install dependencies: `composer install --no-dev --optimize-autoloader` ✅
   - Install npm packages: `npm install` ✅
   - Build assets: `npm run build` ✅
   - Generate app key: `php artisan key:generate` ✅
   - Run migrations to create SQLite DB: `php artisan migrate --force` ✅ (Nothing to migrate, DB already set up)
   - Optimize for production: `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache` ✅

2. **Upload files to hosting:**
   - Use FTP or cPanel File Manager to upload the entire project to public_html or a subdirectory (e.g., /public_html/laravel-app).
   - Exclude: .env.example, .git/, node_modules/, vendor/ (if uploading after local prep), storage/logs/*, etc.
   - Ensure storage/ and database/ are writable (chmod 755 or 775).

3. **Configure on server:**
   - Copy .env.example to .env and edit via cPanel File Manager: Set APP_ENV=production, APP_DEBUG=false, APP_URL to your domain, DB_CONNECTION=sqlite, DB_DATABASE=/full/path/to/database/database.sqlite
   - If cPanel has PHP CLI, run: `php artisan key:generate`, `php artisan migrate --force`, `php artisan config:cache` etc.
   - If no CLI, create a temporary PHP file to run commands via web (e.g., artisan web runner), then delete it.

4. **Set up domain/subdomain:**
   - Point domain to public_html or subdirectory.
   - Ensure public/.htaccess is present for URL rewriting.

5. **Test deployment:**
   - Visit the site and check for errors.
   - Test auth, activities, etc.

## Dependent Files to Edit
- .env (create and configure on server)
- No code edits needed unless issues arise.

## Followup Steps
- Verify PHP version in cPanel (must be 8.2+).
- If issues, check logs in storage/logs/.
- For SSL, use cPanel's Let's Encrypt.
- Backup before deployment.
- Next: Upload the prepared app to your hosting via FTP or cPanel File Manager.
