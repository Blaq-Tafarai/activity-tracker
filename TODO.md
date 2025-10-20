# TODO: Host Laravel App on Render with PostgreSQL (Keep SQLite Locally)

## Steps to Complete

- [x] Update .env.example with environment-specific database settings (SQLite for local, PostgreSQL for production)
- [x] Create render.yaml file for Render deployment configuration (using Docker)
- [x] Create Dockerfile for containerized deployment
- [x] Verify composer.json includes PostgreSQL support (handled by Laravel framework, no additional packages needed)
- [x] Ensure .gitignore excludes sensitive files (already done for .env)
- [x] Commit changes and push to GitHub
- [x] On Render: Create web service using Docker, environment variables are set in render.yaml, deploy
- [x] Run php artisan migrate on Render after deployment (migrations run automatically in Dockerfile CMD)
- [x] Test app locally with SQLite and on Render with PostgreSQL (deployment successful, app live at https://activity-tracker-tfwk.onrender.com)
