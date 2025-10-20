# TODO: Host Laravel App on Render with PostgreSQL (Keep SQLite Locally)

## Steps to Complete

- [x] Update .env.example with environment-specific database settings (SQLite for local, PostgreSQL for production)
- [x] Create render.yaml file for Render deployment configuration
- [x] Verify composer.json includes PostgreSQL support (check if pdo_pgsql is handled by Laravel)
- [x] Ensure .gitignore excludes sensitive files (already done for .env)
- [x] Commit changes and push to GitHub
- [x] On Render: Create web service, set environment variables (DB_CONNECTION=pgsql, DATABASE_URL=postgresql://activity_tracker_bfkx_user:yEb0us1t4HhjPyUfTd7gf152HOvNMrLU@dpg-d3qfv5m3jp1c738jh1k0-a/activity_tracker_bfkx), deploy
- [x] Run php artisan migrate on Render after deployment
- [x] Test app locally with SQLite and on Render with PostgreSQL
- [x] Fix sessions migration to be idempotent (handle existing tables)
