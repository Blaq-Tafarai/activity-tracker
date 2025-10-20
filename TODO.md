# TODO: Host Laravel App on Render with PostgreSQL (Keep SQLite Locally)

## Steps to Complete

- [x] Update .env.example with environment-specific database settings (SQLite for local, PostgreSQL for production)
- [x] Create render.yaml file for Render deployment configuration (using Docker)
- [x] Create Dockerfile for containerized deployment
- [x] Verify composer.json includes PostgreSQL support (handled by Laravel framework, no additional packages needed)
- [x] Ensure .gitignore excludes sensitive files (already done for .env)
- [ ] Commit changes and push to GitHub
- [ ] On Render: Create web service using Docker, environment variables are set in render.yaml, deploy
- [ ] Run php artisan migrate on Render after deployment (via shell or build command)
- [ ] Test app locally with SQLite and on Render with PostgreSQL
